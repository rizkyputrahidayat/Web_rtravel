<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan data travel package
        $items = TravelPackage::all();
        return view('pages.admin.travel-package.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        // Memanggil semua data pada form
        $data = $request->all();
        // Menambahkan slug => Seperti id cantik
        $data['slug'] = Str::slug($request->title);
        // Panggil data request all dengan tambahan slug
        TravelPackage::create($data);
        return redirect()->route('travel-package.index')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Cari berdasarkan id
        $item = TravelPackage::findOrFail($id);
        return view('pages.admin.travel-package.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
        // Koding sama dengan store (create)
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Yang membedakan dengan store
        $item = TravelPackage::findOrFail($id);
        $item->update($data);
        return redirect()->route('travel-package.index')->with('sukses', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TravelPackage::find($id);
        $item->delete();
        return redirect()->route('travel-package.index')->with('sukses', 'Data Berhasil Dihapus');
    }
}
