<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsentrasi extends Model
{
    use HasFactory;

    protected $table = 'konsentrasi';
    protected $primaryKey = 'idKonsentrasi';
    protected $guarded = ['idKonsentrasi'];
}
