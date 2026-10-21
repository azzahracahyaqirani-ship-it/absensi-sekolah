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
    Schema::create('qr_tokens', function (Blueprint $table) {
        $table->id();
        $table->foreignId('qr_location_id')->constrained('qr_locations');
        $table->string('token')->unique();
        $table->date('tanggal');
        $table->time('waktu_mulai');
        $table->time('waktu_berakhir');
        $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_tokens');
    }
};
