<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswersRequest;
use App\Question;
use App\Repository\AnswersRepository;
use Illuminate\Http\Request;
use App\Answers;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    protected $answer;

    /**
     * AnswersController constructor.
     * @param $answer
     */
    public function __construct(AnswersRepository $answer)
    {
        $this->answer = $answer;
    }

    public function store(StoreAnswersRequest $request,$question)
    {
        $answer = $this->answer->create([
            'question_id' => $question,
            'user_id' => Auth::id(),
            'body' => $request->get('body')
        ]);

        $answer->question()->increment('answers_count');
        return back();
    }
}
