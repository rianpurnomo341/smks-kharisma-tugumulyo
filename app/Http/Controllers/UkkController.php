<?php

namespace App\Http\Controllers;

use App\Models\Ukk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class UkkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ukk.index', [
            'title' => 'UKK',
            'no' => 1,
            'ukk' => Ukk::orderBy('updated_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ukk.create', [
            'title' => 'Tambah UKK'
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
            'fotoUkk' => 'required|mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulUkk' => 'required',
            'deskripsiUkk' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fotoUkk')) {
            if ($request->fotoUkk) {
                $validateData['fotoUkk'] = Storage::put('media-ukk', $request->file('fotoUkk'));
            }
        }

        Ukk::create($validateData);

        return redirect('/admin/ukk')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ukk  $ukk
     * @return \Illuminate\Http\Response
     */
    public function show($idUkk)
    {
        return view('admin.ukk.show', [
            'title' => 'Detail UKK',
            'ukk' => Ukk::find(Crypt::decryptString($idUkk))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ukk  $ukk
     * @return \Illuminate\Http\Response
     */
    public function edit($idUkk)
    {
        return view('admin.ukk.edit', [
            'title' => 'Edit UKK',
            'ukk' => Ukk::find(Crypt::decryptString($idUkk))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ukk  $ukk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUkk)
    {
        $ukk = Ukk::find(Crypt::decryptString($idUkk));

        $validateData = $request->validate([
            'fotoUkk' => 'mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulUkk' => 'required',
            'deskripsiUkk' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fotoUkk')) {
            if ($request->fotoUkk) {
                if (Storage::exists($ukk->fotoUkk)) {
                    Storage::delete($ukk->fotoUkk);
                }

                $validateData['fotoUkk'] = Storage::put('media-ukk', $request->file('fotoUkk'));
            }
        }

        Ukk::find($ukk->idUkk)->update($validateData);

        return redirect('/admin/ukk')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ukk  $ukk
     * @return \Illuminate\Http\Response
     */
    public function destroy($idUkk)
    {
        $ukk = Ukk::find(Crypt::decryptString($idUkk));

        if ($ukk->fotoUkk) {
            if (Storage::exists($ukk->fotoUkk)) {
                Storage::delete($ukk->fotoUkk);
            }
        }

        Ukk::destroy($ukk->idUkk);

        return redirect('/admin/ukk')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
