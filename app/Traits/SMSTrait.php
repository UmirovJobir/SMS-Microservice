<?php


namespace App\Traits;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * Trait SMSTrait
 * @package App\Traits
 */
trait SMSTrait
{
    public function sendSMS($phone, $text){
        if((config('app.debug'))){
            return true;
        }
        try {
            if(in_array(substr($phone, 0, 2), [77, 88])){
                $text .= 'AgroZamin:';
            }
            $data = [
                "login" => env('SMS_login'),
                "pwd" => env('SMS_pwd'),
                "CgPN" => env('SMS_CgPN'),
                "CdPN" => trim($phone, "+"),
                "text" => $text." NIKOMU NE PEREDAVAYTE SMSTrait, daje esli trebuet ot imeni Agrozamin!"
            ];
            $client = new Client();
            $url   = env('SMS_url');

            $requestAPI = $client->post( $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($data)
            ]);
            Log::stack(['single'])->info(json_encode($requestAPI).$phone);
            return true;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::stack(['single'])->info($e->getCode(), [$e->getMessage(), $phone, [
                "login" => env('SMS_login'),
                "pwd" => env('SMS_pwd'),
                "CgPN" => env('SMS_CgPN'),
                "CdPN" => trim($phone, "+"),
                "text" => $text." NIKOMU NE PEREDAVAYTE SMSTrait, daje esli trebuet ot imeni Agrozamin!"
            ]]);
            return false;
        }
    }

}
