<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEBioDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_bio_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('ebio_d1');
            $table->string('ebio_reg');
            $table->string('ebio_d3')->nullable();
            $table->string('ebio_d4')->nullable();
            $table->string('ebio_d5')->nullable();
            $table->string('ebio_d6')->nullable();
            $table->string('ebio_d7')->nullable();
            $table->string('ebio_d8')->nullable();
            $table->string('ebio_d9')->nullable();
            $table->string('nokontrak')->nullable();
            $table->string('port')->nullable();
            $table->string('portdest')->nullable();
            $table->string('matawang')->nullable();
            $table->string('nilai')->nullable();
            $table->string('nolesen_sykt')->nullable();
            $table->string('nama_sykt')->nullable();
            $table->string('nama_produk')->nullable();
            $table->string('nama_pelabuhan')->nullable();
            $table->string('kenderaan')->nullable();
            $table->string('kenderaan_nodaftar')->nullable();
            $table->string('nama_destport')->nullable();
            $table->string('nama_destnegara')->nullable();
            $table->string('nama_sykt1')->nullable();
            $table->string('mpobq_bungkusan')->nullable();
            $table->string('mpobq_nilai_2')->nullable();
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
        Schema::dropIfExists('e_bio_d_s');
    }
}
