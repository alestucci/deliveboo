<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Api\OrderRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        // $data = [
        //     'success' => true,
        //     'token' => $token,
        // ];

        return $token;
    }

    public function makePayment(Request $request, Gateway $gateway)
    {
        // $request->validate([
        //     'name' => 'required | max:100',
        //     'surname' => 'required | max:100',
        //     'address' => 'required | max:100',
        //     'email' => 'required | email | max:100',
        // ]);

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {

            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo!',
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'success' => false,
                'message' => 'Transazione fallita!',
            ];

            return response()->json($data, 401);
        }



        // dd($request->nonce);
    //     $to = $request->email;

    //     $dishes = json_decode(request('cart'));

    //     $total = 0;
    //     foreach ($dishes as $dish) {
    //         $total += $dish->totalPrice;
    //     }
    //     json_decode(request('cart'));
    //     $nonceFromTheClient = $request->payment_method_nonce;
    //     $braintree = config('braintree');
    //     $result = $braintree->transaction()->sale([
    //         'amount' => $total,
    //         'paymentMethodNonce' => $nonceFromTheClient,
    //     ]);
    //     if ($result->success) {

    //         $filters= [];
    //         foreach ($dishes as $dish) {
    //           if (!in_array(array($dish->restaurant_id), $filters)) {
    //             array_push($filters,array($dish->restaurant_id));
    //           }
    //         }

    //         foreach ($dishes as $dish) {
    //           foreach ($filters as $key => $filter) {
    //             if ($dish->restaurant_id == $filter[0]) {
    //               // code...
    //               array_push($filters[$key],$dish);
    //             }
    //           }
    //         }
    //         foreach ($filters as $key => $filter) {
    //           $restaurantTotal=0;
    //           for ($i=1; $i < count($filter) ; $i++) {
    //             $restaurantTotal +=  $filter[$i]->totalPrice;
    //           }
    //           array_push($filters[$key],$restaurantTotal);
    //         }


    //         foreach ($filters as $filter) {
    //           // code...
    //           $newOrder = new Order;
    //           $newOrder->restaurant_id = $filter[0];
    //           $newOrder->amount = $filter[count($filter)-1];
    //           $newOrder->name = $request->name;
    //           $newOrder->surname = $request->surname;
    //           $newOrder->address = $request->address;
    //           $newOrder->email = $request->email;
    //           $order = [];
    //           for ($i=1; $i < count($filter)-1 ; $i++) {
    //             array_push($order,$filter[$i]);
    //           }
    //           $newOrder->order = json_encode($order);
    //           $newOrder->order_date = Carbon::now();

    //           $newOrder->save();

    //         }

    //         $datiUtente = [
    //             'name' => $request->name,
    //             'surname' => $request->surname,
    //             'address' => $request->address,
    //             'email' => $request->email,
    //             'amount' => $total,
    //         ];

    //         Mail::to($to)->send(new SendNewMail($datiUtente));

    //         //dd($result, $datiUtente, 'successo');

    //         return redirect()->route('checkout');
    //     } else {

    //         //dd($result, 'fallimento');
    //         return redirect()->route('checkoutf');

    //     }
    }
}

