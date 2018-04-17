<?php namespace Maksim1990\Activities\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMaksim1990ActivitiesTypes extends Migration
{
    public function up()
    {
        Schema::create('maksim1990_activities_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('maksim1990_activities_types');
    }
}
