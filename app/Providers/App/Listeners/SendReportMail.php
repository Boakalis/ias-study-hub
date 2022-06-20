<?php

namespace App\Providers\App\Listeners;

use App\Events\IasTestMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendReportMail implements ShouldQueue
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
     * @param  IasTestMail  $event
     * @return void
     */
    public function handle(IasTestMail $event)
    {
        $emailData = $event->email_data;
        Mail::send('mail.result',$emailData, function ($message) use ($emailData) {
            $message->to($emailData['email'], $emailData['name'])
                ->subject('IAS Test Report')
                ->from(config('app.mail_from_address'));
        });
    }
}
