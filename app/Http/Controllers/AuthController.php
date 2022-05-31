<?php

namespace App\Http\Controllers;

use App\Models\charp;
use App\Mail\Emailpass;
use App\Models\Messages;
use App\Models\refer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\wallet;
use App\Models\bo;
use App\Models\data;
use App\Models\deposit;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class AuthController
{
public function pass(Request $request)
{
    $request->validate([
        'email' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!isset($user)){
        return redirect(route('password.request'))
            ->with('error', "Email not found in our system");

    }elseif ($user->email == $request->email){
        $new= uniqid('Pass',true);

        $user->password=$new;
        $user->save();

        $admin= 'admin@primedata.com.ng';
        $admin1= 'primedata18@gmail.com';

        $receiver= $user->email;
        Mail::to($receiver)->send(new Emailpass($new));
        Mail::to($admin)->send(new Emailpass($new ));
        Mail::to($admin1)->send(new Emailpass($new ));

        return redirect(route('password.request'))
            ->with('success', "New Password has been sent to your email");
    }
}
    public function cus(Request $request)
    {
        if (Auth()->user()) {
            return redirect(route('dashboard'))
                ->withSuccess('Signed in');

        }else{
            return redirect(route('log'));
        }
    }
    public function customLogin(Request $request)
    {
        if (Auth()->user()){
            return redirect(route('dashboard'))
                ->withSuccess('Signed in');

        }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if(!isset($user)){
            return redirect()->back()->withInput($request->only('email', 'remember'))
                ->withErrors(['password' => 'Credentials does not match.']);
        }

        Auth::login($user);

        return redirect()->intended('dashboard')
            ->withSuccess('Signed in');


    }
    public function dashboard(Request $request)
    {

            $user = User::find($request->user()->id);
            $me = Messages::where('status', 1)->first();

//            $count = refer::where('username',$request->user()->username)->count();

            $deposite = deposit::where('username', $request->user()->username)->get();
            $totaldeposite = 0;
            foreach ($deposite as $depo){
                $totaldeposite += $depo->amount;

            }
//            $bil2 = bo::where('username', $request->user()->username)->get();
//            $bill = 0;
//            foreach ($bil2 as $bill1){
//                $bill += $bill1->amount;
//
//            }
            return  view('dashboard', compact('user', 'totaldeposite'));

    }
    public function refer(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $refer = refer::where('username', $user->username)->first();

            $refers = refer::where('username', $request->user()->username)->get();
            $totalrefer = 0;
            foreach ($refers as $depo){
                $totalrefer+= $depo->amount;

            }

            return  view('referal', compact('user', 'refers', 'refer', 'totalrefer'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }
    public function plan(Request  $request)
    {


        $user = User::find($request->user()->id);


        if ($user->wallet < $request->amount) {
            $mg = "You Cant Upgrade Your Account" . "NGN" . $request->amount . " from your wallet. Your wallet balance is NGN $user->wallet. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

            return redirect("upgrade")->with('status', $mg);


        }
        if ($request->amount < 1000) {

            $mg = "error transaction";
            return redirect("upgrade")->with('status', $mg);


        } else {
            $user = User::find($request->user()->id);


            $gt = $user->wallet - $request->amount;


            $user->wallet = $gt;
            $user->plan=1;
            $user->save();

            return redirect("dashboard")->with('status1','You have successful subscribe to retailer plan');

        }
    }
    public function select1(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);


            return view('select1', compact('user'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function buydata(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $data = data::where(['status'=> 1 ])->where('network', $request->id)->get();


            return view('buydata', compact('user', 'data'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function redata(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $data = data::where(['status'=> 1 ])->where('network', $request->id)->get();

//return $data;
            return view('redata', compact('user', 'data'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function pre(Request $request)


    {
        $request->validate([
            'id' => 'required',
        ]);
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $data = data::where('id',$request->id )->get();

            return view('pre', compact('user', 'data'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function airtime(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $data = data::where('plan_id',"airtime" )->get();
            $wallet = wallet::where('username', $user->username)->first();

            return view('airtime', compact('user', 'data', 'wallet'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function invoice(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $bill = bo::where('username', $request->user()->username)->get();


            return view('invoice', compact('user', 'bill'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function charges(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $bill = charp::where('username', $request->user()->username)->get();


            return view('charges', compact('user', 'bill'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login')->with('status','You are log-out successful');
    }
}
