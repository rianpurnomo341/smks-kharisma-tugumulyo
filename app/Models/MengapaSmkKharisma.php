<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MengapaSmkKharisma extends Model
{
    use HasFactory;

    protected $table = 'mengapa_smkkharisma';
    protected $primaryKey = 'idMengapaSmkkharisma';
    protected $guarded = ['idMengapaSmkKharisma'];
}
