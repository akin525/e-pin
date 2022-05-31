<?php

namespace app\Http\Controllers;
use App\Mail\Emailcharges;
use App\Mail\Emailfund;
use App\Mail\Emailotp;
use App\Models\bo;
use App\Models\charp;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\User;
use App\Models\wallet;
use App\Models\deposit;
use Illuminate\Support\Facades\Auth;

class FundController

{
    public function fund(Request  $request)
    {
            $user = User::find($request->user()->id);

            $data2 = setting::get();
            $fund = deposit::where('username', $user->username)->orderby( 'id', 'desc')->paginate(7);


            return view('timeline', compact('user', 'data2', 'fund'));


    }

        public function tran($reference)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_c1c6b6dc537ee53fee2957d2bee5486370888a7a",
                "Cache-Control: no-cache",
            ),
        ));
//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0)

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
//             echo $response;
        }
//        return $response;
        $data=json_decode($response, true);
        $amount=$data["data"]["amount"]/100;
        $auth=$data["data"]["authorization"]["authorization_code"];
// echo $auth;

        if(Auth::check()) {
            $user = Auth::user();

            $depo = deposit::where('payment_ref', $reference)->first();
            if (isset($depo)) {
                return redirect("dashboard")->withSuccess('Duplicate Transaction');

            } else {
                $char = setting::first();
$amount1=$amount - $char->charges;


                $gt = $amount1 + $user->wallet;
                $charp = charp::create([
                    'username' => $user->username,
                    'payment_ref' => $reference,
                    'amount' => $char->charges,
                    'iwallet' => $user->wallet,
                    'fwallet' => $gt,
                ]);

                $deposit = deposit::create([
                    'username' => $user->username,
                    'payment_ref' => $reference,
                    'amount' => $amount,
                    'iwallet' => $user->wallet,
                    'fwallet' => $gt,
                ]);


//
                $admin= 'admin@primedata.com.ng';
                $admin2= 'primedata18@gmail.com';

                $receiver= $user->email;
//                Mail::to($receiver)->send(new Emailcharges($charp ));
//                Mail::to($admin)->send(new Emailcharges($charp ));
//                Mail::to($admin2)->send(new Emailcharges($charp ));

                $user->wallet= $gt;
                $user->save();
                $admin= 'admin@primedata.com.ng';
                $admin2= 'primedata18@gmail.com';

              $receiver= $user->email;
//                Mail::to($receiver)->send(new Emailfund($deposit ));
//                Mail::to($admin)->send(new Emailfund($deposit ));
//                Mail::to($admin2)->send(new Emailfund($deposit ));


                return redirect("dashboard")->with('status','Your Account was fund Successfully with ₦'.$amount);
            }
        }

    }
}
