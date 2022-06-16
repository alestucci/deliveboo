<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;
use App\Order;
//DB connection to insert data into the columns
use Illuminate\Support\Facades\DB;


class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $orders = Order::all();
        //$dishes = Dish::all();

        foreach ($orders as $order) {
            $orderDish = Dish::inRandomOrder()->limit(rand(3, 7))->get();
            $order->dishes()->attach($orderDish->pluck('id')->all(), [
                'quantity' => 0,
                'notes'    => ''
            ]);
        };

            $count = DB::table('dish_order')->where('order_id', '>', 0)->count(); 

            for($y=1; $y <= $count; $y++) {

                DB::table('dish_order')->where('index', $y)->update([
                    'quantity' => rand(1, 10),
                    'notes'    => $faker->paragraph()
                ]);
                
            };
        
        // update final_price
        for ($i=1; $i <= 1000 ; $i++) {
            
            $orderDishes = Order::find($i)->dishes()->get();
            $final_price = 0;
            foreach ($orderDishes as $dish) { 
                $final_price += $dish->price * $dish->pivot->quantity;
                DB::table('orders')->where('id', $i)->update(['final_price' => $final_price]);
            }
        }
    }
}
