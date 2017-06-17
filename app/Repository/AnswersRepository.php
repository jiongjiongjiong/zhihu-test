<?php
/**
 * Created by PhpStorm.
 * User: yan
 * Date: 2017/5/19
 * Time: 下午4:28
 */

namespace App\Repository;

use App\Answer;

class AnswersRepository
{
    public function create(array $attributes)
    {
        return Answer::create($attributes);
    }
}