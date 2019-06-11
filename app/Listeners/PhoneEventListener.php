<?php

namespace App\Listeners;

use App\Events\PhoneEvent;
use App\Mail\MailerSendClass;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PhoneEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $mailer;
    public function __construct(MailerSendClass $mailerSendClass)
    {
        //
        $this->mailer=$mailerSendClass;
    }

    /**
     * Handle the event.
     *
     * @param  PhoneEvent  $event
     * @return void
     */
    public function handle(PhoneEvent $event)
    {
        //
        $data=[
            'name'=>$event->phonemanage->name,
            'phoneno'=>$event->phonemanage->phoneno,
            'address'=>$event->phonemanage->address,
            'ip'=>$event->phonemanage->ip,
            'host'=>$event->phonemanage->host,
            'referer'=>$event->phonemanage->referer,
            'note'=>$event->phonemanage->note,
            'created_at'=>$event->phonemanage->created_at
        ];
        $this->mailer->Mailsend('410547658@qq.com','emails.phonemailsend',Carbon::now().$event->phonemanage->name.'：'.$event->phonemanage->phoneno,$data);
    }
}
