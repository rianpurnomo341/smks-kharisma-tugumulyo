<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengumuman extends Model
{
    use HasFactory;

    protected $table = 'kategoripengumuman';
    protected $primaryKey = 'idKategoriPengumuman';
    protected $guarded = ['idKategoriPengumuman'];

    public function KategoriPengumuman()
    {
        return $this->hasMany(KategoriPengumuman::class, 'idKategoriPengumuman ', 'idKategoriPengumuman ');
    }
}

