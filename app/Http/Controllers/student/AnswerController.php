<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Survey;
use App\Answer;
use App\Model\spts\Choice;
use App\Question;
use App\Inspector\HeaderNotificationCount;
use Auth;


class AnswerController extends Controller
{
    use HeaderNotificationCount;

    public function store(Request $request, Survey $survey)
    {
      // remove the token
    //   $arr = $request->except('_token');
    //   foreach ($arr as $key => $value) {
    //     $newAnswer = new Answer();

    //     if (! is_array( $value )) {
    //       $newValue = $value['answer'];

    //     } else {
    //       $newValue = $value['answer'];

    //     }
    //     $newAnswer->answer = $newValue;
    //     $newAnswer->question_id = $key;
    //     $newAnswer->user_id = Auth::id();
    //     $newAnswer->survey_id = $survey->id;

    //     $newAnswer->save();
    //   };

    if($request->text) {
        $ans = new Answer;
        $ans->answer = $request->text;
        $ans->question_id = $request->question_id;
        $ans->user_id = Auth::id();
        $ans->survey_id = $survey;
        $ans->save();
    }

    if($request->textarea) {
        $ans = new Answer;
        $ans->answer = $request->textarea;
        $ans->question_id = $request->question_id;
        $ans->user_id = Auth::id();
        $ans->survey_id = $survey;
        $ans->save();
    }

    if($request->checkbox) {
        foreach($request->checkbox as $checkbox) {
            $real = Choice::where('choice_id',$checkbox)->first();
            $ans = new Answer;
            $ans->answer = $real->choice_name;
            $ans->question_id = $real->question_id;
            $ans->user_id = Auth::id();
            $ans->survey_id = $survey;
            $ans->save();
        }
    }

    if($request->radio) {
        $real = Choice::where('choice_id',$request->radio)->first();
        $ans = new Answer;
        $ans->answer = $real->choice_name;
        $ans->question_id = $real->question_id;
        $ans->user_id = Auth::id();
        $ans->survey_id = $survey;
        $ans->save();
    }

      return redirect()->to('/survey/answers/'.$survey);
    //   return redirect()->action('student\SurveyController@view_survey_answersStudent', [$survey->id]);
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

    public function storeStudent(Request $request,  $survey)
    {
      // remove the token
    //   $arr = $request->except('_token');
    //   foreach ($arr as $key => $value) {
    //     $newAnswer = new Answer();
    //     if (! is_array( $value )) {
    //       $newValue = $value['answer'];
    //     } else {
    //       $newValue = $value['answer'];
    //     }
    //     $newAnswer->answer = $newValue;
    //     $newAnswer->question_id = $key;
    //     $newAnswer->user_id = Auth::id();
    //     $newAnswer->survey_id = $survey->id;

    //     $newAnswer->save();
    //   };

    if($request->text) {
        $ans = new Answer;
        $ans->answer = $request->text;
        $ans->question_id = $request->question_id;
        $ans->user_id = Auth::id();
        $ans->survey_id = $survey;
        $ans->save();
    }

    if($request->textarea) {
        $ans = new Answer;
        $ans->answer = $request->textarea;
        $ans->question_id = $request->question_id;
        $ans->user_id = Auth::id();
        $ans->survey_id = $survey;
        $ans->save();
    }

    if($request->checkbox) {
        foreach($request->checkbox as $checkbox) {
            $real = Choice::where('choice_id',$checkbox)->first();
            $ans = new Answer;
            $ans->answer = $real->choice_name;
            $ans->question_id = $real->question_id;
            $ans->user_id = Auth::id();
            $ans->survey_id = $survey;
            $ans->save();
        }
    }

    if($request->radio) {
        $real = Choice::where('choice_id',$request->radio)->first();
        $ans = new Answer;
        $ans->answer = $real->choice_name;
        $ans->question_id = $real->question_id;
        $ans->user_id = Auth::id();
        $ans->survey_id = $survey;
        $ans->save();
    }

      return redirect()->to('/studentsurvey/answers/'.$survey);
    }

}

