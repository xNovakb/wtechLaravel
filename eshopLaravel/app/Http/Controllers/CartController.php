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
    public function payment() {
        return view('cart.payment', [
            'payments' => Payment::all()
        ]);
    }
    //show info
    public function info() {
        return view('cart.info');
    }
}
