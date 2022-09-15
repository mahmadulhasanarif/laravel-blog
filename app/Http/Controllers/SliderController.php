<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;
class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(4);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');

        $name = hexdec(uniqid()).'.'.strtolower($image->getClientOriginalExtension());
        Image::make($image)->resize(1960,1080)->save('images/slider/'.$name);
        $image_req = 'images/slider/'.$name;

        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image_req
        ]);

        Session::flash('message', 'Data Inserted Successfully');
        return redirect()->route('slider.index');
    }

    public function edit(Slider $slider)
    {
        $slider['sliders'] = $slider;
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');

        $old_image = $request->old_image;
        unlink($old_image);

        $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image->getRealPath())->resize(1960,1080)->save('images/slider/'.$name);
        $image_req = 'images/slider/'.$name;

        Slider::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image_req
        ]);

        Session::flash('message', 'SLider Updated Successfully');
        return redirect()->route('slider.index');
    }
    public function delete($id)
    {
        $images = Slider::find($id);
        $old_image = $images->image;
        unlink($old_image);

        Slider::find($id)->delete();
        Session::flash('message', 'Slider Deleted Successfully');
        return redirect()->route('slider.index');
    }
}
