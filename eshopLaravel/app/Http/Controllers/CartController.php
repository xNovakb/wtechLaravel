<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Address;
use App\Models\Order;
use DB;
use Session;

class CartController extends Controller
{
    //show summary
    public function summary(Request $request, $user_id) {
        if ($user_id == 0){
            $data = Session::get('added-items');
            $products = array();

            foreach($data as $key => $value) {
                $id = $value['item_id'];
                $new_item = Product::find($id);

                $products[] = [
                    'id' => $id,
                    'name' => $new_item->name,
                    'description' => $new_item->description,
                    'price' => $new_item->price,
                    'category_id' => $new_item->category_id,
                    'brand_id' => $new_item->brand_id,
                    'color_id' => $new_item->color_id,
                    'size_id' => $new_item->size_id,
                    'sex_id' => $new_item->sex_id,
                    'quantity' => $value['item_quantity']
                ];
            }
            return view('cart.summary', [
                'products' => $products
            ]);
        }else{
            $items = DB::table('user_product')
                                ->join('product', 'product.id', '=', 'user_product.product_id')
                                ->select('product.*', 'user_product.quantity')
                                ->where('user_product.user_id', '=', $user_id)
                                ->get();
            foreach($items as $product) {

                $products[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'category_id' => $product->category_id,
                    'brand_id' => $product->brand_id,
                    'color_id' => $product->color_id,
                    'size_id' => $product->size_id,
                    'sex_id' => $product->sex_id,
                    'quantity' => $product->quantity
                ];
            }
            return view('cart.summary', [
                'products' => $products
            ]);
        }
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
