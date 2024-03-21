<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\product_models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandModelController extends Controller
{
    public function index()
    {
        $productModels = product_models::with('brand')->get();
        return view('admin.Model.brand_model_list', ['productModels' => $productModels]);
    }

    public function page()
    {
        $data = Brand::get();
        return view('admin.Model.brand_model', compact('data'));
    }

    //public Create
    public function create(Request $request)
    {
        $this->vali($request);
        $data =  $this->dataArrange($request);
        product_models::create($data);
        return back()->with(['success' => 'Model  Creation  Success']);
    }

    //Private function Data Arrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->modelName,
            'brand_id' => $request->BrandId,
        ];
    }

    //Private Function for Validation
    private function vali($request)
    {
        $rules = [
            'modelName' => 'required',
            'BrandId' => 'required',
        ];
        Validator::make($request->all(), $rules)->validate();
    }
}
