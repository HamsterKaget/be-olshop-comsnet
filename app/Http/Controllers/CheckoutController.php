<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{

    public function process(Request $request) {
        // Saves user data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // checkout process
        $code = 'STORE-' . mt_rand(000000, 999999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();

        // Transaction Create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ]);

        foreach($carts as $cart) {
            $trx = 'TRX-' . mt_rand('000000', '999999');

            // dd($cart->product->price);
            $transactionDetail = TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx,
            ]);
        }

        // Delete current cart
        Cart::where('users_id', Auth::user()->id)->delete();

        // Config Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Make Array for submit to midtrans
        $midtrans = [
            "transaction_details" => [
                "order_id" => $code,
                "gross_amount" => (int) $request->total_price,
            ],
            "costumer_detail" => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            "enable_payment" => [
                "credit_card",
                "gopay",
                "shopeepay",
                "bank_transfer"
            ],
            "vtweb" => [

            ]
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
            // header('Location: ' . $paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function callback(Request $request) {

    }

}
