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
            $table->increments('user_id');
            $table->string('username', 30)->unique();
            $table->string('password',255);
            $table->string('name', 50);
            $table->date('birthday')->nullable();
            $table->smallInteger('gender')->nullable();
            $table->string('address', 255);
            $table->string('tel', 11);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar',255)->nullable();
            $table->string('permission', 20)->default('customer');
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
