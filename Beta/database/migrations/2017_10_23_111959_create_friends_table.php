<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table)
        {
            $table->increments('id')->unique();
            $table->integer('requested_user_id');
        
            $table->integer('received_user_id');
            $table->boolean('accepted')->default(0);
        
            $table->boolean('active')->default(1);
            
            $table->timestamp('requested_at');
            $table->timestamp('accepted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friends');
    }
}
