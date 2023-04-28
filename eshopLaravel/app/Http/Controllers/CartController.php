<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Address;
use App\Models\Order;
use DB;

class CartController extends Controller
{
    //show summary
    public function summary(Request $request, $user_id) {
        $products = DB::table('user_product')
                            ->join('product', 'product.id', '=', 'user_product.product_id')
                            ->select('product.*')
                            ->where('user_product.user_id', '=', $user_id)
                            ->get();

        return view('cart.summary', [
            'products' => $products
        ]);
    }

    //delete item from cart
    public function delete(Request $request, $user_id, $product_id) {
        DB::table('user_product')->where([['user_id', '=', $user_id],['product_id', '=', $product_id]])->delete();
        $products = DB::table('user_product')
                            ->join('product', 'product.id', '=', 'user_product.product_id')
                            ->select('product.*')
                            ->where('user_product.user_id', '=', $user_id)
                            ->get();
        return view('cart.summary', [
            'products' => $products
        ]);
    }
    //show shipping
    public function shipping() {
        return view('cart.shipping', [
            'shippings' => Shipping::all()
        ]);
    }
    //show payment
    public function payment(Request $request) {
        return view('cart.payment', [
            'payments' => Payment::all(),
            'shipping_id' => $request->shipping
        ]);
    }
    //show info
    public function info(Request $request) {
        return view('cart.info', [
            'shipping_id' => $request->shipping,
            'payment_id' => $request->payment
        ]);
    }
    //store order
    public function store(Request $request) {
        switch ($request->input('action')) {
            case 'back':
                return view('cart.payment', [
                    'payments' => Payment::all(),
                    'shipping_id' => $request->shipping
                ]);
                break;
    
            case 'save':
                if ($request->other == "false") {
                    $formFields = $request->validate([
                        'shipping' => 'required',
                        'payment' => 'required',
                        'name' => 'required',
                        'surname' => 'required',
                        'email' => ['required', 'email'],
                        'psc' => 'required',
                        'street' => 'required',
                        'city' => 'required',
                        'country' => 'required',
                        'phone' => 'required'
                    ]);
                    Address::create($formFields);
                    $address_id = DB::table('address')->select('id')->where([
                        ['street', $request->street],
                        ['city', $request->city],
                        ['psc', $request->psc]
                    ])->value('id');
                    Order::create($formFields);
                    $order_id = DB::table('order')->select('id')->where([
                        ['shipping', $request->shipping],
                        ['payment', $request->payment],
                        ['name', $request->name],
                        ['surname', $request->surname],
                        ['email', $request->email],
                        ['phone', $request->phone],
                        ['street', $request->street],
                        ['city', $request->city],
                        ['psc', $request->psc],
                        ['country', $request->country]
                    ])->value('id');
                    DB::table('order')->where('id', $order_id)->update(['address_id' => $address_id]);
                }else{
                    $formFields = $request->validate([
                        'shipping' => 'required',
                        'payment' => 'required',
                        'name' => 'required',
                        'surname' => 'required',
                        'email' => ['required', 'email'],
                        'psc' => 'required',
                        'street' => 'required',
                        'city' => 'required',
                        'country' => 'required',
                        'phone' => 'required',
                        'psc2' => 'required',
                        'street2' => 'required',
                        'city2' => 'required',
                    ]);
                    Order::create($formFields);
                    $address_id = DB::table('address')->insertGetId(
                        ['psc' => $request->psc2, 'street' => $request->street2, 'city' => $request->city2]
                    );
                    $order_id = DB::table('order')->select('id')->where([
                        ['shipping', $request->shipping],
                        ['payment', $request->payment],
                        ['name', $request->name],
                        ['surname', $request->surname],
                        ['email', $request->email],
                        ['phone', $request->phone],
                        ['street', $request->street],
                        ['city', $request->city],
                        ['psc', $request->psc],
                        ['country', $request->country]
                    ])->value('id');
                    DB::table('order')->where('id', $order_id)->update(['address_id' => $address_id]);
                }
                dd($request->all());
                break;
        }
    }
}
