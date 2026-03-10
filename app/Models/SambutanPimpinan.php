<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SambutanPimpinan extends Model
{
    use HasFactory;

    protected $table = 'sambutan_pimpinan';
    protected $primaryKey = 'idSambutanPimpinan';
    protected $guarded = ['idSambutanPimpinan'];
}
