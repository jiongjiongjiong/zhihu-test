<?php
/**
 * Created by PhpStorm.
 * User: yan
 * Date: 2017/5/17
 * Time: 下午8:04
 */

namespace App\Repository;

use App\Question;
use App\Topic;

class QuestionRepository
{
    public function byIdWithTopicsAndAnswers($id)
    {
        return Question::where('id',$id)->with(['topics','answers'])->first();
    }

    public function create(array $attributes)
    {
        return Question::create($attributes);
    }

    public function getQuestionFeed()
    {
        return Question::published()->latest('updated_at')->with('user')->get();
    }

    public function byId($id)
    {
        return Question::find($id);
    }

    public function normalizeTopic(array $topcis)
    {
        return collect($topcis)->map(function ($topic){
            if( is_numeric($topic)){
                Topic::find($topic)->increment('questions_count');
                return (int) $topic;
            }

            $newTopic = Topic::create(['name' => $topic, 'questions_count' => 1]);
            return $newTopic->id;
        })->toArray();
    }
}