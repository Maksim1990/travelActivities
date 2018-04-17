<?php

namespace Maksim1990\Activities\Updates;

use Maksim1990\Activities\Models\Activity;
use October\Rain\Database\Updates\Seeder;

use Faker;


class SeedAllTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker=Faker\Factory::create();
        for ($i=0;$i<100;$i++){

            $name=$faker->sentence($nbWords=3,$variableNbWords=true);
            Activity::create([
                'name'=>$name,
                'slug'=>str_slug($name,'-'),
                'description'=>$faker->paragraph($nbSentences=3,$variableNbSentences=true)
            ]);
        }


    }
}