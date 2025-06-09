<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_strategis extends Model
{
    use HasFactory;
    protected $table = 'program_strategis';
    protected $fillable = ['nama_program','periode_renstra'];
}
    