<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use DB;
use Session;

class CartController extends Controller
{   
    //load cart items for logged in user from database
    private function loadFromDB($user_id){
        $items = DB::table('user_product')
                            ->join('product', 'product.id', '=', 'user_product.product_id')
                            ->select('product.*', 'user_product.quantity')
                            ->where('user_product.user_id', '=', $user_id)
                            ->get();
        
        $products = array();
        foreach($items as $product) {
            $image = DB::table('product_image')->select('image')->where('product_id', '=', $product->id)->get();
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
                'quantity' => $product->quantity,
                'image' => $image[0]->image
            ];
        }
        return $products;
    }

    //load cart items for user that is not logged in from session
    private function loadFromSession(){
        $data = Session::get('added-items');
        $products = array();
        if ($data){
            foreach($data as $key => $value) {
                $id = $value['item_id'];
                $new_item = Product::find($id);
                $image = DB::table('product_image')->select('image')->where('product_id', '=', $id)->get();
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
                    'quantity' => $value['item_quantity'],
                    'image' => $image[0]->image
                ];
            }
        }
        return $products;
    }

    //show summary
    public function summary() {
        $user_id = Auth::id();
        if ($user_id == null) {
            $products = $this->loadFromSession();
            return view('cart.summary', [
                'products' => $products
            ]);
        }else{
            $products = $this->loadFromDB($user_id);
            return view('cart.summary', [
                'products' => $products
            ]);
        }
    }

    //delete item from cart
    public function delete(Request $request, $product_id) {
        $user_id = Auth::id();
        if ($user_id) {
            DB::table('user_product')->where([['user_id', '=', $user_id],['product_id', '=', $product_id]])->delete();
            $products = DB::table('user_product')
                                ->join('product', 'product.id', '=', 'user_product.product_id')
                                ->select('product.*')
                                ->where('user_product.user_id', '=', $user_id)
                                ->get();
            return redirect('/cart/summary');
        }else{
            $data = Session::get('added-items');
            $new = array();
            foreach ($data as $key => $value) {
                if ($value['item_id'] != $product_id){
                    $id = $value['item_id'];
                    $quantity = $value['item_quantity'];
                    $new[] = array(
                        'item_id' => $id,
                        'item_quantity' => $quantity,
                    );
                }
            }
            Session::put('added-items', $new);
            return redirect('/cart/summary');
        }
    }

    //show shipping
    public function shipping() {
        $user_id = Auth::id();
        if ($user_id == null) {
            $products = $this->loadFromSession();
            return view('cart.shipping', [
                'shippings' => Shipping::all(),
                'products' => $products
            ]);
        }else{
            $products = $this->loadFromDB($user_id);
            return view('cart.shipping', [
                'shippings' => Shipping::all(),
                'products' => $products
            ]);
        }
    }

    //show payment
    public function payment(Request $request) {
        $user_id = Auth::id();
        if ($user_id == null) {
            $products = $this->loadFromSession();
            return view('cart.payment', [
                'payments' => Payment::all(),
                'shipping_id' => $request->shipping,
                'products' => $products
            ]);
        }else{
            $products = $this->loadFromDB($user_id);
            return view('cart.payment', [
                'payments' => Payment::all(),
                'shipping_id' => $request->shipping,
                'products' => $products
            ]);
        }
    }

    //show info
    public function info(Request $request) {
        $user_id = Auth::id();
        if ($user_id == null) {
            $products = $this->loadFromSession();
            return view('cart.info', [
                'shipping_id' => $request->shipping,
                'payment_id' => $request->payment,
                'products' => $products,
                'user' => null
            ]);
        }else{
            $products = $this->loadFromDB($user_id);
            $user = User::find($user_id);
            return view('cart.info', [
                'shipping_id' => $request->shipping,
                'payment_id' => $request->payment,
                'products' => $products,
                'user' => $user
            ]);
        }
    }

    //store order
    public function store(Request $request) {
        switch ($request->input('action')) {
            //bol stlaceny button "Späť"
            case 'back':
                $user_id = Auth::id();
                if ($user_id == null) {
                    $products = $this->loadFromSession();
                    return view('cart.payment', [
                        'payments' => Payment::all(),
                        'shipping_id' => $request->shipping,
                        'products' => $products
                    ]);
                }else{
                    $products = $this->loadFromDB($user_id);
                    return view('cart.payment', [
                        'payments' => Payment::all(),
                        'shipping_id' => $request->shipping,
                        'products' => $products
                    ]);
                }
                break;
            //dokoncenie objednavky
            case 'save':
                //dorucenie na adresu bydliska pouzivatela
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
                    //vytvorenie zaznamu adresy
                    Address::create($formFields);
                    //ziskanie id zaznamu adresy
                    $address_id = DB::table('address')->select('id')->where([
                        ['street', $request->street],
                        ['city', $request->city],
                        ['psc', $request->psc]
                    ])->value('id');
                    //vytvorenie zaznamu objednavky
                    Order::create($formFields);
                    //ziskanie id zaznamu objednavky
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
                    //doplnenie idcka adresy do zaznamu objednavky
                    DB::table('order')->where('id', $order_id)->update(['address_id' => $address_id]);
                    //mapovanie produktov na objednavku
                    $user_id = Auth::id();
                    if ($user_id){
                        $products = $this->loadFromDB($user_id);
                        //update user_id hodnoty v zazname obejdnavky na idcko prihlaseneho usera
                        DB::table('order')->where('id', $order_id)->update(['user_id' => $user_id]);
                        foreach ($products as $key => $value) {
                            DB::insert('insert into order_product (order_id, product_id, quantity) values (?, ?, ?)', [$order_id, $value['id'], $value['quantity']]);
                            DB::table('user_product')->where([['user_id', '=', $user_id],['product_id', '=', $value['id']]])->delete();
                        }
                    }else{
                        $products = $this->loadFromSession();
                        foreach ($products as $key => $value) {
                            DB::insert('insert into order_product (order_id, product_id, quantity) values (?, ?, ?)', [$order_id, $value['id'], $value['quantity']]);
                        }
                        $new = array();
                        Session::put('added-items', $new);
                    }
                //dorucenie na inu adresu 
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
                    //vytvorenie zaznamu objednavky
                    Order::create($formFields);
                    //vytvorenie zaznamu adresy a ulozenie idcka
                    $address_id = DB::table('address')->insertGetId(
                        ['psc' => $request->psc2, 'street' => $request->street2, 'city' => $request->city2]
                    );
                    //ziskanie idcka objednavky
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
                    //doplnenie idcka adresy do zaznamu objednavky
                    DB::table('order')->where('id', $order_id)->update(['address_id' => $address_id]);
                    $user_id = Auth::id();
                    if ($user_id){
                        $products = $this->loadFromDB($user_id);
                        //update user_id hodnoty v zazname obejdnavky na idcko prihlaseneho usera
                        DB::table('order')->where('id', $order_id)->update(['user_id' => $user_id]);
                        foreach ($products as $key => $value) {
                            DB::insert('insert into order_product (order_id, product_id, quantity) values (?, ?, ?)', [$order_id, $value['id'], $value['quantity']]);
                            DB::table('user_product')->where([['user_id', '=', $user_id],['product_id', '=', $value['id']]])->delete();
                        }
                    }else{
                        $products = $this->loadFromSession();
                        foreach ($products as $key => $value) {
                            DB::insert('insert into order_product (order_id, product_id, quantity) values (?, ?, ?)', [$order_id, $value['id'], $value['quantity']]);
                        }
                        $new = array();
                        Session::put('added-items', $new);
                    }
                }
                session()->flash("success", "Objednávka bola vytvorená");
                return redirect('/');
                break;
        }
    }
}
