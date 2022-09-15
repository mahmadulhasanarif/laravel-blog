<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->paginate(3);
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'description'=>'required|min:15',
            'icon'=>'required'
        ]);

        Service::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'icon'=>$request->icon,
            'created_at'=>Carbon::now()
        ]);

        Session::flash('message', 'Service Insert Successfully');
        return redirect()->route('service.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service['services'] = $service;
        return view('admin.service.edit', compact('service'));
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
            'description'=>'required|min:15',
            'icon'=>'required'
        ]);

        Service::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'icon'=>$request->icon,
            'updated_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Service Updated Successfully');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        Session::flash('message', 'Service Deleted Successfully');
        return redirect()->route('service.index');
    }
}
