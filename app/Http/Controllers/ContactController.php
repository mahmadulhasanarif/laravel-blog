<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
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
            'address'=>'required|min:8',
            'email'=>'required',
            'phone'=>'required'
        ]);

        Contact::insert([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now()
        ]);

        Session::flash('message', 'Contact Insert Successfully');
        return redirect()->route('contact.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $contact['contacts'] = $contact;
        return view('admin.contact.edit', compact('contact'));
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
            'address'=>'required|min:8',
            'email'=>'required',
            'phone'=>'required'
        ]);

        Contact::find($id)->update([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'updated_at'=>Carbon::now()
        ]);
        Session::flash('message', 'Contact Updated Successfully');
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Contact::find($id)->delete();
        Session::flash('message', 'Contact Deleted Successfully');
        return redirect()->route('contact.index');
    }
}
