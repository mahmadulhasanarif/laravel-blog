<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'brand_name'=>'required|unique:brands|min:3',
                'brand_image'=>'required|mimes:jpg,jpeg,png,pdf'
            ],
            [
                'brand_name.required'=>'Please Enter A Brand Name',
                'brand_image.required'=>"Please Enter Image Like jpg, jpeg, png, pdf"
            ]
        );

        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $upload_file = 'images/brand/';
        // $last_img = $upload_file.$img_name;
        // $brand_image->move($upload_file,$img_name);

        $brand_unique = hexdec(uniqid());

        $image_name = $brand_unique.'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('images/brand/'.$image_name);

        $last_img = 'images/brand/'.$image_name;


        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);

        Session::flash('message', 'Brand Inserted Successfully');

        return redirect()->route('brand.index');
    }

    public function edit(Brand $brand)
    {
        $brand['brands'] = Brand::all();
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand_image = $request->file('brand_image');

        if($brand_image){
            $old_image = $request->old_image;
            unlink($old_image);
            $image_id = hexdec(uniqid());
            $image_ext = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $image_id.'.'.$image_ext;
            $image_path = 'images/brand/';
            $image_req = $image_path.$image_name;
            $brand_image->move($image_path,$image_name);
         

            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_image'=>$image_req,
                'updated_at'=>Carbon::now()
            ]);
            Session::flash('message', "brand Updated Successfully");

            return redirect()->route('brand.index');
        }else{
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'updated_at'=>Carbon::now()
            ]);
            Session::flash('message', "brand Name Updated Successfully");

        return redirect()->route('brand.index');
        } 

    }

    public function delete($id)
    {
        $images = Brand::find($id);
        $old_image = $images->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        Session::flash('message', 'Brand Deleted Successfully');
        return redirect()->route('brand.index');
    }
}
