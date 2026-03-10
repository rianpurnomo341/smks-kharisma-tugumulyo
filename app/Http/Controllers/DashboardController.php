<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\GuruStaff;
use App\Models\Konsentrasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'gurustaff' => GuruStaff::count(),
            'berita' => Berita::count(),
            'galeri' => Galeri::count(),
            'konsentrasi' => Konsentrasi::count()
        ]);
    }
}
