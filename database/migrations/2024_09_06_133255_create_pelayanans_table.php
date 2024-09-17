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
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelayanan', 25)->unique();
            $table->bigInteger('id_layanan')->nullable();
            $table->string('no')->nullable();
            $table->bigInteger('id_penginput')->nullable();
            $table->bigInteger('id_user')->nullable();
            $table->longText('file_terlampir')->nullable();
            $table->unsignedSmallInteger('is_tagihan')->default(0);
            $table->unsignedSmallInteger('is_pdf')->default(0);
            $table->unsignedSmallInteger('is_attachment')->default(0);
            $table->string('keterangan')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayanan');
    }
};
