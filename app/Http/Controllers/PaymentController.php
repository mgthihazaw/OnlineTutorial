<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
   
    public function payment()
    {
        $avaiablePlans = [
            'vimeoDev_id' => 'Monthly',
            'vimeoDev_yearly'=> 'Yearly'
        ];
        $data = [
            'intent' => auth()->user()->createSetupIntent(),
            'plans'  =>$avaiablePlans,
        ];

        return view('payment1')->with($data);
    }
    public function subscribe(Request $request){
        $user = auth()->user();
        $paymentMethod = $request->payment_method;

        $planId =  $request->plan;

        $user->newSubscription('main', $planId)->create($paymentMethod);

        return response([
            'success_url'=> redirect()->intended('/')->getTargeUrl(),
            'message' => 'successfully subscribe'
            ]);
    }
}
