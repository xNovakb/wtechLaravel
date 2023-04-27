<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

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

            $products = Product::filter(['name', 'description', 'brand_id', 'color_id'], $searchTerm)
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
            return view('mainPage', ['products' => $products]);
    }
}
