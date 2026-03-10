<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakKita extends Model
{
    use HasFactory;

    protected $table = 'kontak_kita';
    protected $primaryKey = 'idKontakKita';
    protected $guarded = ['idKontakKita'];
}
