<?php namespace Maksim1990\Activities\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMaksim1990Activities extends Migration
{
    public function up()
    {
        Schema::create('maksim1990_activities_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable()->unsigned(false)->default(null);
            $table->string('slug')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('maksim1990_activities_');
    }
}
