<?php

namespace App\Http\Controllers;

use App\Models\Up;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class UpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.up.index', [
            'title' => 'UP',
            'no' => 1,
            'up' => Up::orderBy('updated_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.up.create', [
            'title' => 'Tambah UP'
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
            'fotoUp' => 'required|mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulUp' => 'required',
            'deskripsiUp' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fotoUp')) {
            if ($request->fotoUp) {
                $validateData['fotoUp'] = Storage::put('media-up', $request->file('fotoUp'));
            }
        }

        Up::create($validateData);

        return redirect('/admin/up')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Up  $up
     * @return \Illuminate\Http\Response
     */
    public function show($idUp)
    {
        return view('admin.up.show', [
            'title' => 'Detail UP',
            'up' => Up::find(Crypt::decryptString($idUp))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Up  $up
     * @return \Illuminate\Http\Response
     */
    public function edit($idUp)
    {
        return view('admin.up.edit', [
            'title' => 'Edit UP',
            'up' => Up::find(Crypt::decryptString($idUp))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Up  $up
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUp)
    {
        $up = Up::find(Crypt::decryptString($idUp));

        $validateData = $request->validate([
            'fotoUp' => 'mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulUp' => 'required',
            'deskripsiUp' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fotoUp')) {
            if ($request->fotoUp) {
                if (Storage::exists($up->fotoUp)) {
                    Storage::delete($up->fotoUp);
                }

                $validateData['fotoUp'] = Storage::put('media-up', $request->file('fotoUp'));
            }
        }

        Up::find($up->idUp)->update($validateData);

        return redirect('/admin/up')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Up  $up
     * @return \Illuminate\Http\Response
     */
    public function destroy($idUp)
    {
        $up = Up::find(Crypt::decryptString($idUp));

        if ($up->fotoUp) {
            if (Storage::exists($up->fotoUp)) {
                Storage::delete($up->fotoUp);
            }
        }

        Up::destroy($up->idUp);

        return redirect('/admin/up')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
