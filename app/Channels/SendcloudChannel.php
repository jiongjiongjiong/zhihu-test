<?php
/**
 * Created by PhpStorm.
 * User: yan
 * Date: 2017/6/8
 * Time: 下午8:16
 */

namespace App\Channels;


use Illuminate\Notifications\Notification;

class SendcloudChannel
{

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSendcloud($notifiable);
    }
}