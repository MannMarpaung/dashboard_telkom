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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_order');
            $table->string('tanggal_order');
            $table->string('nama_pelanggan');
            $table->string('nama_lokasi');
            $table->string('alamat_instalasi');
            $table->string('region');
            $table->string('witel');
            $table->string('sto');
            $table->string('bud');
            $table->string('segment');
            $table->string('nama_layanan');
            $table->string('tipe_order');
            $table->string('no_telp');
            $table->string('no_inet');
            $table->string('ncx_status');
            $table->string('update_date');
            $table->string('tgl_billcomp');
            $table->string('usia_billcomp');
            $table->string('kel_usia_billcomp');
            $table->string('tanggal_billcomp');
            $table->string('bulan_billcomp');
            $table->string('tahun_billcomp');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
