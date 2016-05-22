<?php

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    protected $faker;

    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->seed([
            'name' => 'admin',
            'email' => 'admin@blah.com',
            'password' => bcrypt(000000),
            'group_id' => 1
        ]);

        $this->seed([
            'name' => 'user1',
            'email' => 'user1@blah.com',
            'password' => bcrypt(000000),
            'group_id' => 3,
            'district_id' => 35
        ]);

    }

    private function seed($userData)
    {
        $user = \App\User::create($userData);

        for($i=0; $i < 20; $i++){
            $incident = $user->incidents()->create([
                'report_date' => \Carbon\Carbon::now(),
                'observe_date' => \Carbon\Carbon::now(),
                'address' => $this->faker->address,
                //'ownership_id' => 5,
                'damage_specification_id' => 5,
                'damage_type_id' => 6,
                'industry_type_id' => 6,
                'town_id' => 2119,
                'direct_damage_value' => 65465,
                'followup_damage_value' => 65465,
                'saved_value' => 46685,
            ]);

            $incident->incidentDetail()->create([
                'fire_location_id' => 6,
                'vehicle_part_id' => 5,
                'burning_substance_id' => 6,
            ]);

            $incident->damagedObject()->create([
                "dimension_value" => 5,
                "damage_degree_id" => 2,
                "segment_function_id" => 3,
                "segment_altitude_id" => 6,
                "fire_resistance_id" => 9,
                "flammability_of_object_id" => 8,
            ]);
        }
    }
}
