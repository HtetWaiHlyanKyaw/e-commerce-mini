<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
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
        $datas = Product::with('brand')->get();
        return view ('admin.Products.product_list',  compact('datas'));
    }

    public function create()
    {
        $brands = Brand::all();
        $models = ProductModel::all();
        return view('admin.Products.product_create', compact('brands', 'models'));
    }

    public function vali($request)
    {
        $rules = [
            'productName' => 'required',
            'photo' => 'required | photo | mimes:jpeg,jpg,png',
            'BrandName' => 'required',
            'Name' => 'required',
            'storage_option' => 'required',
            'color' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'low_stock' => 'required',
            'description' => 'required',
        ];
        Validator::make($request->all(), $rules)->validate();
    }

    public function store(Request $request)
    {
        $file_name= "";
        $file = $request->photo;
       // Default value if no photo is uploaded
        if ($file) {
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images'), $file_name);
        }



        Product::create([
            'name' => $request->productName,
            'photo' => $file_name,
            'brand_id' => $request->BrandId,
            'product_model_id' => $request->ModelName,
            'storage_option' => $request->storage_option,
            'color' => $request->color,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'low_stock' => $request->low_stock,
            'description' => $request->description,
        ]);

        return redirect()->route('product.index');
    }





    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('product.index');
    }
}
