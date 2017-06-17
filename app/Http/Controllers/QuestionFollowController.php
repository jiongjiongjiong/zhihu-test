<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class QuestionFollowController extends Controller
{
    /**
     * QuestionFollowController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function follow($question)
    {
        Auth::user()->followThis($question);
        return back();
    }
}
