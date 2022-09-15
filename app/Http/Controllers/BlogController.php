<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Image;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);
        return view('admin.blog.index', compact('blogs'));
    }
    public function create()
    {
        return view('admin.blog.create');
    }
    public function store(Request $request)
    {
         $request->validate([
            'title'=>'required|min:6',
            'sort_desc'=>'required|min:10',
            'long_desc'=>'required|min:15',
            'image'=>'required|mimes:png,jpg,jpeg,pdf,svg'
        ],
        [
            'title.required'=>'Please Enter Title here',
            'sort_desc.required'=>'Please Enter Sort Description here',
            'long_desc.required'=>'Please Enter Long Description here',
            'image.required'=>'Please Enter a Valid Image'
        ]);

        $images = $request->file('image');

        $name = hexdec(uniqid()).'.'.strtolower($images->getClientOriginalExtension());
        Image::make($images)->resize(1960, 1080)->save('images/blog/'.$name);
        $imgReq = 'images/blog/'.$name;

        Blog::insert([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'sort_desc'=>$request->sort_desc,
            'long_desc'=>$request->long_desc,
            'image'=>$imgReq,
            'created_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Blog Data Insert Successfully');
        return redirect()->route('blog.index');
    }
    public function edit(Blog $blog)
    {
        $blog['blogs'] = $blog;
        return view('admin.blog.edit', compact('blog'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|min:6',
            'sort_desc'=>'required|min:10',
            'long_desc'=>'required|min:15',
        ],
        [
            'title.required'=>'Please Enter Title here',
            'sort_desc.required'=>'Please Enter Sort Description here',
            'long_desc.required'=>'Please Enter Long Description here',
        ]);

        $images = $request->file('image');
        if(!$images){
            Blog::find($id)->update([
                'user_id'=>Auth::user()->id,
                'title'=>$request->title,
                'sort_desc'=>$request->sort_desc,
                'long_desc'=>$request->long_desc,
                'updated_at'=>Carbon::now()
            ]);
            Session::flash('message', 'About Data Updated Successfully');
            return redirect()->route('blog.index');

        }else{
            $old_image = $request->old_image;
            unlink($old_image);
            $name = hexdec(uniqid()).'.'.strtolower($images->getClientOriginalExtension());
            Image::make($images)->resize(1960, 1080)->save('images/blog/'.$name);
            $imgReq = 'images/blog/'.$name;

            Blog::find($id)->update([
                'user_id'=>Auth::user()->id,
                'title'=>$request->title,
                'sort_desc'=>$request->sort_desc,
                'long_desc'=>$request->long_desc,
                'image'=>$imgReq,
                'updated_at'=>Carbon::now()
            ]);
            Session::flash('message', 'Blog Updated Successfully');
            return redirect()->route('blog.index');
        }
    }
    public function delete($id)
    {
        $images = BLog::find($id);
        $old_image = $images->image;
        unlink($old_image);
        Blog::find($id)->delete();
        Session::flash('message', 'Blog Data Deleted Successfully');
        return redirect()->route('blog.index');
    }
}
