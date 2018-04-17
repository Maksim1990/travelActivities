<?php

namespace Maksim1990\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUsers extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {

            $table->string('facebook')->nullable();
            $table->text('bio')->nullable();

        });
    }

    public function down()
    {
        $table->dropDown(['facebook','bio']);
    }

}
