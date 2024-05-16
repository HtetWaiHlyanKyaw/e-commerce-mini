<?php

namespace App\Http\Controllers\user;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //
    public function search(Request $request){
        $query = $request->input('query');
        $products = Product::where('name','like',"%$query%")->get();
        $groupedData = $products->groupBy('product_model_id');

        if($products->isEmpty()) {
            return response()->json([]);
        }
        else{
            return response()->json($groupedData);
        }
    }
}
