<?php

namespace App\Http\Controllers;

use App\Models\pin;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EpinController
{
 public function verify(Request $request)
 {

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://rechargecardportal.5starcompany.com.ng/api/epins-status',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer 3|4w3JGr20nnmP0hHqQrqpSDTils47R7pEyOqCX6Kf',
        'User-Agent: POSTMAN'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
     $data = json_decode($response, true);
$row=$data['data'];
$mtn=$row['mtn'];
$glo=$row['glo'];
$ninemobile=$row['ninemobile'];
$airtel=$row['airtel'];
     return  view('epin', compact('mtn', 'glo', 'ninemobile', 'airtel'));


 }
 public function pin(Request $request)
 {
     $curl = curl_init();

     curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://rechargecardportal.5starcompany.com.ng/api/create-token',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS =>array(
    'email'=> 'primedata18@gmail.com',
    'password'=> 'etier1479rla'
),
 ));

     $response = curl_exec($curl);

     curl_close($curl);
     echo $response;
 }
 public function sample(Request $request)
 {
     $data = [
         'title' => 'Primedata Epin Sample',
         'date' => date('m/d/Y')
     ];
     $pin= pin::take(1)->skip(1)->get();
//     return  view('sample', compact('pin'));

     $pdf = PDF::loadView('sample', compact('pin'));

     return $pdf->download('sample.pdf');
 }

 public function getpin(Request $request)
 {
     $request->validate([
         'amount' => 'required',
         'network' => 'required',
         'quantity' => 'required',
     ]);

     $dis = 2 / 100;
     $per = $request['amount'] * $dis;
     $total = $request['amount'] - $per;

     $charge = $total * $request['quantity'];
     $po = Auth::user()->wallet;
//return $charge;
     if ($po < $charge) {
         $mg = "You Cant make a purchase of " . "NGN" . $charge . " from your wallet. Your wallet balance is NGN $po. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

         return redirect("epin")->with('status', $mg);


     }
     if ($request->amount < 0) {

         $mg = "error transaction";
         return redirect("epin")->with('status', $mg);


     } else {
         $user = User::find($request->user()->id);


         $gt = $user->wallet - $request->amount;


         $user->wallet = $gt;
         $user->save();


         $curl = curl_init();

         curl_setopt_array($curl, array(
             CURLOPT_URL => 'https://rechargecardportal.5starcompany.com.ng/api/generate-epins',
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_ENCODING => '',
             CURLOPT_MAXREDIRS => 10,
             CURLOPT_TIMEOUT => 0,
             CURLOPT_FOLLOWLOCATION => true,
             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => 'POST',
             CURLOPT_POSTFIELDS => array(
                 'network' => $request['network'],
                 'amount' => $request['amount'],
                 'quantity' => $request['quantity'],
                 'order' => 'instant'
             ),
             CURLOPT_HTTPHEADER => array(
                 'Authorization: Bearer 3|4w3JGr20nnmP0hHqQrqpSDTils47R7pEyOqCX6Kf',
                 'User-Agent: POSTMAN'
             ),
         ));

         $response = curl_exec($curl);

         curl_close($curl);
         echo $response;
         $data = json_decode($response, true);
//     $row=$data['data'];
     }
 }
}
