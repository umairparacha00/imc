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
			$table->unsignedBigInteger('account_id')->unique();
			$table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
			$table->string('sponsor');
			$table->bigInteger('phone')->nullable();
			$table->bigInteger('postalcode')->nullable();
			$table->string('country')->nullable();
			$table->string('state')->nullable();
			$table->string('city')->nullable();
			$table->string('address')->nullable();
			$table->string('gender')->nullable();
			$table->date('date_of_birth')->nullable();
			$table->integer('status')->default(0);
			$table->string('password');
			$table->timestamp('email_verified_at')->nullable();
			$table->timestamp('last_logged_at')->nullable();
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
