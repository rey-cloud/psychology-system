<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('first_name')->regex('[A-Za-z]+');
            $table->string('last_name')->regex('[A-Za-z]+');
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->string('pass');
            $table->enum('type', ['admin', 'user']);
            $table->string('otp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

