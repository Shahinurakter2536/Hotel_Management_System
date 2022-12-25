<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.show', compact('contact'));

        if ($contact->status == 0) {
            $contact->status = 1;
            $contact->save();
        }
    }
    public function status($id)
    {
        $contact = Contact::find($id);

        if ($contact->status == 0) {
            $contact->status = 1;
            $contact->save();
            Toastr::success('Contact marked as read', 'Success');
            return redirect()->route('admin.contact');
        }else{
            Toastr::success('Aleady marked as read', 'Success');
            return redirect()->route('admin.contact');
        }
    }
    public function destroy($id)
    {
        Contact::find($id)->delete();
        Toastr::success('Contact delete successfully', 'Success');
        return redirect()->back();
    }
}
