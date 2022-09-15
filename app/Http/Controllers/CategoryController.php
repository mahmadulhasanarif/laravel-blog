<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate(
        [
            'name'=>'required',
        ],
        [
            'name.required'=>'Please Input a category Name'
        ]
    );
        Category::create([
            'name'=>$request->name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);

        Session::flash('msg', 'Category Added Successfully');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category['categories'] = Category::all();
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Category::find($id)->update([
            'name'=>$request->name,
            'user_id'=>Auth::user()->id,
        ]);

        Session::flash('msg', 'Category Updated Successfully');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function softDelete(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

    public function trastIndex(){
        $trastIndex = Category::onlyTrashed()->latest()->paginate(5);
        return view('admin.category.trastIndex', compact('trastIndex'));
    }

    public function restore($id){
        Category::withTrashed()->find($id)->restore();
        Session::flash('msg', 'Category Restore Successfully');
        return redirect()->route('category.index');
    }
    public function Delete($id){
        Category::withTrashed()->find($id)->forceDelete();
        Session::flash('msg', 'Category Delete Successfully');
        return redirect()->route('category.index');
    }
}
