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
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Study;
use App\Model\mis\Generation;

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
    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
    return view('survey.new',compact('semester'));
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
    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
  $survey->load('questions.user');
  return view('survey.detail', compact('survey','semester'));
}


  public function edit(Survey $survey)
  {
    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
    return view('survey.edit', compact('survey','semester'));
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
    $survey = Survey::find($survey);
    $question = Question::where('survey_id',$survey->id)->get();

    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
    $survey->option_name = unserialize($survey->option_name);
    return view('survey.view', ['survey' => $survey,
                                  'questionme' => $question,
                                  'semester' => $semester
    ]);
  }

  public function new_surveyAd()
{
    $generation = Generation::all();
  return view('advisor.new','generation');
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
    $generation = Generation::all();
  $survey->load('questions.user');
  return view('advisor.detail', compact('survey','generation'));
}

public function editAd(Survey $survey)
  {
    $generation = Generation::all();
    return view('advisor.edit', compact('survey','generation'));
  }

  # edit survey
  public function updateAd(Request $request, Survey $survey)
  {
    $survey->update($request->only(['title', 'description']));
    return redirect()->action('student\SurveyController@detail_surveyAd', [$survey->id]);
  }

  public function view_surveyAd(Survey $survey)
  {
    $generation = Generation::all();
    $survey->option_name = unserialize($survey->option_name);
    return view('advisor.view', compact('survey','generation'));
  }

public function new_surveyAdlec()
{
    $test = Instructor::where('last_name',Auth::user()->lastname)->first();
    $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
    $generation = Generation::all();
  return view('AdLec.new',compact('semester','generation'));
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
    $test = Instructor::where('last_name',Auth::user()->lastname)->first();
    $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
    $generation = Generation::all();
  $survey->load('questions.user');
  return view('AdLec.detail', compact('survey','semester','generation'));
}

public function editAdlec(Survey $survey)
  {
    $test = Instructor::where('last_name',Auth::user()->lastname)->first();
    $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
    $generation = Generation::all();
    return view('AdLec.edit', compact('survey','semester','generation'));
  }

  # edit survey
  public function updateAdlec(Request $request, Survey $survey)
  {
    $survey->update($request->only(['title', 'description']));
    return redirect()->action('student\SurveyController@detail_surveyAdlec', [$survey->id]);
  }

  public function view_surveyAdlec(Survey $survey)
  {
    $test = Instructor::where('last_name',Auth::user()->lastname)->first();
    $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
    $generation = Generation::all();
    $survey->option_name = unserialize($survey->option_name);
    return view('Adlec.view', compact('survey','semester','generation'));
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
    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
    return view('LF.new',compact('semester'));
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
    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
    $survey->load('questions.user');
    return view('LF.detail', compact('survey','semester'));
  }

  public function editLF(Survey $survey)
    {
        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
      return view('LF.edit', compact('survey','semester'));
    }

    # edit survey
    public function updateLF(Request $request, Survey $survey)
    {
      $survey->update($request->only(['title', 'description']));
      return redirect()->action('student\SurveyController@detail_surveyLF', [$survey->id]);
    }

    public function view_surveyLF(Survey $survey)
    {
        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
      $survey->option_name = unserialize($survey->option_name);
      return view('LF.view', compact('survey','semester'));
    }

# view submitted answers from current logged in user
public function view_survey_answers($survey)
{
    $mysurvey = Survey::find($survey);
    $question = Question::where('survey_id',$survey)->get();

    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
//   $survey->load('user.questions.answers');
//   $answer = Answer::where('user_id',Auth::user()->id);
//   return view('answer.view', compact('survey','answer','semester'));
  return view('answer.view', [
    'question' => $question,
    'survey' => $mysurvey,
    'semester' => $semester
]);
}

public function view_survey_answersAd(Survey $survey)
{
    $generation = Generation::all();
  $survey->load('user.questions.answers');
  return view('advisor.viewAnswer', compact('survey','generation'));
}

public function view_survey_answersAdlec(Survey $survey)
{
    $test = Instructor::where('last_name',Auth::user()->lastname)->first();
    $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
    $generation = Generation::all();
  $survey->load('user.questions.answers');
  return view('AdLec.viewAnswer', compact('survey','semester','generation'));
}

public function view_survey_answersEdu(Survey $survey)
{
  $survey->load('user.questions.answers');
  return view('EducationOfficer.viewAnswer', compact('survey'));
}

public function view_survey_answersLF(Survey $survey)
{
    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
  $survey->load('user.questions.answers');
  return view('LF.viewAnswer', compact('survey','semester'));
}

public function view_surveyStudent($survey)
    {
      $survey = Survey::find($survey);
      $question = Question::where('survey_id',$survey->id)->get();
      return view('student.view', ['survey' => $survey,
                                    'questionme' => $question,
      ]);
    }

public function view_survey_answersStudent($survey)
{
    // $survey = Answer::where('user_id',Auth::id());
    // if($answer = Answer::where('user_id',Auth::id())){
        $mysurvey = Survey::find($survey);
        $question = Question::where('survey_id',$survey)->get();
        // $stuanswer = Answer::where('user_id',Auth::id())->first();
    // }

    // ->where(Auth::id(), '=', Answer()->user_id);
    // ->join('answer', 'survey.user_id', '=', 'answer.user_id')
    // ->where('user_id',Auth::id());
    return view('student.viewAnswer', [
        'question' => $question,
        'survey' => $mysurvey
    ]);
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

    $survey = Survey::where('user_id',Auth::id())
                        ->orWhere('user_id','=','2')
                        ->orWhere('user_id','=','3')->get();

    $gen = Generation::all();
    $surveys = Survey::all();

    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
      return view('survey.lecindex',[
            'survey' => $survey,
            'semester' => $semester,
            'gen' => $gen,
            'surveys' => $surveys,
        ]);
  }

//   public function lecindex1($semester,$year) {
//     //   $survey = Survey::all();

//     $survey = Survey::where('user_id',Auth::id())
//                         ->orWhere('user_id','=','2')
//                         ->orWhere('user_id','=','3')->where('semester',$semester)->where('year',$year)->get();

//     // $gen = Generation::all();
//     $surveys = Survey::all();

//     $test = Instructor::where('first_name', Auth::user()->name)->first();
//     $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
//       return view('survey.lecindex',[
//             'survey' => $survey,
//             'semester' => $semester,
//             // 'gen' => $gen,
//             'surveys' => $surveys
//         ]);
//   }

  public function advisorindex() {
    // $survey = Survey::all();
    $survey = Survey::where('user_id',Auth::id())->get();
    $generation = Generation::all();
      return view('survey.advisorindex',[
            'survey' => $survey,
            'generation' => $generation
        ]);
}

public function adLecindex() {
    // $survey = Survey::all();
    $survey = Survey::where('user_id',Auth::id())
                      ->orWhere('user_id','=','1')
                      ->orWhere('user_id','=','2')
                      ->orWhere('user_id','=','3')->get();

                      $test = Instructor::where('last_name',Auth::user()->lastname)->first();
                      $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
                      $generation = Generation::all();
    return view('survey.adLecindex',[
          'survey' => $survey,
          'semester' => $semester,
          'generation' => $generation,
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
    $test = Instructor::where('first_name', Auth::user()->name)->first();
    $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
    $survey = Survey::where('user_id',Auth::id())
                    ->orWhere('user_id','=','1')
                    ->orWhere('user_id', '=','4')->get();
    return view('survey.lfindex',[
          'survey' => $survey,
          'semester' => $semester
      ]);
}

}
