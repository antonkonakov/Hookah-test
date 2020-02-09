<?php

use App\Models\Hookah;
use App\Models\SmokingBar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $smoking_bars = factory(SmokingBar::class, 10)->create();
        //$hookahs = factory(Hookah::class, 10)->create();

        $smoking_bars->each(function($smoking_bar) {
            factory(Hookah::class, 10)->create(['smoking_bar_id' => $smoking_bar->id]);
        });

//        $smoking_bars->each(function (SmokingBar $smoking_bar) {
//            $smoking_bar->SmokingBar()->attach(
//                $hookahs->random(rand(4, 10))->pluck('id')->toArray(),
//                ['hookahs_count' => rand(1, 5)]
//            );
//        });
    }
}
