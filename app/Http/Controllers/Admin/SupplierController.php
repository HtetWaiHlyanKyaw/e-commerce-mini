<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;
class SupplierController extends Controller
{
    //
    public function page()
    {
        return view('admin.Suppliers.supplier_create');
    }
    public function list()
    {
        $suppliers = Supplier::all();
        return view('admin.Suppliers.supplier_list', compact('suppliers'));
    }

    public function create(Request $request)
    {
        //validation
        $this->vali($request);

        Supplier::create([
            'name' => $request->supplierName,
            'email' => $request->supplierEmail,
            'phone_number' => $request->supplierPhone,
            'address' => $request->supplierAddress,
        ]);
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Supplier Creation  Successfully!',
        ]);
        return redirect()->route('supplier.list');
    }
    private function vali($request)
    {
        Validator::make($request->all(), [
            'supplierName' => 'required|string|max:255',
            'supplierEmail' => 'required|email|max:255',
            'supplierPhone' => 'required|string|regex:/^09\d{9}$/',
            'supplierAddress' => 'required|string|max:255',
        ])->validate();
    }
    public function edit($id)
    {
        $suppliers = Supplier::where('id', $id)->first();
        return view('admin.Suppliers.supplier_edit', compact('suppliers'));
    }
    public function update($id, Request $request)
    {
        //validation
        $this->vali($request);
        $suppliers = $this->dataArrange($request);
        Supplier::where('id', $id)->update($suppliers);
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Supplier  Updated  Successfully!',
        ]);
        return redirect()->route('supplier.list');
    }
    private function dataArrange($request)
    {
        return [
            'name' => $request->supplierName,
            'email' => $request->supplierEmail,
            'phone_number' => $request->supplierPhone,
            'address' => $request->supplierAddress,
        ];
    }
    public function delete($id)
    {
        Supplier::where('id', $id)->delete();
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Supplier Deleted  Successfully!',
        ]);
        return redirect()->route('supplier.list');
    }
}
