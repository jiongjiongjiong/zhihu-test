<?php
/**
 * Created by PhpStorm.
 * User: yan
 * Date: 2017/6/8
 * Time: 下午9:05
 */

namespace app\Mailer;


use Naux\Mail\SendCloudTemplate;
use Mail;

class Mailer
{

    public function sendTo($template,$email,array $data)
    {

        $content = new SendCloudTemplate($template, $data);

        Mail::raw($content, function ($message) use($email) {
            $message->from('hz@betterus.cn', 'zhihu-test');
            $message->to($email);
        });
    }
}