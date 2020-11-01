<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;
// Library carbon format tanggal
use Carbon\Carbon;
// Untuk Auth Proses Checkout
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);
        return view('pages.checkout', compact('item'));
    }

    public function process(Request $request, $id)
    {
        // Memasukkan data ketable transaksi masih dalam cart (IN_CART)
        $travel_package = TravelPackage::findOrFail($id);

        // Create untuk transaksi
        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        // Create data yang login (sendiri)
        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);
        $transaction = Transaction::with(['details', 'travel_package'])
            ->findOrFail($item->transactions_id);
        // findOrFail Untuk mengambil data id trasaction nya
        if ($item->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }
        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();
        // Delete item id teresebut
        $item->delete();
        // Redirect ke checkout dan mengambil id transaksi dari item 
        return redirect()->route('checkout', $item->transactions_id);
    }

    public function create(Request $request, $id)
    {
        // Validasi Create
        $request->validate([
            'username' => 'required|string|exists:users,name',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);
        // Memasukkan data untuk input(Memasukkan) di transaksi detail
        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        // Update ketika kita menambahkan user untuk/ketika trip
        if ($request->is_visa) {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }
        $transaction->transaction_total +=
            $transaction->travel_package->price;
        $transaction->save();

        // Redirect ke checkout dengan id transaksi itu sendiri
        return redirect()->route('checkout', $id);
    }


    public function success(Request $request, $id)
    {
        // Mengubah status incart menjadi pending
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        return view('pages.success');
    }
}
