<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cards;
use App\About;
use App\Uses;
use App\Contact;
use App\Participant;
use App\Winner;
use App\Mail\ResetPassword;
use App\Mail\EmailActivation;
use App\customers;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Hash;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");header('Access-Control-Allow-Methods: GET, POST');

class MillionareController extends Controller
{
    //All Cards
    public function cards()
    {
        $currentTime = Carbon::now();

        $data['daily'] = Cards::where('type', 'daily')->OrderBY('id','ASC')->get();
        $data['daily']->map(function($value) {
            $start  = Carbon::now();
            
            if($start >= $value->start && $start <= $value->end) {
                $end = new Carbon($value->end);
                $value->datee = $start->diff($end)->format('Y-m-d H:i:s');
            } else {
                $value->datee = '';
            }
        });
        $data['daily'][0]->image = url('/').'/storage/images/1.png';
        $data['daily'][1]->image = url('/').'/storage/images/2.png';
        $data['weekly'] = Cards::where('type', 'weekly')->OrderBY('id','ASC')->get();
        $data['weekly']->map(function($value) {
            $start  = Carbon::now();
            $end    = new Carbon($value->end);
            $day = $start->diff($end)->format('%a');
            $hr = $start->diff($end)->format('%h');
            $mint = $start->diff($end)->format('%i');
            $sec = $start->diff($end)->format('%S');
            $value->day = $day;
            $value->hr = $hr;
            $value->mint = $mint;
            $value->sec = $sec;
        });
        $data['weekly'][0]->image = url('/').'/storage/images/3.png';
        $data['weekly'][1]->image = url('/').'/storage/images/4.png';
        $data['big'] = Cards::where('type', 'big')->OrderBY('id','ASC')->get();
        $data['big']->map(function($value) {
            $start  = Carbon::now();
            $end    = new Carbon($value->end);
            $day = $start->diff($end)->format('%a');
            $hr = $start->diff($end)->format('%h');
            $mint = $start->diff($end)->format('%i');
            $sec = $start->diff($end)->format('%S');
            $value->day = $day;
            $value->hr = $hr;
            $value->mint = $mint;
            $value->sec = $sec;
        });
        $data['big'][0]->image = url('/').'/storage/images/5.png';
        $data['big'][1]->image = url('/').'/storage/images/6.png';
        return response()->json(['cards' => $data]);
    }
    // card by Id
    public function cardsByID($id)
    {
        $cards = Cards::where('id', $id)->first();
        return response()->json(['cards' => $cards]);
    }
    // How to Use
    public function uses()
    {
        $uses = Uses::latest()->first();
        return response()->json(['uses' => $uses]);
    }
    // About
    public function about()
    {
        $about = About::latest()->first();
        return response()->json(['about' => $about]);
    }
    // Contact
    public function contact()
    {
        $contact = Contact::latest()->first();
        return response()->json(['contact' => $contact]);
    }
    // Winner Latest
    public function participants(Request $request)
    {

        $participant = new Participant;
        $participant->customers_id = $request->customer_id;
        $cards = Cards::find($request->card_id);
        $participant->card_id = $request->card_id;
        $participant->amount = $cards->amount;
        $participant->win_amount = $cards->win_amount;
        $participant->type = $cards->type;
        $participant->save();
        return response()->json('success');
    }
    // Winnwers 
    public function winners()
    {
        $date =  Carbon::now()->toDateString();

        $winner = Winner::latest()->with('participant.customer')->with('participant.card')->get();
        $today = Winner::whereDate('created_at', $date)->with('participant.customer')->with('participant.card')->get();
        return response()->json(["winner" => $winner, "today" => $today]);
    }
    // Winnwers 
    public function todaywinners()
    {
        $date =  Carbon::now()->toDateString();

        $today = Winner::whereDate('created_at', $date)->with('participant.customer')->with('participant.card')->get();
        return response()->json(["winnner" => $today]);
    }
    // Login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only('email', 'password');
        $user = customers::where('email',$credentials['email'])->first();
        if($user){
           if(Hash::check($credentials['password'],$user->password,[])){
                $user['token'] = $user->email.'$'.$user->name;
                if ($user->remember_token == 'active') {
                    return response()->json(['user'=>$user,'err'=>0]);
                } else {
                    return response()->json(['error' => 'Verify Your Email', 'err' => 1]);
                }
            } else{
                return response()->json(['error' => 'Invalid Password', 'err' => 1]);
            }
        } else {
            return response()->json(['error' => 'INvalid Email', 'err' => 1]);
        }    
    }
    // Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required',
            'address'=> 'required',
            'phone'=> 'required',
            'name'=> 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['Error' => $validator->errors()]);
        }
        $checkUser = customers::where('email',$request['email'])->first();
        if($checkUser) {
            return response()->json(['msg'=>'User Already Exist.', 'err' => 1]); 
        } else {
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['address'] = $request->address;
            $input['phone'] = $request->phone;
            $input['password'] = bcrypt($request['password']);
            $input['gender'] = 'none';
            $user = customers::create($input); 

            $success['token'] =  $user->email.'$'.$user->name; 
            $success['user'] =  $user;
            \Mail::to($request->email)->send(new EmailActivation($user));

            return response()->json(['success'=>$success, 'err' => 0]);
        }  
    }
     public function profileUpdate(Request $request)
    {
        $user = customers::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone; 
        $user->save();
        return response()->json(['success'=>$user ]);

    }
    public function mylottery($id)
    {
        $lottery = Participant::where('customers_id', $id)->with('card')->OrderBY('created_at','DESC')->get();
        return response()->json(['lottery'=>$lottery ]);
        
    }
    public function updatePassword(Request $request)
    {
        $user = customers::find($request->id);
        if(Hash::check($request->old,$user->password,[])){
            $user->password = bcrypt($request->new);
            $user->save();
            return response()->json(['err'=>0]);
        } else {
            return response()->json(['err'=>1,'msg'=>'Old Password is Incorrect']);
        }
    }
    public function forgetPassword(Request $request)
    {
        $data = customers::where('email',$request->email)->first();
        if ($data) {
            \Mail::to($request->email)->send(new ResetPassword($data));
            return response()->json(['err'=>0]);
        } else {
            return response()->json(['err'=>1,'msg'=>'Email not found']);
        } 
    }
}
