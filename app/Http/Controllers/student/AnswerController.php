<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Survey;
use App\Answer;
use App\Question;
use Auth;

class AnswerController extends Controller
{
    public function store(Request $request, Survey $survey)
    {
      // remove the token
      $arr = $request->except('_token');
      foreach ($arr as $key => $value) {
        $newAnswer = new Answer();
        if (! is_array( $value )) {
          $newValue = $value['answer'];
        } else {
          $newValue = $value['answer'];
        }
        $newAnswer->answer = $newValue;
        $newAnswer->question_id = $key;
        $newAnswer->user_id = Auth::id();
        $newAnswer->survey_id = $survey->id;

        $newAnswer->save();
      };
      return redirect()->action('student\SurveyController@view_survey_answersStudent', [$survey->id]);
    }

    public function storeAd(Request $request, Survey $survey)
    {
      // remove the token
      $arr = $request->except('_token');
      foreach ($arr as $key => $value) {
        $newAnswer = new Answer();
        if (! is_array( $value )) {
          $newValue = $value['answer'];
        } else {
          $newValue = $value['answer'];
        }
        $newAnswer->answer = $newValue;
        $newAnswer->question_id = $key;
        $newAnswer->user_id = Auth::id();
        $newAnswer->survey_id = $survey->id;

        $newAnswer->save();
      };
      return redirect()->action('student\SurveyController@view_survey_answersAd', [$survey->id]);
    }

    public function storeAdLec(Request $request, Survey $survey)
    {
      // remove the token
      $arr = $request->except('_token');
      foreach ($arr as $key => $value) {
        $newAnswer = new Answer();
        if (! is_array( $value )) {
          $newValue = $value['answer'];
        } else {
          $newValue = $value['answer'];
        }
        $newAnswer->answer = $newValue;
        $newAnswer->question_id = $key;
        $newAnswer->user_id = Auth::id();
        $newAnswer->survey_id = $survey->id;

        $newAnswer->save();
      };
      return redirect()->action('student\SurveyController@view_survey_answersAdLec', [$survey->id]);
    }

    public function storeEdu(Request $request, Survey $survey)
    {
      // remove the token
      $arr = $request->except('_token');
      foreach ($arr as $key => $value) {
        $newAnswer = new Answer();
        if (! is_array( $value )) {
          $newValue = $value['answer'];
        } else {
          $newValue = $value['answer'];
        }
        $newAnswer->answer = $newValue;
        $newAnswer->question_id = $key;
        $newAnswer->user_id = Auth::id();
        $newAnswer->survey_id = $survey->id;

        $newAnswer->save();
      };
      return redirect()->action('student\SurveyController@view_survey_answersEdu', [$survey->id]);
    }


    public function storeLF(Request $request, Survey $survey)
    {
      // remove the token
      $arr = $request->except('_token');
      foreach ($arr as $key => $value) {
        $newAnswer = new Answer();
        if (! is_array( $value )) {
          $newValue = $value['answer'];
        } else {
          $newValue = $value['answer'];
        }
        $newAnswer->answer = $newValue;
        $newAnswer->question_id = $key;
        $newAnswer->user_id = Auth::id();
        $newAnswer->survey_id = $survey->id;

        $newAnswer->save();
      };
      return redirect()->action('student\SurveyController@view_survey_answersLF', [$survey->id]);
    }

    public function storeStudent(Request $request, Survey $survey)
    {
      // remove the token
      $arr = $request->except('_token');
      foreach ($arr as $key => $value) {
        $newAnswer = new Answer();
        if (! is_array( $value )) {
          $newValue = $value['answer'];
        } else {
          $newValue = $value['answer'];
        }
        $newAnswer->answer = $newValue;
        $newAnswer->question_id = $key;
        $newAnswer->user_id = Auth::id();
        $newAnswer->survey_id = $survey->id;

        $newAnswer->save();
      };
      return redirect()->action('student\SurveyController@view_survey_answersStudent', [$survey->id]);
    }

}

