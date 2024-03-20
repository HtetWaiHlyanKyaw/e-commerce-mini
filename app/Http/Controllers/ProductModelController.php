<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductModelController extends Controller
{
    //
    public function index()
{
    $productModels = ProductModel::with('brand')->get();
    return view('admin.product_models.product_model_list', ['productModels' => $productModels]);
}
}
