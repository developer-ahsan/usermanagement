<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index(){
    	$contact = Contact::get();
		return view('Contact.list')->with('contact',$contact);
	}
	public function create(){
    	return view('Contact.add');
    }
    public function store(Request $request){
    	$contact = new Contact;
    	$contact->contact_email = $request->contact_email;
        $contact->contact_phone = $request->contact_phone;
    	$contact->save();
        return redirect('/contact/list')->with('message', 'Contact Added Succesfully.');
    }
    public function delete($id){
    	$contact = Contact::find($id);
    	$contact->delete();
        return redirect('/contact/list')->with('error', 'Deleted Succesfully.');
    }
    public function edit($id){
		$contact = Contact::find($id);
		return view('Contact.update')->with('data',$contact);
    }
    public function update(Request $request){
    	$contact = Contact::find($request->id);
    	$contact->contact_email = $request->contact_email;
        $contact->contact_phone = $request->contact_phone;
    	$contact->save();
        return redirect('/contact/list')->with('message', 'Updated Succesfully.');

    }
}
