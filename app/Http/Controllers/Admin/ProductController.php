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
            'productName' => 'required',
            'image' => 'required | image | mimes:jpeg,jpg,png',
            'BrandName' => 'required',
            'ModelName' => 'required',
            'storage_option' => 'required',
            'color' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'low_stock' => 'required',
            'description' => 'required',

        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); // Store the image in storage/app/public/images directory
        }


        Validator::make($request->all(), $rules)->validate();
    }


    public function store(Request $request){

        $this->vali($request);
        Product::create([

            'name' => $request ->productName,
            'image' => $request ->imageName,
            'brand_id' => $request ->BrandName,
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

//Model Edit

// public function edit($id){
//     $modelData =   Product::where('id', $id)->first();
//     $brandData = Brand::get();

//     return view('admin/Products/product_edit', compact('modelData' , 'brandData' ));
//     }

    public function edit($id)
    {
        // $product = Product::findOrFail($id);
        $product =   Product::where('id', $id)->first();
        $brands = Brand::all();
        $models = ProductModel::all();
        return view('admin.Products.product_edit', compact('product', 'brands', 'models'));
    }

    //Product update

    // public function update($id, Request $request){
    //      $this->vali($request);
    //      $data = $this->dataArrange($request);

    //      Product::where('id', $id)->update($data);
    //      return redirect()->route('product.list')->with(['success' => 'Product update sucess']);

    // }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'product_model_id' => 'required',
            'storage_option' => 'required',
            'color' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required',
            'low_stock' => 'required',
            'description' => 'required',

        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->image = $request->image;
        $product->brand_id = $request->brand_id;
        $product->product_model_id = $request->product_model_id;
        $product->storage_option = $request->storage_option;
        $product->color = $request->color;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->low_stock = $request->low_stock;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('product.list')->with('success', 'Product updated successfully');
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('product.index')->with(['success' => 'product delete success']);
    }




}
