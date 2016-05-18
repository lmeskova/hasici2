<?php

namespace App\Providers;

use App\Incident;
use App\Town;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

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
            $newId = Incident::orderBy('id', 'desc')->first()->id + 1;

            $incident->evidence_number = $code.$year.$newId;

            return $incident;
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
