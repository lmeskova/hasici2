<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard(true);

        $this->call(InsuranceCompaniesSeeder::class);
        $this->call(FireExtinguishersSeeder::class);
        $this->call(InjuryCategoriesSeeder::class);
        $this->call(InjuryCircumstancesSeeder::class);
        $this->call(InjuryCircumstancesSeeder::class);
        $this->call(InjuryCategoriesSeeder::class);
        $this->call(InjuryCausesSeeder::class);
        $this->call(InjuryTypesSeeder::class);
        $this->call(OwnershipsSeeder::class);
        $this->call(DamageSpecificationsSeeder::class);
        $this->call(DamageTypesSeeder::class);
        $this->call(IndustryTypesSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(DamageDegreesSeeder::class);
        $this->call(FireLocationsSeeder::class);
        $this->call(VehiclePartsSeeder::class);
        $this->call(ConveyorEquipmentsSeeder::class);
        $this->call(SegmentFunctionsSeeder::class);
        $this->call(SegmentAltitudesSeeder::class);
        $this->call(FireResistancesSeeder::class);
        $this->call(FlammabilityOfObjectsSeeder::class);
        $this->call(FireShuttersSeeder::class);
        $this->call(SpreadingCausesSeeder::class);
        $this->call(ShutterResistancesSeeder::class);
        $this->call(FireAlarmsSeeder::class);
        $this->call(ChemicalsSeeder::class);
        $this->call(IncidentCausesSeeder::class);
        $this->call(FlammableSubstancesSeeder::class);
        $this->call(InitiatorsSeeder::class);
        $this->call(ElectricalWiringsSeeder::class);
        $this->call(InitiatorsImpactsSeeder::class);
        $this->call(BurningSubstancesSeeder::class);
        $this->call(FollowingSubstancesSeeder::class);
        $this->call(HazardClassesSeeder::class);
        $this->call(OrganizationShortcomingsSeeder::class);
        $this->call(ActionShortcomingsSeeder::class);
        $this->call(IncidentConclusionsSeeder::class);
        
        
    }
}
