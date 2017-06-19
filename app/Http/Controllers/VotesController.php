<?php

namespace App\Http\Controllers;

use App\Repository\AnswersRepository;
use Auth;
use Illuminate\Http\Request;

class VotesController extends Controller
{

    protected $answer;

    public function __construct(AnswersRepository $answer)
    {
        $this->answer = $answer;
    }


    public function users($id)
    {
        $user = Auth::guard('api')->user();
        if ($user->hasVotedFor($id)){
            return response()->json(['voted' => true]);
        }

        return response()->json(['voted' => false]);
    }

    public function vote()
    {
        $answer = $this->answer->byId(request('answer'));
        $voted = Auth::guard('api')->user()->votedFor(request('answer'));
        if( count($voted['attached'] ) > 0){
            $answer->increment('vote_count');
            return response()->json(['voted' => true]);
        }

        $answer->decrement('vote_count');
        return response()->json(['voted' => false]);
    }
}
