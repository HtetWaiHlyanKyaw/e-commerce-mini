<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Validator;

class BrandModelController extends Controller
{
    public function index()
    {
        $productModels = ProductModel::with('brand')->get();
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
        ProductModel::create($data);
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Model  Creation  Successfully!',
        ]);
        return redirect()->route('model.list');
    }



   //Model Edit
   public function edit($id){
   $modelData =   ProductModel::where('id', $id)->first();
   $brandData = Brand::get();

   return view('admin/Model/brand_model_edit', compact('modelData' , 'brandData' ));
   }

   //Model update
   public function update($id, Request $request){
        $this->vali($request);
        $data = $this->dataArrange($request);

        ProductModel::where('id', $id)->update($data);
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Model  Updated  Successfully!',
        ]);
        return redirect()->route('model.list');

   }

      //brand delete
      public function delete($id)
      {

        ProductModel::where('id', $id)->delete();
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Model  Deleted  Successfully!',
        ]);
          return redirect()->route('model.list');
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
