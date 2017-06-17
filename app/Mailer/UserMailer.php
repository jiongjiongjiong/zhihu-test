<?php
/**
 * Created by PhpStorm.
 * User: yan
 * Date: 2017/6/8
 * Time: 下午9:08
 */

namespace App\Mailer;

use Auth;
use User;

class UserMailer extends Mailer
{

    public function followNotifyEmail($email)
    {
        $data = [
            'url' => 'http://zhihu-test.dev',
            'name' => Auth::guard('api')->user()->name
        ];

        $this->sendTo('zhihu_new_user_follow', $email, $data);
    }

    public function passwordReset($email,$token)
    {
        $data = [ 'url' => url('password/reset', $token)];
        $this->sendTo('zhihu_test_reset',$email,$data);
    }

    public function welcome(User $user)
    {
        // 模板变量
        $data = [
            'url' => route('email.verify', ['token' => $user->confirmation_token]),
            'name' => $user->name
        ];
        $this->sendTo('zhihu_test_register',$this->email,$data);
    }
}