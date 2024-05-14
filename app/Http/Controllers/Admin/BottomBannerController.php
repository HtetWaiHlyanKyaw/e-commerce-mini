<?php

namespace App\Http\Controllers\Admin;

use App\Models\BottomBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BottomBannerController extends Controller
{
    public function list()
    {
        $datas = BottomBanner::all();
        return view('admin.Banners.BottomBanner_list', compact('datas'));
    }

    public function create()
    {
        return view('admin.Banners.BottomBanner_create');
    }

    public function store(Request $request)
    {
        $this->vali($request);

        $data = $this->dataArrange($request);

        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $imageName1 = Hash::make($image1->getClientOriginalName()) . '.' . $image1->getClientOriginalExtension();
            $image1->storeAs('public/BottomBanner', $imageName1);
            $data['image_1'] = $imageName1;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $imageName2 = Hash::make($image2->getClientOriginalName()) . '.' . $image2->getClientOriginalExtension();
            $image2->storeAs('public/BottomBanner', $imageName2);
            $data['image_2'] = $imageName2;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $imageName3 = Hash::make($image3->getClientOriginalName()) . '.' . $image3->getClientOriginalExtension();
            $image3->storeAs('public/BottomBanner', $imageName3);
            $data['image_3'] = $imageName3;
        }

        BottomBanner::create($data);

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Bottom Banner Creation Successful!',
        ]);

        return redirect()->route('admin.BottomBanner.list');
    }

    public function edit($id)
    {
        $BottomBanner = BottomBanner::findOrFail($id);
        return view('admin.Banners.BottomBanner_edit', compact('BottomBanner'));
    }

    public function update($id, Request $request)
{
    $this->valiedit($request);
    $data = $this->dataArrange($request);

    // Check and update image 1
    if ($request->hasFile('image1')) {
        $image1 = $request->file('image1');
        $imageName1 = Hash::make($image1->getClientOriginalName()) . '.' . $image1->getClientOriginalExtension();
        $image1->storeAs('public/BottomBanner', $imageName1);
        $data['image_1'] = $imageName1;
    } else {
        unset($data['image_1']); // Remove image_1 from the data if image1 input is empty
    }

    // Check and update image 2
    if ($request->hasFile('image2')) {
        $image2 = $request->file('image2');
        $imageName2 = Hash::make($image2->getClientOriginalName()) . '.' . $image2->getClientOriginalExtension();
        $image2->storeAs('public/BottomBanner', $imageName2);
        $data['image_2'] = $imageName2;
    } else {
        unset($data['image_2']); // Remove image_2 from the data if image2 input is empty
    }

    // Check and update image 3
    if ($request->hasFile('image3')) {
        $image3 = $request->file('image3');
        $imageName3 = Hash::make($image3->getClientOriginalName()) . '.' . $image3->getClientOriginalExtension();
        $image3->storeAs('public/BottomBanner', $imageName3);
        $data['image_3'] = $imageName3;
    } else {
        unset($data['image_3']); // Remove image_3 from the data if image3 input is empty
    }

    // Update the database
    BottomBanner::where('id', $id)->update($data);

    session()->flash('alert', [
        'type' => 'success',
        'message' => 'Bottom Banner Updated Successfully!',
    ]);

    return redirect()->route('admin.BottomBanner.list');
}


    private function valiedit($request)
    {

        {
            $rules = [
                'image1' => 'image|mimes:jpeg,jpg,png,webp',
                'image2' => 'image|mimes:jpeg,jpg,png,webp',
                'image3' => 'image|mimes:jpeg,jpg,png,webp',
            ];

            Validator::make($request->all(), $rules)->validate();
        }
    }

    public function delete($id)
    {
        BottomBanner::where('id', $id)->delete();
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Bottom Banner Image Deleted  Successfully!',
        ]);
        return redirect()->route('admin.BottomBanner.list')->with(['success' => 'Bottom Banner deleted successfully']);
    }

    private function vali($request)
    {
        $rules = [
            'image1' => 'required|image|mimes:jpeg,jpg,png,webp',
            'image2' => 'required|image|mimes:jpeg,jpg,png,webp',
            'image3' => 'required|image|mimes:jpeg,jpg,png,webp',
        ];

        Validator::make($request->all(), $rules)->validate();
    }

    private function dataArrange($request)
    {
        return [
            'image_1' => $request->image1,
            'image_2' => $request->image2,
            'image_3' => $request->image3,
        ];
    }
}
