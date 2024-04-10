<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function shop(){

        $brands = Brand::get();
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');
        $products = Product::with('brand', 'ProductModel')->get();
        $uniqueColors = $products->pluck('color')->unique();
        $uniqueStorage = $products->pluck('storage_option')->unique();
        // return view('user.shop',compact('brands','minPrice','maxPrice','uniqueColors','uniqueStorage'));
         // Eager load brand and model information
         $datas = Product::with('brand', 'ProductModel')->paginate(8);
        //  dd($datas);
         return view('user.shop', compact('datas','brands','minPrice','maxPrice','uniqueColors','uniqueStorage'));

    }

    public function details(Request $request){  //product details and purchase option
        // dd($id);
            // $datas = Product::with('brand', 'ProductModel')->where('id', $id)->first();

            // if(!$datas) {
            //     // Product with given ID not found, handle the situation accordingly
            //     abort(404); // or return a view indicating the product was not found
            // }

            // return view('user.buyProduct', compact('datas'));

            $modelId = $request->input('model_id');
            $products = Product::where('product_model_id', $modelId)->get();
            $storageOptions = $products->pluck('storage_option')->unique();
            $colors = $products->pluck('color')->unique();

            // Pass products, storage options, and colors to the view
            return view('user.buyProduct', [
                'products' => $products,
                'storageOptions' => $storageOptions,
                'colors' => $colors,
                'modelId' => $modelId,
            ]);
        }

    }


