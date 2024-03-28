<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        $this->vali($request);
        $data = $this->dataArrange($request);
        if ($request->hasfile('image')) {
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/products',  $imageName);
            $data['image'] = $imageName;
        }
        Product::create($data);
        return redirect()->route('product.index')->with(['success' => 'Product creation successfully']);
    }


    public function detail($id){
        $data = Product::where('id', $id)->with('brand','ProductModel')->first();
        return view('admin.Products.product_detail', compact('data'));
    }


    public function edit($id)
    {

        // $product = Product::findOrFail($id);
        $product =   Product::where('id', $id)->first();
        $brands = Brand::all();
        $models = ProductModel::all();
        return view('admin.Products.product_edit', compact('product', 'brands', 'models'));
    }


    public function update($id, Request $request)
    {
        $this->vali($request);
        $data = $this->dataArrange($request);

        if($request->hasFile('image')){
           $dbImage = Product::where('id', $id)->value('image');
            // Delete old image storage file
            if($dbImage !=null){
                Storage::delete('public/products/' . $dbImage);
            }
          $imageName =uniqid() . $request->file('image')->getClientOriginalName();
          $request->file('image')->storeAs('public/products', $imageName);
          $data['image']= $imageName;
        }
        Product::where('id', $id)->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }




    public function vali($request)
    {
        $rules = [
            'productName' => 'required',
            'image' => 'image | mimes:jpeg,jpg,png',
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

    private function dataArrange($request)
    {
        return [
            'name' => $request->productName,
            'brand_id' => $request->BrandName,
            'product_model_id' => $request->ModelName,
            'storage_option' => $request->storage_option,
            'color' => $request->color,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'low_stock' => $request->low_stock,
            'description' => $request->description,
        ];
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('product.index');
    }
}
