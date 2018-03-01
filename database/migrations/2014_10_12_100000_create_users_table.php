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
            $table->increments('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('telephone_number');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('zip_code');
            $table->string('state');
            $table->string('image');
            $table->boolean('admin');
            $table->rememberToken();
            $table->timestamp('last_logged_in');
            $table->boolean('is_online');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
