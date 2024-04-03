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
            'usertype' => $request->usertype,
            'password' => $request->AdminPassword,
        ]);

        if ($data->usertype === 'store_admin') {
            $data->assignRole('store_admin');
        } elseif ($data->usertype === 'supplier_admin') {
            $data->assignRole('supplier_admin');
        } elseif ($data->usertype === 'super_admin') {
            $data->assignRole('super_admin');
        }
        //  return redirect()->route('Admin.list')->with(['success' => 'Admin  Creation  Success']);
        return redirect()->route('Admin.list');
    }

    //Admin List
    public function list()
    {
        // Assuming your 'role' field stores the role of the user
        $data = User::whereIn('usertype', ['super_admin', 'supplier_admin', 'store_admin'])->get();
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
            'usertype' => $request->usertype,
        ];

        User::where('id', $id)->update($data);
        $user = User::findOrFail($id);
        $user->syncRoles([]);
        // Assign role based on usertype
        if ($user->usertype === 'store_admin') {
            $user->assignRole('store_admin');
        } elseif ($user->usertype === 'supplier_admin') {
            $user->assignRole('supplier_admin');
        } elseif ($user->usertype === 'super_admin') {
            $user->assignRole('super_admin');
        }
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
    private function dataArrange($request)
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
            'AdminEmail' => 'required|email|unique:users,email|max:255',
            'AdminPassword' => 'required',
            'usertype' => 'required',
        ])->validate();
    }

    //Admin Update validation
    private function updateVali($request)
    {
        $id = $request->id;
        Validator::make($request->all(), [
            'AdminName' => 'required',
            'AdminEmail' => 'required|unique:users,email,' . $id,
            'usertype' => 'required',
        ])->validate();
    }
}
