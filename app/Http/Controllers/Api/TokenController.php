<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index(Request $request)
    {
        // $payload = $request->input('payload', false);
        // $nonce = $payload['nonce'];

        // $status = Braintree_Transaction::sale([
        // 'amount' => '10.00',
        // 'paymentMethodNonce' => $nonce,
        // 'options' => [
        //     'submitForSettlement' => True
        // ]
        // ]);

        // return response()->json($status);
        $braintree = config('braintree');
        $clienttoken = $braintree->clientToken()->generate();
        return $clienttoken;
    }
}
