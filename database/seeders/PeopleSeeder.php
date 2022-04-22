<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->truncate();

        $file = fopen(__DIR__.'/../../names.csv', 'r');

        $people = [];

        //parse tab-separated values into an array
        while ($person = fgetcsv($file, 0, "\t")) {
            $people[] = [
                'first_name' => $person[0],
                'surname' => $person[1]
            ];
        }

        DB::table('people')->insert($people);
    }
}
