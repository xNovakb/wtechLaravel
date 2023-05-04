<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getProduct(Request $request, $id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        return view('detailOfProduct', ['product' => $product]);

    }

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
            return view('admin.adminMainPage', ['products' => $products, 'brands' => $brands, 'colors' => $colors]);
    }

    //delete product
    public function deleteProduct($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    //create product
    public function store(Request $request) {
        //dd($request->all());
        //$request->file('images')->getError();
        $formfields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'sex_id' => 'required',
            'brand_id' => 'required',
            'images'=> 'required'
        ]);

        //dd($request->file('images'));

        $product = Product::create($formfields);

            foreach ($request->file('images') as $image) {
                $imagePath = $image->storePublicly('images', 'public');

                $productImage = new ProductImages([
                    'image' => $imagePath
                ]);

                $product->images()->save($productImage);
            }


        return view('admin.productCreation');
    }
}
