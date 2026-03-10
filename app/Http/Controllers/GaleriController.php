<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.galeri.index', [
            'title' => 'Galeri',
            'no' => 1,
            'galeri' => Galeri::orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.create', [
            'title' => 'Tambah Galeri',
            'titleGaleri' => Galeri::select('titleGaleri')->whereNotNull('titleGaleri')->distinct()->orderBy('created_at', 'DESC')->get()
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
            'namaGaleri' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'titleGaleri' => '',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if($request->titleGaleriBaru) {
            $validateData['titleGaleri'] = $request->titleGaleriBaru;
        }

        if ($request->file('namaGaleri')) {
            if ($request->namaGaleri) {
                $validateData['namaGaleri'] = Storage::put('media-galeri', $request->file('namaGaleri'));
            }
        }

        Galeri::create($validateData);

        return redirect('/admin/galeri')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit($idGaleri)
    {
        return view('admin.galeri.edit', [
            'title' => 'Edit Galeri',
            'galeri' => Galeri::find(Crypt::decryptString($idGaleri)),
            'titleGaleri' => Galeri::select('titleGaleri')->whereNotNull('titleGaleri')->distinct()->orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idGaleri)
    {
        $galeri = Galeri::find(Crypt::decryptString($idGaleri));

        $validateData = $request->validate([
            'namaGaleri' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'titleGaleri' => '',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
        ]);

        if($request->titleGaleriBaru) {
            $validateData['titleGaleri'] = $request->titleGaleriBaru;
        }

        if ($request->file('namaGaleri')) {
            if ($request->namaGaleri) {
                if (Storage::exists($galeri->namaGaleri)) {
                    Storage::delete($galeri->namaGaleri);
                }

                $validateData['namaGaleri'] = Storage::put('media-galeri', $request->file('namaGaleri'));
            }
        }

        Galeri::find($galeri->idGaleri)->update($validateData);

        return redirect('/admin/galeri')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($idGaleri)
    {
        $galeri = Galeri::find(Crypt::decryptString($idGaleri));

        if ($galeri->namaGaleri) {
            if (Storage::exists($galeri->namaGaleri)) {
                Storage::delete($galeri->namaGaleri);
            }
        }

        Galeri::destroy($galeri->idGaleri);

        return redirect('/admin/galeri')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
