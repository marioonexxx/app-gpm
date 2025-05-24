<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';

    protected $fillable = [
        'program_strategis',
        'nama_kegiatan',
        'seksi_id',
        'sub_seksi_id',
        'indikator',
        'biaya',
        'kelompok_sasaran',
        'tempat_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
        'keterangan_waktu',
        'keterangan',
        'tahun',
        'tahun_renstra',
        'status_program',
    ];

    // Relasi ke Seksi
    public function seksi()
    {
        return $this->belongsTo(Seksi::class, 'seksi_id');
    }

    // Relasi ke Sub Seksi
    public function sub_seksi()
    {
        return $this->belongsTo(Sub_seksi::class, 'sub_seksi_id');
    }
}
