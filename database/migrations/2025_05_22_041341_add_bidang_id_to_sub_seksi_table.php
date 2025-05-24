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
       Schema::table('sub_seksi', function (Blueprint $table) {
            $table->unsignedBigInteger('seksi_id')->nullable()->after('nama_sub_seksi');
            $table->foreign('seksi_id')->references('id')->on('seksi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_seksi', function (Blueprint $table) {
            $table->dropForeign(['seksi_id']);
            $table->dropColumn('seksi_id');
        });
    }
};
