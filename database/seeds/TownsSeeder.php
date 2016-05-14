<?php

use App\Town;
use Illuminate\Database\Seeder;

class TownsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file(database_path('seeds/csvFiles/Towns.csv')));

        foreach ($csv as $row) {
            
            Town::create([
                'name' => $row[0],
                'code' => $row[1],
                'district_id' => $row[2]
            ]);
        }
    }
}