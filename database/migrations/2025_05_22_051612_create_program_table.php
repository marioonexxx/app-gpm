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
        Schema::create('program', function (Blueprint $table) {
            $table->id();
            $table->string('program_strategis')->nullable();
            $table->string('nama_kegiatan')->nullable(); // kegiatan strategis
            $table->unsignedBigInteger('seksi_id')->nullable();
            $table->unsignedBigInteger('sub_seksi_id')->nullable();
            $table->string('indikator')->nullable();
            $table->string('biaya')->nullable();
            $table->string('kelompok_sasaran')->nullable();
            $table->string('tempat_kegiatan')->nullable();
            $table->date('waktu_mulai')->nullable();
            $table->date('waktu_selesai')->nullable();
            $table->string('keterangan_waktu')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('tahun_renstra')->nullable();      
            $table->string('status_usulan')->default('draft');   
            

            $table->timestamps();

            $table->foreign('seksi_id')->references('id')->on('seksi')->onDelete('set null');
            $table->foreign('sub_seksi_id')->references('id')->on('sub_seksi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program');
    }
};
