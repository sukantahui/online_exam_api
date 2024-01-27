<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Option;


use Illuminate\Http\Request;

class QuestionToOptionsController extends Controller
{
    public function getOnlyQuestion(){
        $question =  Question::get();
        return $question;
    }

    public function getOptionsByQuestionId($questionId){
        $option =  Option::where('question_id', $questionId)->get();
        return $option;
    }

    public function getQuestionAndAnswerByQuestioId($questionId){
        $question = Question::where('id', $questionId)->get();
        $option =  Option::where('question_id', $questionId)->get();
        return $option;
    }
}
