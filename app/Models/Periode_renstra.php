<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode_renstra extends Model
{
    use HasFactory;
    protected $table = 'Periode_renstra';
    protected $fillable = ['nama_periode'];
}
