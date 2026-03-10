<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruStaff extends Model
{
    use HasFactory;

    protected $table = 'guru_staff';
    protected $primaryKey = 'idGuruStaff';
    protected $guarded = ['idGuruStaff'];
}
