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
        // Create users table with InnoDB engine
        Schema::create('users', function (Blueprint $table) {
            // Ensure InnoDB for FK support
            $table->engine = 'InnoDB';

            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('no_hp')->unique();
            $table->string('alamat');
            $table->string('role')
                ->comment('0. Administrator | 1. Seksi| 2. Sub Seksi | 3. Bendahara/Keuangan | 4. Litbang | 5. Sekretaris/Admin');
            $table->unsignedBigInteger('seksi_id')->nullable();
            $table->unsignedBigInteger('sub_seksi_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Add foreign key constraints referencing actual tables
        Schema::table('users', function (Blueprint $table) {
            // Verify that 'bidang' table exists and its id is unsignedBigInteger
            $table->foreign('seksi_id')
                ->references('id')
                ->on('seksi')    // adjust to your real table name
                ->onDelete('set null');

            $table->foreign('sub_seksi_id')
                ->references('id')
                ->on('sub_seksi')
                ->onDelete('set null');
        });



        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['bidang_id']);
            $table->dropForeign(['sub_bidang_id']);
        });

        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
