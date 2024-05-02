<?php

namespace App\Http\Controllers\Admin;

use App\Models\TopBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function list()
    {
        $datas = TopBanner::all();
        return view('admin.Banners.topBanner_list', compact('datas'));
    }

    public function create()
    {
        return view('admin.Banners.topBanner_create');
    }

    public function store(Request $request)
    {
        $this->vali($request);

        $data = $this->dataArrange($request);

        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $imageName1 = Hash::make($image1->getClientOriginalName()) . '.' . $image1->getClientOriginalExtension();
            $image1->storeAs('public/topBanner', $imageName1);
            $data['image_1'] = $imageName1;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $imageName2 = Hash::make($image2->getClientOriginalName()) . '.' . $image2->getClientOriginalExtension();
            $image2->storeAs('public/topBanner', $imageName2);
            $data['image_2'] = $imageName2;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $imageName3 = Hash::make($image3->getClientOriginalName()) . '.' . $image3->getClientOriginalExtension();
            $image3->storeAs('public/topBanner', $imageName3);
            $data['image_3'] = $imageName3;
        }

        TopBanner::create($data);

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Top Banner Creation Successfully!',
        ]);

        return redirect()->route('admin.TopBanner.list');
    }

    public function edit($id)
    {
        $topBanner = TopBanner::findOrFail($id);
        return view('admin.Banners.topBanner_edit', compact('topBanner'));
    }

    public function update($id, Request $request)
{
    $this->valiedit($request);
    $data = $this->dataArrange($request);

    // Check and update image 1
    if ($request->hasFile('image1')) {
        $image1 = $request->file('image1');
        $imageName1 = Hash::make($image1->getClientOriginalName()) . '.' . $image1->getClientOriginalExtension();
        $image1->storeAs('public/topBanner', $imageName1);
        $data['image_1'] = $imageName1;
    } else {
        unset($data['image_1']); // Remove image_1 from the data if image1 input is empty
    }

    // Check and update image 2
    if ($request->hasFile('image2')) {
        $image2 = $request->file('image2');
        $imageName2 = Hash::make($image2->getClientOriginalName()) . '.' . $image2->getClientOriginalExtension();
        $image2->storeAs('public/topBanner', $imageName2);
        $data['image_2'] = $imageName2;
    } else {
        unset($data['image_2']); // Remove image_2 from the data if image2 input is empty
    }

    // Check and update image 3
    if ($request->hasFile('image3')) {
        $image3 = $request->file('image3');
        $imageName3 = Hash::make($image3->getClientOriginalName()) . '.' . $image3->getClientOriginalExtension();
        $image3->storeAs('public/topBanner', $imageName3);
        $data['image_3'] = $imageName3;
    } else {
        unset($data['image_3']); // Remove image_3 from the data if image3 input is empty
    }

    // Update the database
    TopBanner::where('id', $id)->update($data);

    session()->flash('alert', [
        'type' => 'success',
        'message' => 'Top Banner Updated Successfully!',
    ]);

    return redirect()->back();
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
        TopBanner::where('id', $id)->delete();
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Product Deleted  Successfully!',
        ]);
        return redirect()->route('admin.TopBanner.list')->with(['success' => 'Top Banner deleted successfully']);
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
