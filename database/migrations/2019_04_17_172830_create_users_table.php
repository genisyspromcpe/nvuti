<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->double('balance', 8,2)->default(0.00);
            $table->integer('vkId')->nullable();
            $table->integer('ref')->nullable();
            $table->string('ip')->nullable();
            $table->timestamp('last_bonus')->nullable();
            $table->text('game')->nullable();
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
