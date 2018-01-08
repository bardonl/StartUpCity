<?php

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
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken()->unique()->nullable();
            $table->string('facebook_id')->unique()->nullable();
            $table->string('google_id')->unique()->nullable();
    
            $table->string('company_name')->unique()->nullable();
            $table->string('status')->nullable();
            $table->string('picture')->nullable();
    
            $table->boolean('online_status')->default(0);
            $table->timestamp('last_active')->nullable();
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
        Schema::drop('users');
    }
}
