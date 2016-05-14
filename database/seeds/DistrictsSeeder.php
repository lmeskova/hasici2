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
            District::create([
                'name' => $row[0],
                'code' => $row[1],
                'region_id' => $row[2]
            ]);
        }
    }
}
