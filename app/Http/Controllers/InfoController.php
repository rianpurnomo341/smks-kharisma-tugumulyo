<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.info.index', [
            'title' => 'Info',
            'no' => 1,
            'info' => Info::orderBy('updated_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info.create', [
            'title' => 'Tambah Info'
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
            'fotoInfo' => 'required|mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulInfo' => 'required',
            'deskripsiInfo' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fotoInfo')) {
            if ($request->fotoInfo) {
                $validateData['fotoInfo'] = Storage::put('media-info', $request->file('fotoInfo'));
            }
        }

        Info::create($validateData);

        return redirect('/admin/info')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $Info
     * @return \Illuminate\Http\Response
     */
    public function show($idInfo)
    {
        return view('admin.info.show', [
            'title' => 'Detail Info',
            'info' => Info::find(Crypt::decryptString($idInfo))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit($idInfo)
    {
        return view('admin.info.edit', [
            'title' => 'Edit Info',
            'info' => Info::find(Crypt::decryptString($idInfo))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idInfo)
    {
        $info = Info::find(Crypt::decryptString($idInfo));

        $validateData = $request->validate([
            'fotoInfo' => 'mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulInfo' => 'required',
            'deskripsiInfo' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fotoInfo')) {
            if ($request->fotoInfo) {
                if (Storage::exists($info->fotoInfo)) {
                    Storage::delete($info->fotoInfo);
                }

                $validateData['fotoInfo'] = Storage::put('media-info', $request->file('fotoInfo'));
            }
        }

        Info::find($info->idInfo)->update($validateData);

        return redirect('/admin/info')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy($idInfo)
    {
        $info = Info::find(Crypt::decryptString($idInfo));

        if ($info->fotoInfo) {
            if (Storage::exists($info->fotoInfo)) {
                Storage::delete($info->fotoInfo);
            }
        }

        Info::destroy($info->idInfo);

        return redirect('/admin/info')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
