<?php

use App\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserGroup::create(['name' => 'Administrátor']);
        UserGroup::create(['name' => 'Krajské riaditeľstvo']);
        UserGroup::create(['name' => 'Okresné riaditeľstvo']);
        UserGroup::create(['name' => 'Ministerstvo vnútra']);
    }
}
