<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use FakerRestaurant\Provider\it_IT\Restaurant;
use Illuminate\Support\Facades\Hash;
use App\User;



// // Generator
// $faker->foodName();      // A random Food Name
// $faker->beverageName();  // A random Beverage Name
// $faker->dairyName();  // A random Dairy Name
// $faker->vegetableName();  // A random Vegetable Name
// $faker->fruitName();  // A random Fruit Name
// $faker->meatName();  // A random Meat Name
// $faker->sauceName();  // A random Sauce Name

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker = \Faker\Factory::create('it_IT');
        $faker->addProvider(new Restaurant($faker));
        for ($i=0; $i < 100 ; $i++) { 
            User::create([
                'name'          => 'Ristorante da ' . $faker->unique()->firstName(),
                'email'         => $faker->email(),
                'password'      => Hash::make('ciao'),
                'street'        => $faker->streetAddress(),
                'cap'           => $faker->postcode(),
                'city'          => $faker->city(),
                'phone_number'  => $faker->phoneNumber(),
                'p_iva'         => $faker->vat(),
                'day_off'       => $faker->numberBetween(0, 6),
                'closed'        => $faker->boolean(),
            ]);
        }
        
    }
}
