<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Up extends Model
{
    use HasFactory;

    protected $table = 'up';
    protected $primaryKey = 'idUp';
    protected $guarded = ['idUp'];
}
