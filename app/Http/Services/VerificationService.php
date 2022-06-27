<?php
namespace App\Http\Services;


class VerificationService
{

    public function setOtpCode(){
        $otp = rand(10000,99999);
        auth()->user()->otp = $otp;
        auth()->user()->save();
        return $otp;
    }

    public function getSmsVerifyMessage($code){
        $message = "Your OTP Code is:".$code;
        return $message;
    }

    public function checkOtpCode($otp): bool
    {

        if (auth()->user()->otp == $otp){
            return true;
        }else
            return false;
    }
    public function removeOtpCode(){
        auth()->user()->otp = null;

    }
}
