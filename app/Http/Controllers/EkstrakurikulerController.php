<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ekstrakurikuler.index', [
            'title' => 'Ekstrakurikuler',
            'no' => 1,
            'ekstrakurikuler' => Ekstrakurikuler::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ekstrakurikuler.create', [
            'title' => 'Tambah Ekstrakurikuler'
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
            'fotoEkstrakurikuler' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'namaEkstrakurikuler' => 'required',
            'kepanjanganEkstrakurikuler' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fotoEkstrakurikuler')) {
            if ($request->fotoEkstrakurikuler) {
                $validateData['fotoEkstrakurikuler'] = Storage::put('media-ekstrakurikuler', $request->file('fotoEkstrakurikuler'));
            }
        }

        Ekstrakurikuler::create($validateData);

        return redirect('/admin/ekstrakurikuler')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function show($idEkstrakurikuler)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function edit($idEkstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', [
            'title' => 'Edit Ekstrakurikuler',
            'ekstrakurikuler' => Ekstrakurikuler::find(Crypt::decryptString($idEkstrakurikuler))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEkstrakurikuler)
    {
        $ekstrakurikuler = Ekstrakurikuler::find(Crypt::decryptString($idEkstrakurikuler));

        $validateData = $request->validate([
            'fotoEkstrakurikuler' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'namaEkstrakurikuler' => 'required',
            'kepanjanganEkstrakurikuler' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fotoEkstrakurikuler')) {
            if ($request->fotoEkstrakurikuler) {
                if (Storage::exists($ekstrakurikuler->fotoEkstrakurikuler)) {
                    Storage::delete($ekstrakurikuler->fotoEkstrakurikuler);
                }

                $validateData['fotoEkstrakurikuler'] = Storage::put('media-Ekstrakurikuler', $request->file('fotoEkstrakurikuler'));
            }
        }

        Ekstrakurikuler::find($ekstrakurikuler->idEkstrakurikuler)->update($validateData);

        return redirect('/admin/ekstrakurikuler')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEkstrakurikuler)
    {
        $ekstrakurikuler = Ekstrakurikuler::find(Crypt::decryptString($idEkstrakurikuler));

        if ($ekstrakurikuler->fotoEkstrakurikuler) {
            if (Storage::exists($ekstrakurikuler->fotoEkstrakurikuler)) {
                Storage::delete($ekstrakurikuler->fotoEkstrakurikuler);
            }
        }

        Ekstrakurikuler::destroy($ekstrakurikuler->idEkstrakurikuler);

        return redirect('/admin/ekstrakurikuler')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
