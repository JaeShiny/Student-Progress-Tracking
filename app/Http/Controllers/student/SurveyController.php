<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\Survey;
use App\Answer;
use App\Question;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class SurveyController extends Controller
{
    public function home(Request $request) // Homepage function
  {
    $surveys = Survey::get();
    return view('home', compact('surveys'));
  }

  # Show page to create new survey
  public function new_survey()
  {
    return view('survey.new');
  }

  public function create(Request $request, Survey $survey)
  {
    $arr = $request->all();
    // $request->all()['user_id'] = Auth::id();
    $arr['user_id'] = Auth::id();
    $surveyItem = $survey->create($arr);
    return Redirect::to("/survey/{$surveyItem->id}");
  }


# retrieve detail page and add questions here
public function detail_survey(Survey $survey)
{
  $survey->load('questions.user');
  return view('survey.detail', compact('survey'));
}


  public function edit(Survey $survey)
  {
    return view('survey.edit', compact('survey'));
  }

  # edit survey
  public function update(Request $request, Survey $survey)
  {
    $survey->update($request->only(['title', 'description']));
    return redirect()->action('student\SurveyController@detail_survey', [$survey->id]);
  }

  # view survey publicly and complete survey
  public function view_survey(Survey $survey)
  {
    $survey->option_name = unserialize($survey->option_name);
    return view('survey.view', compact('survey'));
  }

  public function new_surveyAd()
{
  return view('advisor.new');
}

public function createAd(Request $request, Survey $survey)
{
  $arr = $request->all();
  // $request->all()['user_id'] = Auth::id();
  $arr['user_id'] = Auth::id();
  $surveyItem = $survey->create($arr);
  return Redirect::to("/advisorsurvey/{$surveyItem->id}");
}

# retrieve detail page and add questions here
public function detail_surveyAd(Survey $survey)
{
  $survey->load('questions.user');
  return view('advisor.detail', compact('survey'));
}

public function editAd(Survey $survey)
  {
    return view('advisor.edit', compact('survey'));
  }

  # edit survey
  public function updateAd(Request $request, Survey $survey)
  {
    $survey->update($request->only(['title', 'description']));
    return redirect()->action('student\SurveyController@detail_surveyAd', [$survey->id]);
  }

  public function view_surveyAd(Survey $survey)
  {
    $survey->option_name = unserialize($survey->option_name);
    return view('advisor.view', compact('survey'));
  }

public function new_surveyAdlec()
{
  return view('AdLec.new');
}

public function createAdlec(Request $request, Survey $survey)
{
  $arr = $request->all();
  // $request->all()['user_id'] = Auth::id();
  $arr['user_id'] = Auth::id();
  $surveyItem = $survey->create($arr);
  return Redirect::to("/adlecsurvey/{$surveyItem->id}");
}

# retrieve detail page and add questions here
public function detail_surveyAdlec(Survey $survey)
{
  $survey->load('questions.user');
  return view('AdLec.detail', compact('survey'));
}

public function editAdlec(Survey $survey)
  {
    return view('AdLec.edit', compact('survey'));
  }

  # edit survey
  public function updateAdlec(Request $request, Survey $survey)
  {
    $survey->update($request->only(['title', 'description']));
    return redirect()->action('student\SurveyController@detail_surveyAdlec', [$survey->id]);
  }

  public function view_surveyAdlec(Survey $survey)
  {
    $survey->option_name = unserialize($survey->option_name);
    return view('Adlec.view', compact('survey'));
  }

  public function new_surveyEdu()
  {
    return view('EducationOfficer.new');
  }

  public function createEdu(Request $request, Survey $survey)
  {
    $arr = $request->all();
    // $request->all()['user_id'] = Auth::id();
    $arr['user_id'] = Auth::id();
    $surveyItem = $survey->create($arr);
    return Redirect::to("/edusurvey/{$surveyItem->id}");
  }

  # retrieve detail page and add questions here
  public function detail_surveyEdu(Survey $survey)
  {
    $survey->load('questions.user');
    return view('EducationOfficer.detail', compact('survey'));
  }

  public function editEdu(Survey $survey)
    {
      return view('EducationOfficer.edit', compact('survey'));
    }

    # edit survey
    public function updateEdu(Request $request, Survey $survey)
    {
      $survey->update($request->only(['title', 'description']));
      return redirect()->action('student\SurveyController@detail_surveyEdu', [$survey->id]);
    }

    public function view_surveyEdu(Survey $survey)
    {
      $survey->option_name = unserialize($survey->option_name);
      return view('EducationOfficer.view', compact('survey'));
    }


  public function new_surveyLF()
  {
    return view('LF.new');
  }

  public function createLF(Request $request, Survey $survey)
  {
    $arr = $request->all();
    // $request->all()['user_id'] = Auth::id();
    $arr['user_id'] = Auth::id();
    $surveyItem = $survey->create($arr);
    return Redirect::to("/lfsurvey/{$surveyItem->id}");
  }

  # retrieve detail page and add questions here
  public function detail_surveyLF(Survey $survey)
  {
    $survey->load('questions.user');
    return view('LF.detail', compact('survey'));
  }

  public function editLF(Survey $survey)
    {
      return view('LF.edit', compact('survey'));
    }

    # edit survey
    public function updateLF(Request $request, Survey $survey)
    {
      $survey->update($request->only(['title', 'description']));
      return redirect()->action('student\SurveyController@detail_surveyLF', [$survey->id]);
    }

    public function view_surveyLF(Survey $survey)
    {
      $survey->option_name = unserialize($survey->option_name);
      return view('LF.view', compact('survey'));
    }

# view submitted answers from current logged in user
public function view_survey_answers(Survey $survey)
{
  $survey->load('user.questions.answers');
  $answer = Answer::where('user_id',Auth::user()->id);
  return view('answer.view', compact('survey','answer'));
}

public function view_survey_answersAd(Survey $survey)
{
  $survey->load('user.questions.answers');
  return view('advisor.viewAnswer', compact('survey'));
}

public function view_survey_answersAdlec(Survey $survey)
{
  $survey->load('user.questions.answers');
  return view('AdLec.viewAnswer', compact('survey'));
}

public function view_survey_answersEdu(Survey $survey)
{
  $survey->load('user.questions.answers');
  return view('EducationOfficer.viewAnswer', compact('survey'));
}

public function view_survey_answersLF(Survey $survey)
{
  $survey->load('user.questions.answers');
  return view('LF.viewAnswer', compact('survey'));
}

public function view_surveyStudent(Survey $survey)
    {
      $survey->option_name = unserialize($survey->option_name);
      return view('student.view', compact('survey'));
    }

public function view_survey_answersStudent(Survey $survey)
{
    // $survey = Answer::where('user_id',Auth::id());
    // if($answer = Answer::where('user_id',Auth::id())){
        $survey->load('user.questions.answers');
        // $stuanswer = Answer::where('user_id',Auth::id())->first();
    // }

    // ->where(Auth::id(), '=', Answer()->user_id);
    // ->join('answer', 'survey.user_id', '=', 'answer.user_id')
    // ->where('user_id',Auth::id());
    return view('student.viewAnswer', compact('survey'));
}

//   public function delete_survey(Survey $survey)
//   {
//     $survey->delete();
//     return redirect('');
//   }

  public function delete_survey($survey)
  {
    $survey = Survey::find($survey);
    $survey->delete();
    return redirect('/indexSurvey');
  }

  public function delete_surveyAd($survey)
  {
    $survey = Survey::find($survey);
    $survey->delete();
    return redirect('/advisorSurvey');
  }

  public function delete_surveyAdlec($survey)
  {
    $survey = Survey::find($survey);
    $survey->delete();
    return redirect('/adlecSurvey');
  }

  public function delete_surveyEdu($survey)
  {
    $survey = Survey::find($survey);
    $survey->delete();
    return redirect('/EducationOfficerSurvey');
  }

  public function delete_surveyLF($survey)
  {
    $survey = Survey::find($survey);
    $survey->delete();
    return redirect('/LFSurvey');
  }

  public function index() {
    $survey = Survey::all();
    return view('survey.index',[
        'survey' => $survey,
    ]);
  }

  public function lecindex() {
    //   $survey = Survey::all();
    $survey = Survey::where('user_id',Auth::id())->get();
      return view('survey.lecindex',[
            'survey' => $survey,
        ]);
  }

  public function advisorindex() {
    // $survey = Survey::all();
    $survey = Survey::where('user_id',Auth::id())->get();

      return view('survey.advisorindex',[
            'survey' => $survey,
        ]);
}

public function adLecindex() {
    // $survey = Survey::all();
    $survey = Survey::where('user_id',Auth::id())
                      ->orWhere('user_id','=','1')
                      ->orWhere('user_id','=','4')
                      ->orWhere('user_id','=','6')->get();
    return view('survey.adLecindex',[
          'survey' => $survey,
      ]);
}

public function eduindex() {
    // $survey = Survey::all();
    $survey = Survey::where('user_id',Auth::id())->get();
    return view('survey.eduindex',[
          'survey' => $survey,
      ]);
}

public function lfindex() {
    // $survey = Survey::all();
    $survey = Survey::where('user_id',Auth::id())->orWhere('user_id','=','1')->get();
    return view('survey.lfindex',[
          'survey' => $survey,
      ]);
}

}
