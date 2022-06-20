<?php

namespace App\Providers\App\Listeners;

use App\Events\QbPaymentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendQbPaymentMail implements ShouldQueue
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
     * @param  QbPaymentMail  $event
     * @return void
     */
    public function handle(QbPaymentMail $event)
    {
        $emailData = $event->email_data;
        Mail::send('mail.mail-qb', $emailData, function ($message) use ($emailData) {
            $message->to($emailData['email'], $emailData['name'])
                ->subject('Payment Success Notification')
                ->from(config('app.mail_from_address'));
        });

    }
}
