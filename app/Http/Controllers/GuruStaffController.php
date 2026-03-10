<?php

namespace App\Http\Controllers;

use App\Models\GuruStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GuruStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gurustaff.index', [
            'title' => 'Guru dan Staff',
            'no' => 1,
            'gurustaff' => GuruStaff::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gurustaff.create', [
            'title' => 'Tambah Guru dan Staff'
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
            'fotoGuruStaff' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'namaGuruStaff' => 'required',
            'jabatanGuruStaff' => 'required',
        ], [
            'required' =>  ':attribute tidak boleh kosong!',
            'image' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!'
        ]);

        if ($request->file('fotoGuruStaff')) {
            if ($request->fotoGuruStaff) {
                $validateData['fotoGuruStaff'] = Storage::put('media-gurustaff', $request->file('fotoGuruStaff'));
            }
        }

        GuruStaff::create($validateData);

        return redirect('/admin/guru-staff')->with([
            'name' => 'notification',
            'title' => 'Data berhasil ditambah!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuruStaff  $guruStaff
     * @return \Illuminate\Http\Response
     */
    public function show(GuruStaff $guruStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuruStaff  $guruStaff
     * @return \Illuminate\Http\Response
     */
    public function edit($idGuruStaff)
    {
        return view('admin.gurustaff.edit', [
            'title' => 'Edit Guru dan Staff',
            'gurustaff' => GuruStaff::find(Crypt::decryptString($idGuruStaff))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuruStaff  $guruStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idGuruStaff)
    {
        $gurustaff = GuruStaff::find(Crypt::decryptString($idGuruStaff));

        $validateData = $request->validate([
            'fotoGuruStaff' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
            'namaGuruStaff' => 'required',
            'jabatanGuruStaff' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        if ($request->file('fotoGuruStaff')) {
            if ($request->fotoGuruStaff) {
                if (Storage::exists($gurustaff->fotoGuruStaff)) {
                    Storage::delete($gurustaff->fotoGuruStaff);
                }

                $validateData['fotoGuruStaff'] = Storage::put('media-gurustaff', $request->file('fotoGuruStaff'));
            }
        }

        GuruStaff::find($gurustaff->idGuruStaff)->update($validateData);

        return redirect('/admin/guru-staff')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuruStaff  $guruStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy($idGuruStaff)
    {
        $gurustaff = GuruStaff::find(Crypt::decryptString($idGuruStaff));

        if ($gurustaff->fotoGuruStaff) {
            if (Storage::exists($gurustaff->fotoGuruStaff)) {
                Storage::delete($gurustaff->fotoGuruStaff);
            }
        }

        GuruStaff::destroy($gurustaff->idGuruStaff);

        return redirect('/admin/guru-staff')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dihapus!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }
}
