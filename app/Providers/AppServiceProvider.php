<?php

namespace App\Providers;

use App\Incident;
use App\Town;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Incident::creating(function ($incident){

            $code = Town::find($incident->town_id)->district->code;
            $year = Carbon::now()->format("y");
            $newIdObj = Incident::orderBy('id', 'desc')->first();

            $newId = 1;

            if($newIdObj)
                $newId = $newIdObj->id + 1;

            $incident->evidence_number = $code.$year.$newId;

            return $incident;
        });


        $this->app->singleton(FakerGenerator::class, function () {
            return FakerFactory::create('sk_SK');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
