<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file(database_path('seeds/csvFiles/Districts.csv')));

        foreach ($csv as $row) {
            if (isset($row[3])) {

                $name = $row[0];
                $code = $row[1];
                $region_id = $row[2];


                $row[0] = $name;
                $row[1] = $code;
                $row[2] = $region_id;
            }

            District::create([
                'name' => $row[0],
                'code' => $row[1],
                'region_id' => $row[2]

            ]);
        }
    }
}
