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
            $orderDishes = Dish::inRandomOrder()->limit(rand(3, 7))->get();

            // How to add data Bridge into extra columns
            // $order->dishes()->attach($orderDishes->pluck('id')->all(), [
            //     'quantity'  => rand(1, 10),
            //     'notes'     => $faker->paragraph(),
                
            // ]);
            // foreach ($orderDishes as $orderDish) {
            $order->dishes()->attach($orderDishes->pluck('id'), [
                'quantity' => 0,
                'notes' => 'vuoto',
            ]);

            // }
            
            
            // $dishesInOrder = $order->dishes()->get();  
            
            // foreach ($dishesInOrder as $dishInOrder) {
            //     $dishInOrder->quantity = rand(1, 10);
            //     $dishInOrder->notes = $faker->paragraph();
            // }
        }
        // $orderDishCount = $order->dishes()->count();
        $orderDishCount = DB::table('dishes')->where('id', '>', 0)->count();
        

        for ($i=1; $i <= $orderDishCount ; $i++) {

            $dbs = DB::table('dish_order')->where('dish_id', $i)->count();

            for ($y=1; $y <= $dbs; $y++) {
                DB::table('dish_order')->where('order_id', $y)->update([
                    'quantity'  => rand(1, 10),
                    //'notes'     => $faker->paragraph(),
                ]);
            }
        }


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
