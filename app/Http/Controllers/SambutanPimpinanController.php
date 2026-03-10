<?php

namespace App\Http\Controllers;

use App\Models\SambutanPimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class SambutanPimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sambutanpimpinan', [
            'title' => 'Sambutan Pimpinan',
            'sambutanPimpinan' => SambutanPimpinan::find(1)
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
     * @param  \App\Models\SambutanPimpinan  $sambutanPimpinan
     * @return \Illuminate\Http\Response
     */
    public function show(SambutanPimpinan $sambutanPimpinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SambutanPimpinan  $sambutanPimpinan
     * @return \Illuminate\Http\Response
     */
    public function edit(SambutanPimpinan $sambutanPimpinan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SambutanPimpinan  $sambutanPimpinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idSambutanPimpinan)
    {
        $sambutanpimpinan = SambutanPimpinan::find(Crypt::decryptString($idSambutanPimpinan));

        $validateData = $request->validate([
            'videoSambutanPimpinan' => 'mimes:mp4,mov,avi,mkv,3gp|max:102400',
            'namaSambutanPimpinan' => 'required',
            'deskripsiSambutanPimpinan' => 'required',
        ], [
            'mimes' => 'Format :attribute salah!',
            'max' => 'Ukuran :attribute terlalu besar!',
            'required' =>  ':attribute tidak boleh kosong!',
        ]);

        if ($request->file('videoSambutanPimpinan')) {
            if ($request->videoSambutanPimpinan) {
                if (Storage::exists($sambutanpimpinan->videoSambutanPimpinan)) {
                    Storage::delete($sambutanpimpinan->videoSambutanPimpinan);
                }

                $validateData['videoSambutanPimpinan'] = Storage::put('media-sambutanpimpinan', $request->file('videoSambutanPimpinan'));
            }
        }

        SambutanPimpinan::find($sambutanpimpinan->idSambutanPimpinan)->update($validateData);

        return redirect('/admin/sambutan-pimpinan')->with([
            'name' => 'notification',
            'title' => 'Data berhasil diedit!',
            'icon' => 'success',
            'time' => '2100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SambutanPimpinan  $sambutanPimpinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SambutanPimpinan $sambutanPimpinan)
    {
        //
    }
}
