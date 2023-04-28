<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Session;

class ProductController extends Controller
{
    public function getProduct(Request $request, $id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }
    
        return view('detailOfProduct', ['product' => $product]);

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
            return view('mainPage', ['products' => $products, 'brands' => $brands, 'colors' => $colors]);
    }

    public function addProduct(Request $request, $product_id) {
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
