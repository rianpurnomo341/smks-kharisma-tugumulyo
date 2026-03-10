<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturSekolah extends Model
{
    use HasFactory;

    protected $table = 'struktur_sekolah';
    protected $primaryKey = 'idStrukturSekolah';
    protected $guarded = ['idStrukturSekolah'];
}
