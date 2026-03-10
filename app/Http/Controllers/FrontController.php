<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Bkk;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\GuruStaff;
use App\Models\Konsentrasi;
use App\Models\Kontak;
use App\Models\KontakKita;
use App\Models\MengapaSmkKharisma;
use App\Models\Panel;
use App\Models\Info;
use App\Models\KategoriPengumuman;
use App\Models\Murid;
use App\Models\Ppdb;
use App\Models\SambutanPimpinan;
use App\Models\SaranaPrasarana;
use App\Models\Sejarah;
use App\Models\StrukturSekolah;
use App\Models\Ts;
use App\Models\Ukk;
use App\Models\Up;
use App\Models\VisiMisiTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FrontController extends Controller
{
    // home
    public function home_index()
    {
        $panel = Panel::find(1);
        $sambutanpimpinan = SambutanPimpinan::find(1);

        return view('welcome', [
            'title' => 'Home',
            'jmlsiswasiswi' => $panel->jmlSiswaSiswi,
            'jmlruangkelas' => $panel->jmlRuangKelas,
            'jmlgurustaff' => $panel->jmlGuruStaff,
            'fotomengapasmkkharisma' => $panel->fotoMengapaSmkkharisma,
            'mengapasmkkharisma' => MengapaSmkKharisma::all(),
            'enamberita' => Berita::orderBy('updated_at', 'DESC')->take(6)->get(),
            'saranaprasarana' => SaranaPrasarana::all(),
            'ekstrakurikuler' => Ekstrakurikuler::all(),
            'videosambutanpimpinan' => $sambutanpimpinan->videoSambutanPimpinan,
            'deskripsisambutanpimpinan' => $sambutanpimpinan->deskripsiSambutanPimpinan,
            'namasambutanpimpinan' => $sambutanpimpinan->namaSambutanPimpinan,
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }

    // profil
    public function sejarah_index()
    {
        $sejarah = Sejarah::find(1);

        return view('profil.sejarah', [
            'title' => 'Sejarah',
            'fotosejarah' => $sejarah->fotoSejarah,
            'deskripsisejarah' => $sejarah->deskripsiSejarah,
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // profil
    public function visimisitujuan_index()
    {
        $visimisitujuan = VisiMisiTujuan::find(1);

        return view('profil.visimisitujuan', [
            'title' => 'Visi Misi Tujuan',
            'visi' => $visimisitujuan->visi,
            'misi' => $visimisitujuan->misi,
            'tujuan' => $visimisitujuan->tujuan,
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // profil
    public function struktur_index()
    {
        $struktursekolah = StrukturSekolah::find(1);

        return view('profil.struktur', [
            'title' => 'Struktur Sekolah',
            'fotoStrukturSekolah' => $struktursekolah->fotoStrukturSekolah,
            'deskripsiStrukturSekolah' => $struktursekolah->deskripsiStrukturSekolah,
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // profil
    public function gurustaff_index()
    {
        return view('profil.gurustaff', [
            'title' => 'Guru dan Staff',
            'gurustaff' => GuruStaff::all(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }

    // informasi
    public function berita_index()
    {
        return view('informasi.berita', [
            'title' => 'Berita',
            'berita' => Berita::orderBy('updated_at', 'DESC')->paginate(5)->withQueryString(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // informasi
    public function berita_show($idBerita)
    {
        $berita = Berita::find(Crypt::decryptString($idBerita));
        Berita::find($berita->idBerita)->update([
            'dilihat' => $berita->dilihat + 1,
        ]);

        return view('informasi.beritaShow', [
            'title' => 'Detail Berita',
            'berita' => $berita,
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // informasi
    public function pengumuman_index()
    {
        return view('informasi.kategoriPengumuman', [
            'title' => 'Kategori Pengumuman',
            'kategoriPengumuman' => KategoriPengumuman::where('showorhidden', true)->get(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // informasi
    public function pengumuman_cek_data(Request $request, $judulKategoriPengumuman)
    {
        $message_show = false;
        $message = false;
        $murid = Murid::where('tokenMurid', $request->tokenMurid)->first();
        
        if($murid && $request->tokenMurid) {
            $message_show = true;
            $message = 'Data Berhasil Ditemukan';
        }
        if(!$murid && $request->tokenMurid) {
            $message_show = true;
            $message = 'Data Tidak Ditemukan';
        }
        return view('informasi.cekDataPengumuman', [
            'title' => $judulKategoriPengumuman,
            'kategoriPengumuman' => KategoriPengumuman::where('judulKategoriPengumuman', $judulKategoriPengumuman)->first(),
            'murid' => $murid,
            'message_show' => $message_show,
            'message' => $message,
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // informasi
    public function info_index()
    {
        return view('informasi.info', [
            'title' => 'Info',
            'info' => Info::orderBy('updated_at', 'DESC')->paginate(5)->withQueryString(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // informasi
    public function info_show($idInfo)
    {
        return view('informasi.infoShow', [
            'title' => 'Detail Info',
            'info' => Info::find(Crypt::decryptString($idInfo)),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // informasi
    public function ppdb_index()
    {
        return view('informasi.ppdb', [
            'title' => 'PPDB',
            'ppdb' => Ppdb::orderBy('updated_at', 'DESC')->paginate(5)->withQueryString(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // informasi
    public function ppdb_show($idPpdb)
    {
        return view('informasi.ppdbShow', [
            'title' => 'Detail PPDB',
            'ppdb' => Ppdb::find(Crypt::decryptString($idPpdb)),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }

    // program
    public function bkk_index()
    {
        return view('program.bkk', [
            'title' => 'Bursa Kerja Khusus',
            'bkk' => Bkk::orderBy('updated_at', 'DESC')->paginate(5)->withQueryString(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // program
    public function bkk_show($idBkk)
    {
        return view('program.bkkShow', [
            'title' => 'Detail Bursa Kerja Khusus',
            'bkk' => Bkk::find(Crypt::decryptString($idBkk)),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // program
    public function up_index()
    {
        return view('program.up', [
            'title' => 'Unit Produksi',
            'up' => Up::orderBy('updated_at', 'DESC')->paginate(5)->withQueryString(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // program
    public function up_show($idUp)
    {
        return view('program.upShow', [
            'title' => 'Detail Bursa Kerja Khusus',
            'up' => Up::find(Crypt::decryptString($idUp)),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // program
    public function ukk_index()
    {
        return view('program.ukk', [
            'title' => 'Unit Produksi',
            'ukk' => Ukk::orderBy('updated_at', 'DESC')->paginate(5)->withQueryString(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // program
    public function ukk_show($idUkk)
    {
        return view('program.ukkShow', [
            'title' => 'Detail Bursa Kerja Khusus',
            'ukk' => Ukk::find(Crypt::decryptString($idUkk)),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // program
    public function ts_index()
    {
        return view('program.ts', [
            'title' => 'Tracer Study',
            'ts' => Ts::orderBy('updated_at', 'DESC')->paginate(5)->withQueryString(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // program
    public function ts_show($idUkk)
    {
        return view('program.tsShow', [
            'title' => 'Detail Tracer Study',
            'ts' => Ts::find(Crypt::decryptString($idUkk)),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }

    // konsentrasi
    public function konsentrasi_show($idKonsentrasi)
    {
        return view('konsentrasi', [
            'title' => 'Konsentrasi',
            'konsentrasiShow' => Konsentrasi::find(Crypt::decryptString($idKonsentrasi)),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }

    // galeri
    public function galeri_index()
    {
        return view('galeri', [
            'title' => 'Galeri',
            'galeri' => Galeri::orderBy('updated_at', 'DESC')->get(),
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }

    // kontak
    public function kontak_index()
    {
        $kontakkita = KontakKita::find(1);

        return view('kontak', [
            'title' => 'Kontak',
            'peta' => $kontakkita->peta,
            'email' => $kontakkita->email,
            'telepon' => $kontakkita->telepon,
            'alamat' => $kontakkita->alamat,
            'footerberduaberita' => Berita::orderBy('updated_at', 'DESC')->take(2)->get(),
            'konsentrasi' => Konsentrasi::all(),
            'bkkNavbar' => Bkk::orderBy('updated_at','DESC')->first()
        ]);
    }
    // kontak
    public function kontak_store(Request $request)
    {
        $validateData = $request->validate([
            'namaKontak' => 'required',
            'emailKontak' => 'required|email',
            'teleponKontak' => 'required',
            'pesanKontak' => 'required'
        ], [
            'required' =>  ':attribute tidak boleh kosong!'
        ]);

        Kontak::create($validateData);

        return redirect('/kontak')->with([
            'name' => 'notification',
            'title' => 'Data berhasil dikirim!',
            'icon' => 'success',
            'time' => '2500'
        ]);
    }
}
