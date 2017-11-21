<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_assignments', function (Blueprint $table)
        {
            $table->increments('id')->unique();
        
            $table->integer('user_id');
            $table->integer('assignment_id');
        
            $table->boolean('active')->default(1);
            
            $table->integer('start_time');
            
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
        Schema::drop('user_assignments');
    }
}
