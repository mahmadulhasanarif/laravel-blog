<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->paginate(3);
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
            'name'=>'required|min:3',
            'title'=>'required',
            'description'=>'required|min:15',
            'image'=>'required|mimes:jpg,jpeg,png,pdf'
        ]);

        $images = $request->file('image');
        $name = hexdec(uniqid()).'.'.strtolower($images->getClientOriginalExtension());
        Image::make($images)->resize(1960,1080)->save('images/team/'.$name);
        $image_req = 'images/team/'.$name;

        Team::insert([
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image_req,
            'created_at'=>Carbon::now()
        ]);

        Session::flash('message', 'Team Data Insert Successfully');
        return redirect()->route('team.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $team['teams'] = $team;
        return view('admin.team.edit', compact('team'));
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
            'name'=>'required|min:3',
            'title'=>'required',
            'description'=>'required|min:15',
            'image'=>'required|mimes:png,jpg,jpeg,pdf'
        ]);
        $images = $request->file('image');
        if($images){
           $old_image = $request->old_image;
            unlink($old_image);
            $name = hexdec(uniqid()).'.'.strtolower($images->getClientOriginalExtension());
            Image::make($images)->resize(1960,1080)->save('images/team/'.$name);
            $image_req = 'images/team/'.$name;
    
            Team::find($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'description'=>$request->description,
                'image'=>$image_req,
                'updated_at'=>Carbon::now()
            ]);
            Session::flash('message', 'Team Data Updated Successfully');
            return redirect()->route('team.index');
        }else{
            Team::find($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'description'=>$request->description,
                'updated_at'=>Carbon::now()
            ]);
            Session::flash('message', 'Team Some Updated Successfully');
            return redirect()->route('team.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teams = Team::find($id);
        $old_image = $teams->image;
        unlink($old_image);

        Team::find($id)->delete();
        Session::flash('message', 'Team Data Deleted Successfully');
        return redirect()->route('team.index');
    }
}
