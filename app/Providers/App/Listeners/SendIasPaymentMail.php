<?php

namespace App\Providers\App\Listeners;

use App\Events\IasPaymentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendIasPaymentMail implements ShouldQueue
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
     * @param  IasPaymentMail  $event
     * @return void
     */
    public function handle(IasPaymentMail $event)
    {
        $emailData = $event->email_data;
        Mail::send('mail.ias-payment', $emailData, function ($message) use ($emailData) {
            $message->to($emailData['email'], $emailData['name'])
                ->subject('Payment Success Notification')
                ->from(config('app.mail_from_address'));
        });
    }
}
