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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_tiket')->unique();

            $table->foreignId('pelapor_id')
                ->constrained('pelapors')
                ->onDelete('cascade');

            $table->foreignId('ruangan_id')
                ->constrained('ruangans')
                ->onDelete('cascade');

            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->onDelete('cascade');

            $table->text('keterangan');
            $table->string('dokumen_pendukung')->nullable();

            $table->enum('status', ['Diterima', 'Diproses', 'Selesai'])
                ->default('Diterima');

            $table->boolean('is_locked')->default(false);
            $table->text('deskripsi')->nullable();
            $table->dateTime('waktu_diproses')->nullable();

            // 🔥 Tambahan yang tadi dipisah
            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('updated_by_selesai')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
