<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEBioInitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_bio_inits', function (Blueprint $table) {
            $table->id();
            $table->string('ebio_reg');
            $table->string('ebio_nl');
            $table->string('ebio_bln')->nullable();
            $table->string('ebio_thn')->nullable();
            $table->string('ebio_flg')->nullable();
            $table->string('ebio_sdate')->nullable();
            $table->string('ebio_ddate')->nullable();
            $table->string('ebio_a5')->nullable();
            $table->string('ebio_a6')->nullable();
            $table->string('ebio_npg')->nullable();
            $table->string('ebio_jpg')->nullable();
            $table->string('ebio_flagcetak')->nullable();
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
        Schema::dropIfExists('e_bio_inits');
    }
}
