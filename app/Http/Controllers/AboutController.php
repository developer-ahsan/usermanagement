<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
	public function index(){
    	$about = About::get();
		return view('About.list')->with('about',$about);
	}
	public function create(){
    	return view('About.add');
    }
    public function store(Request $request){
    	$about = new About;
    	$about->description = $request->description;
    	$about->save();
        return redirect('/about/list')->with('message', 'About Added Succesfully.');
    }
    public function delete($id){
    	$about = About::find($id);
    	$about->delete();
        return redirect('/about/list')->with('error', 'Deleted Succesfully.');
    }
    public function edit($id){
		$about = About::find($id);
		return view('About.update')->with('data',$about);
    }
    public function update(Request $request){
    	$about = About::find($request->id);
    	$about->description = $request->description;
    	$about->save();
        return redirect('/about/list')->with('message', 'Updated Succesfully.');

    }
}
