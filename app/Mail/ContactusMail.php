<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SettingGeneral;

class ContactusMail extends Mailable
{
    use Queueable, SerializesModels;
    public $input;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $site_setting = SettingGeneral::first();
        return $this->from(config('app.mail_from_address'))
                    ->subject('New Contact Us Details')
                    ->view('mail.contact-us',compact('site_setting'));
    }
}
