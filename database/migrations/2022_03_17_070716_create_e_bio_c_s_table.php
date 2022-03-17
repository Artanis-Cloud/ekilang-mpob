<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEBioCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_bio_c_s', function (Blueprint $table) {
            $table->id();
            $table->string('ebio_c1');
            $table->string('ebio_reg');
            $table->string('ebio_c3')->nullable();
            $table->string('ebio_c4')->nullable();
            $table->string('ebio_c5')->nullable();
            $table->string('ebio_c6')->nullable();
            $table->string('ebio_c7')->nullable();
            $table->string('ebio_c8')->nullable();
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
        Schema::dropIfExists('e_bio_c_s');
    }
}
