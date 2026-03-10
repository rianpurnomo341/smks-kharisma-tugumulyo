<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengumuman;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idKategoriPengumuman)
    {
        $idKategoriPengumuman = Crypt::decryptString($idKategoriPengumuman);
        return view('admin.murid.index', [
            'title' => 'Murid',
            'no' => 1,
            'murid' => Murid::where('idKategoriPengumuman', $idKategoriPengumuman)->get(),
            'kategoriPengumuman' => KategoriPengumuman::find($idKategoriPengumuman),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idKategoriPengumuman)
    {
        return view('admin.murid.create', [
            'title' => 'Tambah Murid',
            'kategoriPengumuman' => KategoriPengumuman::find(Crypt::decryptString($idKategoriPengumuman)),
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
            'idKategoriPengumuman' => 'required',
            'tokenMurid' => 'required',
            'namaMurid' => 'required',
            'keteranganMurid' => '',
            'fileMurid' => 'mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'image' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fileMurid')) {
            if ($request->fileMurid) {
                $validateData['fileMurid'] = Storage::put('media-murid', $request->file('fileMurid'));
            }
        }

        Murid::create($validateData);

        return redirect('admin/kategori-pengumuman/murid/index/' . Crypt::encryptString($request->idKategoriPengumuman))->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function show($idMurid)
    {
        return view('admin.murid.show', [
            'title' => 'Detail Murid',
            'murid' => Murid::find(Crypt::decryptString($idMurid)),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function edit($idMurid)
    {
        return view('admin.murid.edit', [
            'title' => 'Edit Murid',
            'murid' => Murid::find(Crypt::decryptString($idMurid)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idMurid)
    {
        $murid = Murid::find(Crypt::decryptString($idMurid));
        
        $validateData = $request->validate([
            'tokenMurid' => 'required',
            'namaMurid' => 'required',
            'keteranganMurid' => '',
            'fileMurid' => 'mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' => ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fileMurid')) {
            if ($request->fileMurid) {
                if (Storage::exists($murid->fileMurid)) {
                    Storage::delete($murid->fileMurid);
                }

                $validateData['fileMurid'] = Storage::put('media-murid', $request->file('fileMurid'));
            }
        }

        Murid::find($murid->idMurid)->update($validateData);
        return redirect('admin/kategori-pengumuman/murid/index/' . Crypt::encryptString($murid->idKategoriPengumuman))->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function destroy($idMurid)
    {
        $murid = Murid::find(Crypt::decryptString($idMurid));

        if ($murid->fileMurid) {
            if (Storage::exists($murid->fileMurid)) {
                Storage::delete($murid->fileMurid);
            }
        }

        Murid::destroy($murid->idMurid);

        return redirect('admin/kategori-pengumuman/murid/index/' . Crypt::encryptString($murid->idKategoriPengumuman))->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
