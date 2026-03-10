<?php

namespace App\Http\Controllers;

use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class SaranaPrasaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.saranaprasarana.index', [
            'title' => 'Sarana dan Prasarana',
            'no' => 1,
            'saranaprasarana' => SaranaPrasarana::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.saranaprasarana.create', [
            'title' => 'Tambah Sarana dan Prasarana'
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
            'fotoSaranaPrasarana' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'namaSaranaPrasarana' => 'required',
            'deskripsiSaranaPrasarana' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fotoSaranaPrasarana')) {
            if ($request->fotoSaranaPrasarana) {
                $validateData['fotoSaranaPrasarana'] = Storage::put('media-saranaprasarana', $request->file('fotoSaranaPrasarana'));
            }
        }

        SaranaPrasarana::create($validateData);

        return redirect('/admin/sarana-prasarana')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaranaPrasarana  $saranaPrasarana
     * @return \Illuminate\Http\Response
     */
    public function show($idSaranaPrasarana)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaranaPrasarana  $saranaPrasarana
     * @return \Illuminate\Http\Response
     */
    public function edit($idSaranaPrasarana)
    {
        return view('admin.saranaprasarana.edit', [
            'title' => 'Edit Sarana dan Prasarana',
            'saranaprasarana' => SaranaPrasarana::find(Crypt::decryptString($idSaranaPrasarana))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaranaPrasarana  $saranaPrasarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idSaranaPrasarana)
    {
        $saranaprasarana = SaranaPrasarana::find(Crypt::decryptString($idSaranaPrasarana));

        $validateData = $request->validate([
            'fotoSaranaPrasarana' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'namaSaranaPrasarana' => 'required',
            'deskripsiSaranaPrasarana' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' => ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fotoSaranaPrasarana')) {
            if ($request->fotoSaranaPrasarana) {
                if (Storage::exists($saranaprasarana->fotoSaranaPrasarana)) {
                    Storage::delete($saranaprasarana->fotoSaranaPrasarana);
                }

                $validateData['fotoSaranaPrasarana'] = Storage::put('media-saranaprasarana', $request->file('fotoSaranaPrasarana'));
            }
        }

        SaranaPrasarana::find($saranaprasarana->idSaranaPrasarana)->update($validateData);

        return redirect('/admin/sarana-prasarana')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaranaPrasarana  $saranaPrasarana
     * @return \Illuminate\Http\Response
     */
    public function destroy($idSaranaPrasarana)
    {
        $saranaprasarana = SaranaPrasarana::find(Crypt::decryptString($idSaranaPrasarana));

        if ($saranaprasarana->fotoSaranaPrasarana) {
            if (Storage::exists($saranaprasarana->fotoSaranaPrasarana)) {
                Storage::delete($saranaprasarana->fotoSaranaPrasarana);
            }
        }

        SaranaPrasarana::destroy($saranaprasarana->idSaranaPrasarana);

        return redirect('/admin/sarana-prasarana')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
