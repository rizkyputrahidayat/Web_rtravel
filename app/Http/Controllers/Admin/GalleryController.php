<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Gallery;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan data travel package
        $items = Gallery::with(['travel_package'])->get();
        return view('pages.admin.gallery.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();
        return view('pages.admin.gallery.create', compact('travel_packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        // Memanggil semua data pada form
        $data = $request->all();
        // Upload Gambar
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );
        // Panggil data request all dengan tambahan slug
        Gallery::create($data);
        return redirect()->route('gallery.index')->with('sukses', 'Data Berhasil Ditambahkan');
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
        $item = Gallery::findOrFail($id);
        $travel_packages = TravelPackage::all();
        return view('pages.admin.gallery.edit', compact('item'), compact('travel_packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        // Koding sama dengan store (create)
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );
        $item = Gallery::findOrFail($id);
        $item->update($data);
        return redirect()->route('gallery.index')->with('sukses', 'Data Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::find($id);
        $item->delete();
        return redirect()->route('gallery.index')->with('sukses', 'Data Berhasil Dihapus');
    }
}
