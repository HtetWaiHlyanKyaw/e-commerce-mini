<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    //
    public function page()
    {
        return view('admin/Brands/brand_create');
    }

    //brand create
    public function create(Request $request)
    {
        //validation
        $this->vali($request);

        Brand::create([
            'name' => $request->brandName,
        ]);
        return redirect()->route('brand.list')->with(['success' => 'Brand  Creation  Success']);
    }

    //brand List

    public function list()
    {
        $data = Brand::all();
        return view('admin.Brands.brand_list', compact('data'));
    }


    //Brand Edit
    public function edit($id)
    {
        $data = Brand::where('id', $id)->first();
        return view('admin.Brands.brand_edit', compact('data'));
    }

    //Brand Update
    public function update($id, Request $request)
    {
        //validation
        $this->vali($request);
        $data = $this->dataArrange($request);
        Brand::where('id', $id)->update($data);
        return redirect()->route('brand.list')->with(['success' => 'Brand  Edit Success']);
    }

    //brand delete
    public function delete($id)
    {
        Brand::where('id', $id)->delete();
        return redirect()->route('brand.list')->with(['success' => 'brand delete success']);
    }

    //Data Arrrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->brandName,
        ];
    }

    //brand validation
    private function vali($request)
    {
        Validator::make($request->all(), [
            'brandName' => 'required|unique:brands,name',

        ])->validate();
    }
}
