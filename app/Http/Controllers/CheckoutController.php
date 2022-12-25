<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $product = Product::find($request->product_id);
        header('Content-Type: application/json');
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
               'price_data' => [
                   'currency' => 'inr',
                   'unit_amount' => $product->price * 100,
                   'product_data' => [
                       'name' => $product->name,
                       //'images' => ["https://placehold.it/350x250"],
                   ],
               ],
               'quantity' => 1,
        ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return response()->json(['id' => $checkout_session->id]);
    }


    public function success()
    {
        return view('success');
    }

    public function cancel()
    {
        return view('cancel');
    }

    public function handleFailedPayment()
    {
        //
    }

}
