<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\VerificationService;
use App\Providers\RouteServiceProvider;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;


class VerificationCodeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | mobile Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */


    public $verificationService;
    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VerificationService $verificationService)
    {
        $this->verificationService = $verificationService;
        $this->middleware('auth');
//        $this->middleware('signed')->only('verify');
       $this->middleware('throttle:6,1')->only('verify', 'resendOtpCode');
    }

    public function verifyForm(){
        if (auth()->user()->isVerified)
            return redirect()->route('home');
        return view('auth.verifyCode');
    }

    public function verify(Request $request){


        $check = $this->verificationService->checkOtpCode($request->otp);
        if (!$check){

            return redirect()->route('auth.verifyCode')->withErrors(['otp' => 'the code not correct']);
        }else{

            $user =  auth()->user();
            $user->isVerified = 1;
            $user->mobile_verified_at = Carbon::now();
            $this->verificationService->removeOtpCode();
            $user->save();
            return redirect()->route('home');
        }
    }
    public  function resendOtpCode(){
        $this->verificationService->setOtpCode();
      return  redirect()->route('auth.verifyCode');
    }
}
