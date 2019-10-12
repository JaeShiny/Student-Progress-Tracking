<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Survey;
use App\Answer;
use App\Question;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Model\spts\Choice;
// use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $survey)
    {
      $question = new Question;
      $question->question_type = $request->question_type;
      $question->user_id= Auth::id();
      $question->title = $request->title;
      $question->survey_id = $survey;
      $question->save();

      foreach($request->choice as $storechoice) {
        $choice = new Choice;
        $choice->choice_name = $storechoice;
        $choice->question_id = $question->id;
        $choice->save();
      }

      return redirect()->back();
    }

    public function edit(Question $question)
    {
      return view('question.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {

      $question->update($request->all());
      return redirect()->action('student\SurveyController@detail_survey', [$question->survey_id]);
    }

    public function storeAd(Request $request, $survey)
    {
      $question = new Question;
      $question->question_type = $request->question_type;
      $question->user_id= Auth::id();
      $question->title = $request->title;
      $question->survey_id = $survey;
      $question->save();

    //   foreach($request->choice as $storechoice) {
    //     $choice = new Choice;
    //     $choice->choice_name = $storechoice;
    //     $choice->question_id = $question->id;
    //     $choice->save();
    //   }

      return redirect()->back();
    }

    public function editAd(Question $question)
    {
      return view('advisor.editQuestion', compact('question'));
    }

    public function updateAd(Request $request, Question $question)
    {

      $question->update($request->all());
      return redirect()->action('student\SurveyController@detail_surveyAd', [$question->survey_id]);
    }

    public function storeAdlec(Request $request, $survey)
    {
      $question = new Question;
      $question->question_type = $request->question_type;
      $question->user_id= Auth::id();
      $question->title = $request->title;
      $question->survey_id = $survey;
      $question->save();

    //   foreach($request->choice as $storechoice) {
    //     $choice = new Choice;
    //     $choice->choice_name = $storechoice;
    //     $choice->question_id = $question->id;
    //     $choice->save();
    //   }

      return redirect()->back();
    }

    public function editAdlec(Question $question)
    {
      return view('AdLec.editQuestion', compact('question'));
    }

    public function updateAdlec(Request $request, Question $question)
    {

      $question->update($request->all());
      return redirect()->action('student\SurveyController@detail_surveyAdlec', [$question->survey_id]);
    }

    public function storeEdu(Request $request, $survey)
    {
      $question = new Question;
      $question->question_type = $request->question_type;
      $question->user_id= Auth::id();
      $question->title = $request->title;
      $question->survey_id = $survey;
      $question->save();

    //   foreach($request->choice as $storechoice) {
    //     $choice = new Choice;
    //     $choice->choice_name = $storechoice;
    //     $choice->question_id = $question->id;
    //     $choice->save();
    //   }

      return redirect()->back();
    }

    public function editEdu(Question $question)
    {
      return view('EducationOfficer.editQuestion', compact('question'));
    }

    public function updateEdu(Request $request, Question $question)
    {

      $question->update($request->all());
      return redirect()->action('student\SurveyController@detail_surveyEdu', [$question->survey_id]);
    }

    public function storeLF(Request $request, $survey)
    {
      $question = new Question;
      $question->question_type = $request->question_type;
      $question->user_id= Auth::id();
      $question->title = $request->title;
      $question->survey_id = $survey;
      $question->save();

    //   foreach($request->choice as $storechoice) {
    //     $choice = new Choice;
    //     $choice->choice_name = $storechoice;
    //     $choice->question_id = $question->id;
    //     $choice->save();
    //   }

      return redirect()->back();
    }

    public function editLF(Question $question)
    {
      return view('LF.editQuestion', compact('question'));
    }

    public function updateLF(Request $request, Question $question)
    {

      $question->update($request->all());
      return redirect()->action('student\SurveyController@detail_surveyLF', [$question->survey_id]);
    }


}
