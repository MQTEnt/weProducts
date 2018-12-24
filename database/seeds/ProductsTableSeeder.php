<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();
       $limit = 20;
       for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert([
            	'name' => $faker->catchPhrase,
                'vipon_link' => $faker->url,
                'amazon_link' => $faker->url,
                'sold_price' => $faker->numberBetween(11, 20),
                'item_cost' => $faker->numberBetween(1, 10),
                'code' => $faker->swiftBicNumber,
                'expiry_date' => $faker->dateTimeBetween($startDate = '+1 days', $endDate = '+10 days', $timezone = null),
                'note' => $faker->text($maxNbChars = 10),
            ]);
        }
    }
}
