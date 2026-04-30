<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function ($table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->foreignId('role_id')->constrained('roles')->unsigned();
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}