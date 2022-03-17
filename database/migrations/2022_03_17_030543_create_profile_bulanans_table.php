<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_bulanans', function (Blueprint $table) {
            $table->id();
            $table->string('no_lesen');
            $table->string('no_lesen_KPPK')->nullable();
            $table->string('n_premis')->nullable();
            $table->string('srkt_induk')->nullable();
            $table->string('no_tel')->nullable();
            $table->string('no_faks')->nullable();
            $table->string('no_pgw_m')->nullable();
            $table->string('j_pgw_m')->nullable();
            $table->string('n_pgw_b')->nullable();
            $table->string('j_pgw_b')->nullable();
            $table->string('tarikh_lapor')->nullable();
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('tarikh_hantar')->nullable();
            $table->string('alamat_premis')->nullable();
            $table->string('negeri_premis')->nullable();
            $table->string('daerah_premis')->nullable();
            $table->string('poskod_premis')->nullable();
            $table->string('alamat_surat')->nullable();
            $table->string('negeri')->nullable();
            $table->string('daerah')->nullable();
            $table->string('poskod')->nullable();
            $table->string('jenis')->nullable();
            $table->string('nama_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_bulanans');
    }
}
