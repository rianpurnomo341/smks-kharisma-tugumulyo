<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bkk extends Model
{
    use HasFactory;

    protected $table = 'bkk';
    protected $primaryKey = 'idBkk';
    protected $guarded = ['idBkk'];
}
