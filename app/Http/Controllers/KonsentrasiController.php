<?php

namespace App\Http\Controllers;

use App\Models\Konsentrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KonsentrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.konsentrasi.index', [
            'title' => 'Konsentrasi',
            'no' => 1,
            'konsentrasi' => Konsentrasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.konsentrasi.create', [
            'title' => 'Tambah Konsentrasi'
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
            'namaKonsentrasi' => 'required',
            'deskripsiKonsentrasi' => 'required',
            'keunggulanKonsentrasi' => 'required',
            'dipelajariKonsentrasi' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        Konsentrasi::create($validateData);

        return redirect('/admin/konsentrasi')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konsentrasi  $konsentrasi
     * @return \Illuminate\Http\Response
     */
    public function show($idKonsentrasi)
    {
        return view('admin.konsentrasi.show', [
            'title' => 'Detail Konsentrasi',
            'konsentrasi' => Konsentrasi::find(Crypt::decryptString($idKonsentrasi))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konsentrasi  $konsentrasi
     * @return \Illuminate\Http\Response
     */
    public function edit($idKonsentrasi)
    {
        return view('admin.konsentrasi.edit', [
            'title' => 'Edit Konsentrasi',
            'konsentrasi' => Konsentrasi::find(Crypt::decryptString($idKonsentrasi))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Konsentrasi  $konsentrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idKonsentrasi)
    {
        $konsentrasi = Konsentrasi::find(Crypt::decryptString($idKonsentrasi));

        $validateData = $request->validate([
            'namaKonsentrasi' => 'required',
            'deskripsiKonsentrasi' => 'required',
            'keunggulanKonsentrasi' => 'required',
            'dipelajariKonsentrasi' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        Konsentrasi::find($konsentrasi->idKonsentrasi)->update($validateData);

        return redirect('/admin/konsentrasi')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konsentrasi  $konsentrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($idKonsentrasi)
    {
        $konsentrasi = Konsentrasi::find(Crypt::decryptString($idKonsentrasi));

        Konsentrasi::destroy($konsentrasi->idKonsentrasi);

        return redirect('/admin/konsentrasi')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
