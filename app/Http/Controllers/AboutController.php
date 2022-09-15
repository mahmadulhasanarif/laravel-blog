<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->paginate(5);
        return view('admin.about.index', compact('abouts'));
    }
    public function create()
    {
        return view('admin.about.create');
    }
    public function store(Request $request)
    {
         $request->validate([
            'title'=>'required|min:6',
            'sort_desc'=>'required|min:10',
            'long_desc'=>'required|min:15'
        ],
        [
            'title.required'=>'Please Enter Title here',
            'sort_desc.required'=>'Please Enter Sort Description here',
            'long_desc.required'=>'Please Enter Long Description here',
        ]);

        About::insert([
            'title'=>$request->title,
            'sort_desc'=>$request->sort_desc,
            'long_desc'=>$request->long_desc
        ]);
        Session::flash('message', 'About Data Insert Successfully');
        return redirect()->route('about.index');
    }
    public function edit(About $about)
    {
        $about['abouts'] = $about;
        return view('admin.about.edit', compact('about'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|min:6',
            'sort_desc'=>'required|min:10',
            'long_desc'=>'required|min:15'
        ],
        [
            'title.required'=>'Please Enter Title here',
            'sort_desc.required'=>'Please Enter Sort Description here',
            'long_desc.required'=>'Please Enter Long Description here',
        ]);

        About::find($id)->update([
            'title'=>$request->title,
            'sort_desc'=>$request->sort_desc,
            'long_desc'=>$request->long_desc
        ]);
        Session::flash('message', 'About Data Updated Successfully');
        return redirect()->route('about.index');
    }
    public function delete($id)
    {
        About::find($id)->delete();
        Session::flash('message', 'About Data Deleted Successfully');
        return redirect()->route('about.index');
    }
}
