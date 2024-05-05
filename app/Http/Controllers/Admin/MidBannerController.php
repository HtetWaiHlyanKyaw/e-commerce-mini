<?php

namespace App\Http\Controllers\Admin;

use App\Models\MiddleBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MidBannerController extends Controller
{
    public function list()
    {
        $datas = MiddleBanner::all();
        return view('admin.Banners.middleBanner_list', compact('datas'));
    }

    public function create()
    {
        return view('admin.Banners.middleBanner_create');
    }

    public function store(Request $request)
    {
        $this->vali($request);

        $data = $this->dataArrange($request);

        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $imageName1 = Hash::make($image1->getClientOriginalName()) . '.' . $image1->getClientOriginalExtension();
            $image1->storeAs('public/middleBanner', $imageName1);
            $data['image_1'] = $imageName1;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $imageName2 = Hash::make($image2->getClientOriginalName()) . '.' . $image2->getClientOriginalExtension();
            $image2->storeAs('public/middleBanner', $imageName2);
            $data['image_2'] = $imageName2;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $imageName3 = Hash::make($image3->getClientOriginalName()) . '.' . $image3->getClientOriginalExtension();
            $image3->storeAs('public/middleBanner', $imageName3);
            $data['image_3'] = $imageName3;
        }

        MiddleBanner::create($data);

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'middle Banner Creation Successful!',
        ]);

        return redirect()->route('admin.MiddleBanner.list');
    }

    public function edit($id)
    {
        $middleBanner = MiddleBanner::findOrFail($id);
        return view('admin.Banners.middleBanner_edit', compact('middleBanner'));
    }

    public function update($id, Request $request)
{
    $this->valiedit($request);
    $data = $this->dataArrange($request);

    // Check and update image 1
    if ($request->hasFile('image1')) {
        $image1 = $request->file('image1');
        $imageName1 = Hash::make($image1->getClientOriginalName()) . '.' . $image1->getClientOriginalExtension();
        $image1->storeAs('public/middleBanner', $imageName1);
        $data['image_1'] = $imageName1;
    } else {
        unset($data['image_1']); // Remove image_1 from the data if image1 input is empty
    }

    // Check and update image 2
    if ($request->hasFile('image2')) {
        $image2 = $request->file('image2');
        $imageName2 = Hash::make($image2->getClientOriginalName()) . '.' . $image2->getClientOriginalExtension();
        $image2->storeAs('public/middleBanner', $imageName2);
        $data['image_2'] = $imageName2;
    } else {
        unset($data['image_2']); // Remove image_2 from the data if image2 input is empty
    }

    // Check and update image 3
    if ($request->hasFile('image3')) {
        $image3 = $request->file('image3');
        $imageName3 = Hash::make($image3->getClientOriginalName()) . '.' . $image3->getClientOriginalExtension();
        $image3->storeAs('public/middleBanner', $imageName3);
        $data['image_3'] = $imageName3;
    } else {
        unset($data['image_3']); // Remove image_3 from the data if image3 input is empty
    }

    // Update the database
    MiddleBanner::where('id', $id)->update($data);

    session()->flash('alert', [
        'type' => 'success',
        'message' => 'Middle Banner Updated Successfully!',
    ]);

    return redirect()->route('admin.MiddleBanner.list');
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
        MiddleBanner::where('id', $id)->delete();
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Middle Banner Image Deleted  Successfully!',
        ]);
        return redirect()->route('admin.MiddleBanner.list')->with(['success' => 'Middle Banner deleted successfully']);
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
