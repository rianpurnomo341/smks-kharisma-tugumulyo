<?php

namespace App\Http\Controllers;

use App\Models\StrukturSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class StrukturSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.struktursekolah', [
            'title' => 'Profil sekolah',
            'strukturSekolah' => StrukturSekolah::find(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StrukturSekolah  $strukturSekolah
     * @return \Illuminate\Http\Response
     */
    public function show(StrukturSekolah $strukturSekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StrukturSekolah  $strukturSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(StrukturSekolah $strukturSekolah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StrukturSekolah  $strukturSekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idStrukturSekolah)
    {
        $struktursekolah = StrukturSekolah::find(Crypt::decryptString($idStrukturSekolah));

        $validateData = $request->validate([
            'fotoStrukturSekolah' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'deskripsiStrukturSekolah' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!',
        ]);

        if ($request->file('fotoStrukturSekolah')) {
            if ($request->fotoStrukturSekolah) {
                if (Storage::exists($struktursekolah->fotoStrukturSekolah)) {
                    Storage::delete($struktursekolah->fotoStrukturSekolah);
                }

                $validateData['fotoStrukturSekolah'] = Storage::put('media-struktursekolah', $request->file('fotoStrukturSekolah'));
            }
        } 

        StrukturSekolah::find($struktursekolah->idStrukturSekolah)->update($validateData);

        return redirect('/admin/struktur-sekolah')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StrukturSekolah  $strukturSekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(StrukturSekolah $strukturSekolah)
    {
        //
    }
}
