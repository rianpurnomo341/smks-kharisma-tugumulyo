<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukk extends Model
{
    use HasFactory;

    protected $table = 'ukk';
    protected $primaryKey = 'idUkk';
    protected $guarded = ['idUkk'];
}
