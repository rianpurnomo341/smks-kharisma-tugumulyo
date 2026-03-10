<?php

namespace App\Http\Controllers;

use App\Models\Ts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class TsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ts.index', [
            'title' => 'TS',
            'no' => 1,
            'ts' => Ts::orderBy('updated_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ts.create', [
            'title' => 'Tambah TS'
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
            'fotoTs' => 'required|mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulTs' => 'required',
            'deskripsiTs' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fotoTs')) {
            if ($request->fotoTs) {
                $validateData['fotoTs'] = Storage::put('media-ts', $request->file('fotoTs'));
            }
        }

        Ts::create($validateData);

        return redirect('/admin/ts')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ts  $ts
     * @return \Illuminate\Http\Response
     */
    public function show($idTs)
    {
        return view('admin.ts.show', [
            'title' => 'Detail TS',
            'ts' => Ts::find(Crypt::decryptString($idTs))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ts  $ts
     * @return \Illuminate\Http\Response
     */
    public function edit($idTs)
    {
        return view('admin.ts.edit', [
            'title' => 'Edit TS',
            'ts' => Ts::find(Crypt::decryptString($idTs))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ts  $ts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idTs)
    {
        $ts = Ts::find(Crypt::decryptString($idTs));

        $validateData = $request->validate([
            'fotoTs' => 'mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulTs' => 'required',
            'deskripsiTs' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fotoTs')) {
            if ($request->fotoTs) {
                if (Storage::exists($ts->fotoTs)) {
                    Storage::delete($ts->fotoTs);
                }

                $validateData['fotoTs'] = Storage::put('media-ts', $request->file('fotoTs'));
            }
        }

        Ts::find($ts->idTs)->update($validateData);

        return redirect('/admin/ts')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ts  $ts
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTs)
    {
        $ts = Ts::find(Crypt::decryptString($idTs));

        if ($ts->fotoTs) {
            if (Storage::exists($ts->fotoTs)) {
                Storage::delete($ts->fotoTs);
            }
        }

        Ts::destroy($ts->idTs);

        return redirect('/admin/ts')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
