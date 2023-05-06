<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function getProduct(Request $request, $id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }
    
        return view('detailOfProduct', ['product' => $product]);

    }

    public function updateQuantity(Request $request, $productId) {

        $user_id = Auth::id();

        if ($user_id){
            $quantity = $request->input('quantity');

            $userProduct = UserProduct::firstWhere('product_id', $productId)->get()[0];
            $userProduct->quantity = $quantity;
            $userProduct->save();
        }else{
            $array = Session::get('added-items');
            $new = array();
            foreach ($array as $key => $value) {
                if ($value['item_id'] == $productId){
                    $id = $value['item_id'];
                    $quantity = $request->input('quantity');
                }else{
                    $id = $value['item_id'];
                    $quantity = $value['item_quantity'];
                }
                $new[] = array(
                    'item_id' => $id,
                    'item_quantity' => $quantity,
                );
            }
            Session::put('added-items', $new);
        }



        return redirect('/cart/summary');
    }

    //
    public function getAndSortProductsBy(Request $request) {

            $searchTerm = $request->input('search');
            $sort = $request->input('sort');
            $filters = [
                'price_from' => $request->input('price_from'),
                'price_to' => $request->input('price_to'),
                'color' => $request->input('color'),
                'brand' => $request->input('brand'),
            ];
            
            $products = Product::filter(['name', 'description', 'brand_id', 'color_id'], $searchTerm, $filters)
                            ->when($sort == 'name_asc', function($query) {
                                return $query->orderBy('name', 'asc');
                            })
                            ->when($sort == 'name_desc', function($query) {
                                return $query->orderBy('name', 'desc');
                            })
                            ->when($sort == 'price_asc', function($query) {
                                return $query->orderBy('price', 'asc');
                            })
                            ->when($sort == 'price_desc', function($query) {
                                return $query->orderBy('price', 'desc');
                            })
                            ->simplePaginate(8);
            
            $brands = Product::distinct('brand_id')->pluck('brand_id');
            $colors = Product::distinct('color_id')->pluck('color_id');
            return view('mainPage', ['products' => $products, 'brands' => $brands, 'colors' => $colors, 'filters' => $filters]);
    }

    //pridanie produktu do kosika
    public function addProduct(Request $request, $product_id) {
        //ziskanie idcka usera
        $user_id = Auth::id();
        if($user_id) {
            $quantity = $request->quantity;
            $product_id = $request->product_id;
            
            $userProduct = UserProduct::where('user_id', $user_id)
                                    ->where('product_id', $product_id)
                                    ->first();
            
            if ($userProduct) {
                $userProduct->quantity += $quantity;
                $userProduct->save();
            }else{
                UserProduct::create([
                    'user_id' => $user_id,
                    'quantity' => $quantity,
                    'product_id' => $product_id,
                ]);
            }
            //ak sme neziskali idcko (user nie je prihlaseny) ukladame kosik do session
        }
        if (Session::has('added-items')) {
            Session::push('added-items', [
                'item_id' => $product_id,
                'item_quantity' => $request->quantity
            ]);

            $array = Session::get('added-items');
            $total = array();

            foreach ($array as $key => $value) {
                $id = $value['item_id'];
                $quantity = $value['item_quantity'];
                
                if (!isset($total[$id])) 
                {
                    $total[$id] = 0;
                }
                
                $total[$id] += $quantity;
            };

            $items = array();

            foreach($total as $item_id => $item_quantity) {
                $items[] = array(
                    'item_id' => $item_id,
                    'item_quantity' => $item_quantity
                    );
            };

            Session::put('added-items', $items);
        }else{
            Session::put('added-items', [
                0 => [
                    'item_id' => $product_id,
                    'item_quantity' => $request->quantity
                ]
            ]);
        }

        $product = Product::find($product_id);
        return view('detailOfProduct', ['product' => $product]);
    }
}
