<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyatas', function (Blueprint $table) {
            $table->id();
            $table->string('lesen');
            $table->string('tahun')->nullable();
            $table->string('bulan')->nullable();
            $table->string('menu')->nullable();
            $table->string('penyata')->nullable();
            $table->string('kod_produk')->nullable();
            $table->string('kuantiti')->nullable();
            $table->string('id_penyata')->nullable();
            $table->string('pembekal')->nullable();
            $table->string('noborang')->nullable();
            $table->string('tarikh')->nullable();
            $table->string('nilai')->nullable();
            $table->string('namapengeksport')->nullable();
            $table->string('negara')->nullable();
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
        Schema::dropIfExists('penyatas');
    }
}
