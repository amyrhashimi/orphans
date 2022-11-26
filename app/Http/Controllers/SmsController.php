<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    use Melipayamak;
    public function sms()
    {
        try{

            $sms = Melipayamak::sms();
            $to = '09124520093';
            $from = '5000...';
            $text = 'تست وب سرویس ملی پیامک';
            $response = $sms->send($to,$from,$text);
            $json = json_decode($response);
            echo $json->Value; //RecId or Error Number
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
