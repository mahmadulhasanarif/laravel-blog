<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::latest()->paginate(3);
        return view('admin.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:8',
            'icon'=>'required',
            'color'=>'required'
        ]);

        Feature::insert([
            'title'=>$request->title,
            'icon'=>$request->icon,
            'color'=>$request->color,
            'created_at'=>Carbon::now()
        ]);

        Session::flash('message', 'Feature Insert Successfully');
        return redirect()->route('feature.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        $feature['features'] = $feature;
        return view('admin.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|min:8',
            'icon'=>'required',
            'color'=>'required'
        ]);

        Feature::find($id)->update([
            'title'=>$request->title,
            'icon'=>$request->icon,
            'color'=>$request->color,
            'updated_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Feature Updated Successfully');
        return redirect()->route('feature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feature::find($id)->delete();
        Session::flash('message', 'Feature Deleted Successfully');
        return redirect()->route('feature.index');
    }
}
