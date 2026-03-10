<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ppdb.index', [
            'title' => 'PPDB',
            'no' => 1,
            'ppdb' => Ppdb::orderBy('updated_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ppdb.create', [
            'title' => 'Tambah PPDB'
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
            'fotoPpdb' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'filePpdb' => 'required|mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulPpdb' => 'required',
            'deskripsiPpdb' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('filePpdb')) {
            if ($request->filePpdb) {
                $validateData['filePpdb'] = Storage::put('media-ppdb', $request->file('filePpdb'));
            }
        }

        if ($request->file('fotoPpdb')) {
            if ($request->fotoPpdb) {
                $validateData['fotoPpdb'] = Storage::put('media-ppdb', $request->file('fotoPpdb'));
            }
        }

        Ppdb::create($validateData);

        return redirect('/admin/ppdb')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function show($idPpdb)
    {
        return view('admin.ppdb.show', [
            'title' => 'Detail PPDB',
            'ppdb' => Ppdb::find(Crypt::decryptString($idPpdb))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function edit($idPpdb)
    {
        return view('admin.ppdb.edit', [
            'title' => 'Edit PPDB',
            'ppdb' => Ppdb::find(Crypt::decryptString($idPpdb))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPpdb)
    {
        $ppdb = Ppdb::find(Crypt::decryptString($idPpdb));

        $validateData = $request->validate([
            'fotoPpdb' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'filePpdb' => 'mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulPpdb' => 'required',
            'deskripsiPpdb' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('filePpdb')) {
            if ($request->filePpdb) {
                if (Storage::exists($ppdb->filePpdb)) {
                    Storage::delete($ppdb->filePpdb);
                }

                $validateData['filePpdb'] = Storage::put('media-ppdb', $request->file('filePpdb'));
            }
        }

        if ($request->file('fotoPpdb')) {
            if ($request->fotoPpdb) {
                if (Storage::exists($ppdb->fotoPpdb)) {
                    Storage::delete($ppdb->fotoPpdb);
                }

                $validateData['fotoPpdb'] = Storage::put('media-ppdb', $request->file('fotoPpdb'));
            }
        }

        Ppdb::find($ppdb->idPpdb)->update($validateData);

        return redirect('/admin/ppdb')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPpdb)
    {
        $ppdb = Ppdb::find(Crypt::decryptString($idPpdb));

        if ($ppdb->filePpdb) {
            if (Storage::exists($ppdb->filePpdb)) {
                Storage::delete($ppdb->filePpdb);
            }
        }

        if ($ppdb->fotoPpdb) {
            if (Storage::exists($ppdb->fotoPpdb)) {
                Storage::delete($ppdb->fotoPpdb);
            }
        }

        Ppdb::destroy($ppdb->idPpdb);

        return redirect('/admin/ppdb')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
