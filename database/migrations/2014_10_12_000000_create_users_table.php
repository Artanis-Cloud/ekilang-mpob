<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('email')->unique();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username')->nullable(); //reg_pelesen->e_nl || reg_user->e_userid
            $table->string('category')->nullable(); //reg_pelesen->e_kat || reg_user->e_kat
            $table->string('kod_pegawai')->nullable(); //reg_pelesen->kodpgw
            $table->string('no_siri')->nullable(); //reg_pelesen->nosiri
            $table->string('status')->nullable(); //reg_pelesen->e_status
            $table->string('stock')->nullable(); //reg_pelesen->e_stock
            $table->string('directory')->nullable(); //reg_pelesen->directory
            $table->string('priv')->nullable(); //reg_user->e_priv
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
