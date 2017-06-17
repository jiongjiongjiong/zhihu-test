<?php
/**
 * Created by PhpStorm.
 * User: yan
 * Date: 2017/5/25
 * Time: 下午1:31
 */

namespace App\Repository;

use App\User;

class UserRepository
{

    public function byId($id)
    {
       return User::find($id);
    }
}