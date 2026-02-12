<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->integer('no_dokumen')->primary();
            $table->string('username', 20);
            $table->string('nama_dok', 50);

            $table->timestamp('tgl_proses')
                ->useCurrent()
                ->useCurrentOnUpdate();

            $table->enum('status', [
                'belum divalidasi',
                'sudah divalidasi',
                'revisi'
            ]);

            $table->enum('validasi', [
                'validasi',
                'tolak',
                'revisi'
            ]);

            $table->string('link', 100);
            $table->enum('jenis', [
                'kebijakan mutu',
                'internal mutu',
                'standar mutu',
                'sop',
                'audit mutu internal',
                'akreditasi perguruan tinggi',
                'akreditasi program studi',
                'pendokumentasian'
            ]);

            $table->text('keterangan')->nullable();
            $table->index('username');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen');
    }
};
