<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    //
    public function page()
    {
        return view('admin/admin/admin_create');
    }

    //Admin create
    public function create(Request $request)
    {
        //validation
        $this->createVali($request);

        $data =  User::create([
            'name' => $request->AdminName,
            'email' => $request->AdminEmail,
            'usertype' => "admin",
            'password' => $request->AdminPassword,
        ]);
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Admin Created  Successfully!',
        ]);
        //  return redirect()->route('Admin.list')->with(['success' => 'Admin  Creation  Success']);
        return redirect()->route('Admin.list');
    }

    //Admin List
    public function list()
    {
        $data = User::where('usertype', 'Admin')->get();
        return view('admin.admin.admin_list', compact('data'));
    }


    //Admin Edit
    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.admin.admin_edit', compact('data'));
    }

    //Model update
    public function update($id, Request $request)
    {
        $this->updateVali($request);

        $data = [
            'name' => $request->AdminName,
            'email' => $request->AdminEmail,
        ];
        User::where('id', $id)->update($data);
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Admin Updated  Successfully!',
        ]);
        return redirect()->route('Admin.list');
    }

    //Admin delete
    public function delete($id)
    {
        User::where('id', $id)->delete();
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Admin Deleted  Successfully!',
        ]);
        return redirect()->route('Admin.list');
    }

    //Data Arrrange
    private function dataArrange( $request)
    {
        return [
            'name' => $request->AdminName,
            'email' => $request->AdminEmail,
            'password' => $request->AdminPassword,
        ];
    }

    //Admin Create validation
    private function createVali($request)
    {
        Validator::make($request->all(), [
            'AdminName' => 'required',
            'AdminEmail' => 'required|unique:users,email',
            'AdminPassword' => 'required',

        ])->validate();
    }

    //Admin Update validation
    private function updateVali($request)
    {
        Validator::make($request->all(), [
            'AdminName' => 'required',
            'AdminEmail' => 'required',
        ])->validate();
    }
}
