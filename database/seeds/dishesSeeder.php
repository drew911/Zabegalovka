<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Dishes;

class dishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $faker -> name();

        foreach (range(1,10) as $key) {
          $dishes = new Dishes;
          $dishes->name = $faker->name;
          $dishes->description = $faker->text($maxNbChars = 150);
          $dishes->price = $faker->numberBetween(0.5,20);
          $dishes->image = $faker->imageUrl(800,600, 'nature');
          $dishes->save();
        }


    }
}
