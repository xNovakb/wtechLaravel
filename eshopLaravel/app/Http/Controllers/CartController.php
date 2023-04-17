<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Payment;

class CartController extends Controller
{
    //show summary
    public function summary() {
        return view('cart.summary');
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
                dd($request->all());
                break;
        }
    }
}
