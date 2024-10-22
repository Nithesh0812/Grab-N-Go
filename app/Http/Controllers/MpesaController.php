<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MpesaTransaction;

class MpesaController extends Controller
{
    public static function generateSandBoxToken(){

        try {
            $consumer_key = env("MPESA_CONSUMER_KEY");
            $consumer_secret = env("MPESA_CONSUMER_SECRET");
        } catch (\Throwable $th) {
            $consumer_key = self::env("MPESA_CONSUMER_KEY");
            $consumer_secret = self::env("MPESA_CONSUMER_SECRET");
        }

        if(!isset($consumer_key)||!isset($consumer_secret)){
            die("please declare the consumer key and consumer secret as defined in the documentation");
        }
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($consumer_key.':'.$consumer_secret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_response = curl_exec($curl);

        return json_decode($curl_response)->access_token;
    }

    public static function generateLiveToken(){

        try {
            $consumer_key = env("MPESA_CONSUMER_KEY");
            $consumer_secret = env("MPESA_CONSUMER_SECRET");
        } catch (\Throwable $th) {
            $consumer_key = self::env("MPESA_CONSUMER_KEY");
            $consumer_secret = self::env("MPESA_CONSUMER_SECRET");
        }

        if(!isset($consumer_key)||!isset($consumer_secret)){
            die("please declare the consumer key and consumer secret as defined in the documentation");
        }
        $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($consumer_key.':'.$consumer_secret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_response = curl_exec($curl);

        return json_decode($curl_response)->access_token;


    }

}
