<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //show summary
    public function summary() {
        return view('cart.summary');
    }
    //show shipping
    public function shipping() {
        return view('cart.shipping');
    }
    //show payment
    public function payment() {
        return view('cart.payment');
    }
    //show info
    public function info() {
        return view('cart.info');
    }
}
