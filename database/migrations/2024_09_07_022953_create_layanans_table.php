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
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_layanan', 10)->unique();
            $table->string('nama_layanan');
            $table->string('keterangan')->nullable();
            $table->smallInteger('is_tagihan')->default(0);
            $table->smallInteger('is_pdf')->default(0);
            $table->smallInteger('is_attachment')->default(0);
            $table->longText('file_persyaratan')->nullable();
            $table->longText('header')->nullable();
            $table->longText('body')->nullable();
            $table->longText('footer')->nullable();
            $table->enum('status', ['active', 'disabled'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
