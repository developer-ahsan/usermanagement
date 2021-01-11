<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpinnerController extends Controller
{
	public function idnex(){
		return view('Spinner.index');
	}
    public function create(){
    	return view('Spinner.create');
    }

    public function store(Request $request){
    	dd($request->all());
    }

    public function edit(){

    }
}
