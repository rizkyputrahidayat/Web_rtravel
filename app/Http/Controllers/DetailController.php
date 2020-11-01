<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackage;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        // Ambil data relasi galleries dalam model travel package
        // dimana slug sama dengan slug yang masuk, dan ambil yang pertama
        $item = TravelPackage::with(['galleries'])
            ->where('slug', $slug)
            ->firstOrFail();
        return view('pages.detail', compact('item'));
    }
}
