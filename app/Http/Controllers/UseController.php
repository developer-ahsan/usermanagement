<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uses;

class UseController extends Controller
{
    public function index(){
    	$use = Uses::get();
		return view('Use.list')->with('use',$use);
	}
	public function create(){
    	return view('Use.add');
    }
    public function store(Request $request){
    	$use = new Uses;
    	$use->description = $request->description;
    	$use->save();
        return redirect('/use/list')->with('message', 'Use Added Succesfully.');
    }
    public function delete($id){
    	$use = Uses::find($id);
    	$use->delete();
        return redirect('/use/list')->with('error', 'Deleted Succesfully.');
    }
    public function edit($id){
		$use = Uses::find($id);
		return view('Use.update')->with('data',$use);
    }
    public function update(Request $request){
    	$use = Uses::find($request->id);
    	$use->description = $request->description;
    	$use->save();
        return redirect('/use/list')->with('message', 'Updated Succesfully.');

    }
}
