<?php

namespace App\Http\Controllers;

use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;

class MultiImageController extends Controller
{
    public function index()
    {
        $multiImage = MultiImage::paginate(6);
        return view('admin.multiImage.index', compact('multiImage'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        foreach($image as $multi_image){
        $name_gen = hexdec(uniqid()). '.' . $multi_image->getClientOriginalExtension();
        Image::make($multi_image)->resize(300,200)->save('images/multiImage/'. $name_gen);
        $lastImage = 'images/multiImage/'. $name_gen;
    
        MultiImage::insert([
            'image'=>$lastImage,
            'created_at'=>Carbon::now()
        ]);
    }
    
            Session::flash('message', 'multiImage Insert Successfully');
    
            return redirect()->route('multipleImage.index');
    
        
        }
    }

