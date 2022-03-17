<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEBioBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_bio_b_s', function (Blueprint $table) {
            $table->id();
            $table->string('ebio_b1');
            $table->string('ebio_reg');
            $table->string('ebio_b3')->nullable();
            $table->string('ebio_b4')->nullable();
            $table->string('ebio_b5')->nullable();
            $table->string('ebio_b6')->nullable();
            $table->string('ebio_b7')->nullable();
            $table->string('ebio_b8')->nullable();
            $table->string('ebio_b9')->nullable();
            $table->string('ebio_b10')->nullable();
            $table->string('ebio_b11')->nullable();
            $table->string('ebio_b12')->nullable();
            $table->string('ebio_b13')->nullable();
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
        Schema::dropIfExists('e_bio_b_s');
    }
}
