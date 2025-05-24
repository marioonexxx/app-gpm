<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_seksi extends Model
{
    use HasFactory;
    protected $table = 'Sub_seksi';
    protected $fillable = ['nama_sub_seksi'];
}
