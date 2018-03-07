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
            $table->integer('id')->unsigned()->comment('GitHub user id');
            $table->string('login', 100)->comment('GitHub login');
            $table->string('name', 100)->nullable()->default(null)->comment('GitHub username');
            $table->string('email', 100)->nullable()->default(null)->comment('GitHub public user email');
            $table->string('avatar')->nullable()->default(null)->comment('GitHub USER avatar');
            $table->string('token')->comment('GitHub user token.');

            $table->primary('id');
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
