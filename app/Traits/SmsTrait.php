<?php

namespace App\Traits;

use Twilio\Rest\Client;

trait SmsTrait
{
    public function sendSMS($number, $message)
    {
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $client = new Client($sid, $token);

        try {
            $client->messages->create(
                // the number you'd like to send the message to
                $number,
                [
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => env('TWILIO_NUMBER'),
                    // the body of the text message you'd like to send
                    'body' => $message
                ]
            );
        } catch (\Exception $e) {
            dd($e->getCode());
        }
    }
}
