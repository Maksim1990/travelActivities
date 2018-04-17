<?php namespace Maksim1990\Activities\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMaksim1990ActivitiesHotels extends Migration
{
    public function up()
    {
        Schema::create('maksim1990_activities_hotels', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable()->unsigned(false)->default(null);
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('maksim1990_activities_hotels');
    }
}
