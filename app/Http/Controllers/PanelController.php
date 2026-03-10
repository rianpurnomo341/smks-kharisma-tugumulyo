<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.panel', [
            'title' => 'Panel',
            'panel' => Panel::find(1)
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
     * @param  \App\Models\Panel  $panel
     * @return \Illuminate\Http\Response
     */
    public function show(Panel $panel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Panel  $panel
     * @return \Illuminate\Http\Response
     */
    public function edit(Panel $panel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panel  $panel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPanel)
    {
        $panel = Panel::find(Crypt::decryptString($idPanel));

        $validateData = $request->validate([
            'jmlSiswaSiswi' => 'required|numeric',
            'jmlRuangKelas' => 'required|numeric',
            'jmlGuruStaff' => 'required|numeric',
            'fotoMengapaSmkkharisma' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!',
            'numeric' =>  ':attribute harus berupa angka!',
        ]);

        if ($request->file('fotoMengapaSmkkharisma')) {
            if ($request->fotoMengapaSmkkharisma) {
                if (Storage::exists($panel->fotoMengapaSmkkharisma)) {
                    Storage::delete($panel->fotoMengapaSmkkharisma);
                }

                $validateData['fotoMengapaSmkkharisma'] = Storage::put('media-panel', $request->file('fotoMengapaSmkkharisma'));
            }
        }

        Panel::find($panel->idPanel)->update($validateData);

        return redirect('/admin/panel')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panel  $panel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panel $panel)
    {
        //
    }
}
