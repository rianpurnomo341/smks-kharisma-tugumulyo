<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.berita.index', [
            'title' => 'Berita',
            'no' => 1,
            'berita' => Berita::orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create', [
            'title' => 'Tambah Berita'
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
            'fotoBerita' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'judulBerita' => 'required',
            'deskripsiBerita' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fotoBerita')) {
            if ($request->fotoBerita) {
                $validateData['fotoBerita'] = Storage::put('media-berita', $request->file('fotoBerita'));
            }
        }

        Berita::create($validateData);

        return redirect('/admin/berita')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($idBerita)
    {
        return view('admin.berita.show', [
            'title' => 'Detail Berita',
            'berita' => Berita::find(Crypt::decryptString($idBerita))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($idBerita)
    {
        return view('admin.berita.edit', [
            'title' => 'Edit Berita',
            'berita' => Berita::find(Crypt::decryptString($idBerita))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idBerita)
    {
        $berita = Berita::find(Crypt::decryptString($idBerita));

        $validateData = $request->validate([
            'fotoBerita' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'judulBerita' => 'required',
            'deskripsiBerita' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fotoBerita')) {
            if ($request->fotoBerita) {
                if (Storage::exists($berita->fotoBerita)) {
                    Storage::delete($berita->fotoBerita);
                }

                $validateData['fotoBerita'] = Storage::put('media-berita', $request->file('fotoBerita'));
            }
        }

        Berita::find($berita->idBerita)->update($validateData);

        return redirect('/admin/berita')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($idBerita)
    {
        $berita = Berita::find(Crypt::decryptString($idBerita));

        if ($berita->fotoBerita) {
            if (Storage::exists($berita->fotoBerita)) {
                Storage::delete($berita->fotoBerita);
            }
        }

        Berita::destroy($berita->idBerita);

        return redirect('/admin/berita')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
