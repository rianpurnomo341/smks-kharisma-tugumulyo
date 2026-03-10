<?php

namespace App\Http\Controllers;

use App\Models\Bkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class BkkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bkk.index', [
            'title' => 'BKK',
            'no' => 1,
            'bkk' => Bkk::orderBy('updated_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bkk.create', [
            'title' => 'Tambah BKK'
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
            'fotoBkk' => 'required|mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulBkk' => 'required',
            'deskripsiBkk' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fotoBkk')) {
            if ($request->fotoBkk) {
                $validateData['fotoBkk'] = Storage::put('media-bkk', $request->file('fotoBkk'));
            }
        }

        Bkk::create($validateData);

        return redirect('/admin/bkk')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bkk  $bkk
     * @return \Illuminate\Http\Response
     */
    public function show($idBkk)
    {
        return view('admin.bkk.show', [
            'title' => 'Detail BKK',
            'bkk' => Bkk::find(Crypt::decryptString($idBkk))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bkk  $bkk
     * @return \Illuminate\Http\Response
     */
    public function edit($idBkk)
    {
        return view('admin.bkk.edit', [
            'title' => 'Edit BKK',
            'bkk' => Bkk::find(Crypt::decryptString($idBkk))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bkk  $bkk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idBkk)
    {
        $bkk = Bkk::find(Crypt::decryptString($idBkk));

        $validateData = $request->validate([
            'fotoBkk' => 'mimes:png,jpg,jpeg,jfif,pdf,docx,xlsx,xlsm,xls,pptx,avi,mkv,mp4,mov,3gp,webp|max:50240',
            'judulBkk' => 'required',
            'deskripsiBkk' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fotoBkk')) {
            if ($request->fotoBkk) {
                if (Storage::exists($bkk->fotoBkk)) {
                    Storage::delete($bkk->fotoBkk);
                }

                $validateData['fotoBkk'] = Storage::put('media-bkk', $request->file('fotoBkk'));
            }
        }

        Bkk::find($bkk->idBkk)->update($validateData);

        return redirect('/admin/bkk')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bkk  $bkk
     * @return \Illuminate\Http\Response
     */
    public function destroy($idBkk)
    {
        $bkk = Bkk::find(Crypt::decryptString($idBkk));

        if ($bkk->fotoBkk) {
            if (Storage::exists($bkk->fotoBkk)) {
                Storage::delete($bkk->fotoBkk);
            }
        }

        Bkk::destroy($bkk->idBkk);

        return redirect('/admin/bkk')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
