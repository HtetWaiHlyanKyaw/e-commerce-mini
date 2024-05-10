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
        $datas = Product::with('brand', 'ProductModel')->get();
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
        // dd($request->display, $request->resolution, $request->os, $request->chipset, $request->main_camera, $request->selfie_camera, $request->battery, $request->charging);

        $data = $this->dataArrange($request);
        if ($request->hasfile('image')) {
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/products',  $imageName);
            $data['image'] = $imageName;
        }
        Product::create($data);
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Product Creation  Successfully!',
        ]);
        return redirect()->route('product.index');
    }


    public function detail($id)
    {
        $data = Product::where('id', $id)->with('brand', 'ProductModel')->first();
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
        $this->valiEdit($request);
        $data = $this->dataArrange($request);

        if ($request->hasFile('image')) {
            $dbImage = Product::where('id', $id)->value('image');
            // Delete old image storage file
            if ($dbImage != null) {
                Storage::delete('public/products/' . $dbImage);
            }
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/products', $imageName);
            $data['image'] = $imageName;
        }
        Product::where('id', $id)->update($data);
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Product Updated  Successfully!',
        ]);
        return redirect()->route('product.index');
    }




    private function vali($request)
    {
        $rules = [
            'productName' => 'required|unique:products,name',
            'image' => 'image | mimes:jpeg,jpg,png,webp',
            'BrandName' => 'required',
            'ModelName' => 'required',
            'storage_option' => 'required',
            'color' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'low_stock' => 'required',
            'description' => 'required',
            'display' => 'required',
            'resolution' => 'required',
            'os' => 'required',
            'chipset' => 'required',
            'main_camera' => 'required',
            'selfie_camera' => 'required',
            'battery' => 'required',
            'charging' => 'required',
        ];

        Validator::make($request->all(), $rules)->validate();
    }

    private function valiEdit($request)
    {
        $id = $request->id; // Assuming 'id' is present in your request
        Validator::make($request->all(), [
            'productName' => 'required|unique:products,name,' . $id,
            'image' => 'image|mimes:jpeg,jpg,png,webp',
            'BrandName' => 'required',
            'ModelName' => 'required',
            'storage_option' => 'required',
            'color' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'low_stock' => 'required',
            'description' => 'required',
            'display' => 'required',
            'resolution' => 'required',
            'os' => 'required',
            'chipset' => 'required',
            'main_camera' => 'required',
            'selfie_camera' => 'required',
            'battery' => 'required',
            'charging' => 'required',
        ])->validate();
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
            'display' => $request->display,
            'resolution' => $request->resolution,
            'os' => $request->os,
            'chipset' => $request->chipset,
            'main_camera' => $request->main_camera,
            'selfie_camera' => $request->selfie_camera,
            'battery' => $request->battery,
            'charging' => $request->charging,
        ];
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Product Deleted  Successfully!',
        ]);
        return redirect()->route('product.index')->with(['success' => 'product delete success']);
    }
}
