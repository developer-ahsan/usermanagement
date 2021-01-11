<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customers;
use App\Participant;
use App\Winner;
use App\Cards;
use Carbon\Carbon;

class WinnerController extends Controller
{
    public function index(){

        $date =  Carbon::now()->toDateString();
        $cardss = Cards::where('end', '>=', $date)->get();
        $cards = Cards::limit(6)->latest()->get();
        $participants = Participant::whereDate('created_at','>=',$cardss[0]->start)->whereDate('created_at','<=',$cardss[0]->end)->with('customer')->with('card')->get();
		return view('Participant.list')->with('cards',$cards)->with('participants',$participants);
	}
    public function indexById($id)
    {
        $date =  Carbon::now()->toDateString();
        $cardss = Cards::where('end', '>=', $date)->get();
        $cards = Cards::limit(6)->latest()->get();
        $participants = Participant::whereDate('created_at','>=',$cardss[0]->start)->whereDate('created_at','<=',$cardss[0]->end)->where('card_id',$id)->with('customer')->with('card')->get();
        return view('Participant.list')->with('cards',$cards)->with('participants',$participants);
    }
	public function update($id){
		$participants = Participant::find($id);
        $winner = new Winner;
        $winner->participant_id = $id;
    	$winner->save();
        return redirect('/participants/list')->with('message', 'Winner Announced Successfully');

    }
    public function winner()
    {
        $winner = Winner::latest()->with('participant.customer')->with('participant.card')->get();
        return view('Winners.list')->with('winners',$winner);
    }
}
