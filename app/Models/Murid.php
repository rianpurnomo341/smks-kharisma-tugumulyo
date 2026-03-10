<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $table = 'murid';
    protected $primaryKey = 'idMurid';
    protected $guarded = ['idMurid'];

    public function KategoriPengumuman()
    {
        return $this->belongsTo(KategoriPengumuman::class, 'idKategoriPengumuman ', 'idKategoriPengumuman ');
    }
}
