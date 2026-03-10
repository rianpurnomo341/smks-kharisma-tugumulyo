<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KategoriPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategoriPengumuman.index', [
            'title' => 'Kategori Pengumuman',
            'no' => 1,
            'kategoriPengumuman' => KategoriPengumuman::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategoriPengumuman.create', [
            'title' => 'Tambah Kategori Pengumuman'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judulKategoriPengumuman' => 'required',
            'deskripsiKategoriPengumuman' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
        ]);

        KategoriPengumuman::create($validateData);

        return redirect('/admin/kategori-pengumuman')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriPengumuman  $kategoriPengumuman
     * @return \Illuminate\Http\Response
     */
    public function show($idKategoriPengumuman)
    {
        return view('admin.kategoriPengumuman.show', [
            'title' => 'Detail Kategori Pengumuman',
            'kategoriPengumuman' => KategoriPengumuman::find(Crypt::decryptString($idKategoriPengumuman))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriPengumuman  $kategoriPengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit($idKategoriPengumuman)
    {
        return view('admin.kategoriPengumuman.edit', [
            'title' => 'Edit Kategori Pengumuman',
            'kategoriPengumuman' => KategoriPengumuman::find(Crypt::decryptString($idKategoriPengumuman))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriPengumuman  $kategoriPengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idKategoriPengumuman)
    {
        $kategoriPengumuman = KategoriPengumuman::find(Crypt::decryptString($idKategoriPengumuman));

        $validateData = $request->validate([
            'judulKategoriPengumuman' => 'required',
            'deskripsiKategoriPengumuman' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!'
        ]);    

        KategoriPengumuman::find($kategoriPengumuman->idKategoriPengumuman)->update($validateData);

        return redirect('/admin/kategori-pengumuman')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriPengumuman  $kategoriPengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy($idKategoriPengumuman)
    {
        $kategoriPengumuman = KategoriPengumuman::find(Crypt::decryptString($idKategoriPengumuman));

        KategoriPengumuman::destroy($kategoriPengumuman->idKategoriPengumuman);

        return redirect('/admin/kategori-pengumuman')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    public function showorhidden($idKategoriPengumuman)
    {
        $showorhidden = KategoriPengumuman::find($idKategoriPengumuman);
        if($showorhidden->showorhidden == false) {
            $showorhidden = true;
        } else {
            $showorhidden = false;
        }

        KategoriPengumuman::find($idKategoriPengumuman)->update([
            'showorhidden' => $showorhidden
        ]);
        
        return redirect('/admin/kategori-pengumuman')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
