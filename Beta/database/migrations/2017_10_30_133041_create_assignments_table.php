<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table)
        {
            $table->increments('id')->unique();
    
            $table->integer('assignment_type_id');
            $table->integer('skill_id');
            $table->integer('entry_level_id');
    
            $table->string('title');
            $table->integer('duration');
            $table->integer('peanuts');
            $table->integer('experience_points');
            $table->string('image');
    
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
        Schema::drop('assignments');
    }
}
