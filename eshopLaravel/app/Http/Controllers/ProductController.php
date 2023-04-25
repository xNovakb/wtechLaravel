<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function getAndSortProductsBy(Request $request) {
        $sort = $request->query('sort');

        switch ($sort) {
            case 'name_asc':
                $products = Product::orderBy('name', 'asc')->get();
                break;
            case 'name_desc':
                $products = Product::orderBy('name', 'desc')->get();
                break;
            case 'price_asc':
                $products = Product::orderBy('price', 'asc')->get();
                break;
            case 'price_desc':
                $products = Product::orderBy('price', 'desc')->get();
                break;
            default:
                $products = Product::all();
                break;
        }

        Log::info($products);
    
        return view('mainPage', ['products' => $products]);
    }
}
