<?php

namespace App\Http\Controllers;

use App\Models\MengapaSmkKharisma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MengapaSmkKharismaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mengapaSmkKharisma.index', [
            'title' => 'Mengapa Smk Kharisma',
            'no' => 1,
            'mengapasmkkharisma' => MengapaSmkKharisma::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mengapaSmkKharisma.create', [
            'title' => 'Tambah Mengapa Smk Kharisma'
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
            'deskripsiMengapaSmkkharisma' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
        ]);

        MengapaSmkKharisma::create($validateData);

        return redirect('/admin/mengapa-smk-kharisma')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MengapaSmkKharisma  $mengapaSmkKharisma
     * @return \Illuminate\Http\Response
     */
    public function show(MengapaSmkKharisma $mengapaSmkKharisma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MengapaSmkKharisma  $mengapaSmkKharisma
     * @return \Illuminate\Http\Response
     */
    public function edit($idMengapaSmkkharisma)
    {
        return view('admin.mengapaSmkKharisma.edit', [
            'title' => 'Edit Mengapa Smk Kharisma',
            'mengapasmkkharisma' => MengapaSmkKharisma::find(Crypt::decryptString($idMengapaSmkkharisma))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MengapaSmkKharisma  $mengapaSmkKharisma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idMengapaSmkkharisma)
    {
        $mengapasmkkharisma = MengapaSmkKharisma::find(Crypt::decryptString($idMengapaSmkkharisma));

        $validateData = $request->validate([
            'deskripsiMengapaSmkkharisma' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        MengapaSmkKharisma::find($mengapasmkkharisma->idMengapaSmkkharisma)->update($validateData);

        return redirect('/admin/mengapa-smk-kharisma')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MengapaSmkKharisma  $mengapaSmkKharisma
     * @return \Illuminate\Http\Response
     */
    public function destroy($idMengapaSmkkharisma)
    {
        $mengapasmkkharisma = MengapaSmkKharisma::find(Crypt::decryptString($idMengapaSmkkharisma));

        MengapaSmkKharisma::destroy($mengapasmkkharisma->idMengapaSmkkharisma);

        return redirect('/admin/mengapa-smk-kharisma')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
