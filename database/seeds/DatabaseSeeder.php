<?php

use App\Schedulary;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new \Carbon\Carbon();
        $faker = Faker::create();

        for($i = 1;$i <= 100; $i++){

            $date = $carbon->parse("2020-06-10 07:00");
            $dateStart = $date->addHours($faker->numberBetween(0,7));
            $dateStart = $dateStart->addDays($faker->numberBetween(1,7));

            $endDate = $carbon->parse($dateStart)->addHours($faker->numberBetween(1,3));
            $endDate = $carbon->parse($endDate)->addDays($faker->numberBetween(0,3));

            Schedulary::Create([
                'dateStart' => $dateStart,
                'dateEnd' => $endDate,
                'report_id' => $i,
                'item_id' => $faker->numberBetween(1,20)
            ]);
        }
    }
}
