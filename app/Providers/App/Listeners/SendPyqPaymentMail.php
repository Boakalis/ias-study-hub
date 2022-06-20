<?php

namespace App\Providers\App\Listeners;

use App\Events\PyqPaymentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendPyqPaymentMail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
    */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PyqPaymentMail  $event
     * @return void
     */
    public function handle(PyqPaymentMail $event)
    {
        $emailData = $event->email_data;
        Mail::send('mail.mail-pyq', $emailData, function ($message) use ($emailData){
                    $message->to($emailData['email'], $emailData['name'])
                        ->subject('Payment Success Notification')
                        ->from(config('app.mail_from_address'));
        });
    }

}
