<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{
    public function index()
     {
         // Eager load brand and model information
         $datas = Product::with('brand')->get();

         return view('admin.Products.product_list', compact('datas'));
     }



     public function create()
     {
        $brands = Brand::all();
        $models = ProductModel::all();
        return view('admin.Products.product_create', compact('brands', 'models'));
     }

    private function vali($request)
    {
        $rules = [
            'name' => 'required',
            'image' => 'required | image | mimes:jpeg,jpg,png',
            'brand_id' => 'required',
            'product_model_id' => 'required',
            'storage_option' => 'required',
            'color' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'low_stock' => 'required',
            'description' => 'required',

        ];
        Validator::make($request->all(), $rules)->validate();
    }

    public function store(Request $request){


        Product::create([

            'name' => $request ->productName,
            // 'image' =>$request->$file_name,
            'brand_id' => $request ->BrandId,
            'product_model_id' => $request->ModelName,
            'storage_option' => $request->storage_option,
            'color' => $request->color,
            'price' => $request ->price,
            'quantity' => $request ->quantity,
            'low_stock' => $request ->low_stock,
            'description' => $request ->description,

        ]);

        return redirect()->route('product.index')->with(['success' => 'Product created successfully']);
    }



    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('product.index')->with(['success' => 'product delete success']);
    }




}
