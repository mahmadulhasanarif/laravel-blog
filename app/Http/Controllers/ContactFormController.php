<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactFormController extends Controller
{
    public function index()
    {
        $contactFroms = ContactForm::latest()->paginate(5);
        return view('admin.contactForm.index', compact('contactFroms'));
    }

    public function delete($id)
    {
        ContactForm::find($id)->delete();
        Session::flash('message', 'Message Deleted Successfully');
        return redirect()->route('message.index');
    }
}
