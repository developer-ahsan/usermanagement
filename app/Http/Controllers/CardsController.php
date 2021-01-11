<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Cards;

class CardsController extends Controller
{
    public function index(){
    	$cards = Cards::get();
		return view('Cards.list')->with('cards',$cards);
	}
	public function create(){
    	return view('Cards.add');
    }
    public function store(Request $request){
    	$cars = new Cards;
        $cars->amount = $request->amount;
    	$cars->win_amount = $request->win_amount;
        $cars->position = '1';
        $cars->detail = $request->detail;
        $cars->type = $request->type;
        $cars->start = $request->start;
        $cars->end = $request->end;
    	$cars->color = $request->color;
    	$cars->save();
        return redirect('/cards/list')->with('message', 'Card Added Succesfully.');
    }
    public function delete($id){
    	$cards = Cards::find($id);
    	$cards->delete();
        return redirect('/cards/list')->with('error', 'Deleted Succesfully.');
    }
    public function edit($id){
		$cards = Cards::find($id);
        $cards->start = Carbon::parse($cards->start)->format('Y-m-d\TH:i');
        $cards->end = Carbon::parse($cards->end)->format('Y-m-d\TH:i');
		return view('Cards.update')->with('data',$cards);
    }
    public function update(Request $request){
    	$cards = Cards::find($request->id);
    	$cards->amount = $request->amount;
        $cards->win_amount = $request->win_amount;
        $cards->position = '1';
        $cards->detail = $request->detail;
        $cards->type = $request->type;
        $cards->start = $request->start;
        $cards->end = $request->end;
    	$cards->color = $request->color;
    	$cards->save();
        return redirect('/cards/list')->with('message', 'Updated Succesfully.');

    }
}
