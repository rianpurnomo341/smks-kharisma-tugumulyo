<?php

namespace App\Http\Controllers;

use App\Models\VisiMisiTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class VisiMisiTujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.visimisitujuan', [
            'title' => 'Profil sekolah',
            'visiMisiTujuan' => VisiMisiTujuan::find(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisiMisiTujuan  $visiMisiTujuan
     * @return \Illuminate\Http\Response
     */
    public function show(VisiMisiTujuan $visiMisiTujuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisiMisiTujuan  $visiMisiTujuan
     * @return \Illuminate\Http\Response
     */
    public function edit(VisiMisiTujuan $visiMisiTujuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisiMisiTujuan  $visiMisiTujuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idVisiMisiTujuan)
    {
        $visimisitujuan = VisiMisiTujuan::find(Crypt::decryptString($idVisiMisiTujuan));

        $validateData = $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
        ]);

        VisiMisiTujuan::find($visimisitujuan->idVisiMisiTujuan)->update($validateData);

        return redirect('/admin/visi-misi-tujuan')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisiMisiTujuan  $visiMisiTujuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisiMisiTujuan $visiMisiTujuan)
    {
        //
    }
}
