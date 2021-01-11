<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use App\User;
use App\Cards;
use App\Winner;
use App\customers;
use App\Participant;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date =  Carbon::now()->toDateString();
        $user = User::count();
        $winner = Winner::count();
        $card = Cards::count();
        $customer = customers::count();
        $data['user_count'] = $user;
        $data['winner_count'] = $winner;
        $data['card_count'] = $card;
        $data['customer_count'] = $customer;
        return view('home')->with('data', $data);
    }
    public function resetPassword($id)
    {
        return view('Reset.reset')->with('id',$id);
    }
    public function updatepassword(Request $request)
    {
        $updatepassword = customers::find($request->id);
        $updatepassword->password = bcrypt($request->password);
        $updatepassword->save();
        return  view('Reset.update');
    }
    public function emailactivated($id)
    {
        $emailactivated = customers::find($id);
        $emailactivated->remember_token = 'active';
        $emailactivated->save();
        return  view('EmailActive.success');

    }
}
