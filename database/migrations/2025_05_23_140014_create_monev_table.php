<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('monev', function (Blueprint $table) {
            $table->id();            
            // foreign key program_id
            $table->unsignedBigInteger('program_id')->unique();            
            $table->string('kesesuaian_waktu');
            $table->decimal('realisasi_anggaran', 15, 2);
            $table->string('tingkat_kes_anggaran');
            $table->string('tingkat_par_jemaat');
            $table->text('output_kegiatan');
            $table->text('kendala');
            $table->text('rencana_tin_lanjut');            
            // kolom untuk menyimpan nama file upload laporan (PDF)
            $table->string('upload_laporan')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('program_id')->references('id')->on('program')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monev');
    }
};
