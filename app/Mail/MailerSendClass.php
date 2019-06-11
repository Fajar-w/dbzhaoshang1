<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/3/7
 * Time: 14:28
 */

namespace App\Mail;

use Illuminate\Support\Facades\Mail;

class MailerSendClass
{
    public function Mailsend($user,$views,$subject,$data=[])
    {
        /*$name = $user;
        Mail::send('emails.test',['name'=>$name],function($message){
            $to = '410547658@qq.com';
            $message ->to($to)->subject('邮件测试');
        });*/
        Mail::send($views,$data,function($message) use ($user,$subject){
            $message->to($user)->subject($subject);
        });
    }
}