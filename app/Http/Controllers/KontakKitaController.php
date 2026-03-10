<?php

namespace App\Http\Controllers;

use App\Models\KontakKita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KontakKitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kontakkita', [
            'title' => 'Kontak Kita',
            'kontakKita' => KontakKita::find(1)
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
     * @param  \App\Models\KontakKita  $kontakKita
     * @return \Illuminate\Http\Response
     */
    public function show(KontakKita $kontakKita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KontakKita  $kontakKita
     * @return \Illuminate\Http\Response
     */
    public function edit(KontakKita $kontakKita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KontakKita  $kontakKita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idKontakKita)
    {
        $kontakkita = KontakKita::find(Crypt::decryptString($idKontakKita));

        $validateData = $request->validate([
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required',
            'peta' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'email' =>  'Format :attribute salah!'
        ]);

        KontakKita::find($kontakkita->idKontakKita)->update($validateData);

        return redirect('/admin/kontak-kita')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KontakKita  $kontakKita
     * @return \Illuminate\Http\Response
     */
    public function destroy(KontakKita $kontakKita)
    {
        //
    }
}
