<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode_tahun extends Model
{
    use HasFactory;
    protected $table = 'periode_tahun';
    protected $fillable = ['nama_tahun','status'];
}
