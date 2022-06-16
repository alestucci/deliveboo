<?php

use Illuminate\Database\Seeder;
use App\Order;
use Illuminate\Support\Facades\DB;
use App\Dish;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $orders = Order::all();
        


        for ($i=1; $i <= 1000 ; $i++) {
            $orderDishes = Order::find($i)->dishes()->get();
            $final_price = 0;
            foreach ($orderDishes as $dish) { 

                //TODO: Creating Seeder for Final Price  
                $final_price += $dish->price * $dish->pivot->quantity;
                DB::table('orders')->where('id', $i)->update(['final_price' => $final_price]);

            }
        }
    }
}
