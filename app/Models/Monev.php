<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monev extends Model
{
     use HasFactory;

    protected $table = 'monev';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'program_id',
        'kesesuaian_waktu',
        'realisasi_anggaran',
        'tingkat_kes_anggaran',
        'tingkat_par_jemaat',
        'output_kegiatan',
        'kendala',
        'rencana_tin_lanjut',
        'upload_laporan',
    ];

    // Relasi ke Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
