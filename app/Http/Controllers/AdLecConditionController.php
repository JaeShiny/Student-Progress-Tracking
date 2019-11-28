<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\spts\Problem;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\User;
use App\Model\mis\Bio;
use App\Model\mis\Student;
use Auth;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Study;
use App\Model\mis\Generation;
use App\Model\InspectorCondition;
use App\Inspector\HeaderNotificationCount;

class AdLecConditionController extends Controller
{
    use HeaderNotificationCount;

    public function create(){
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $generation = Generation::all();

        return view('AdLec.condition.create',[
            'semester' => $semester,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);

    }
    public function store(Request $request){
        // $validatedData = $request->validate([
        //      'book_name' => 'required|max:255',
        //      'isbn_no' => 'required|alpha_num',
        //      'book_price' => 'required|numeric',
        //  ]);
        //  $book = Book::create($validatedData);

        $condition = new InspectorCondition();

        $condition->behavior_attribute = $request->behavior_attribute;
        $condition->condition = $request->condition;
        $condition->value = $request->value;
        // $condition->course_id = $request->course_id;
        // $condition->semester = $request->semester;
        // $condition->year = $request->year;
        $condition->instructor_id = Auth::user()->instructor_id;
        // $condition->name_column = $request->name_column;
        $condition->student_id = Auth::user()->student_id;
        $condition->curriculum = Auth::user()->curriculum;
        $condition->position = Auth::user()->position;

        $condition->save();

        return redirect('/AdLecConditions')->with('success', 'Conditions is successfully saved');
    }

    public function index(){
        $conditions = InspectorCondition::all();

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $generation = Generation::all();

        //  return view('lecturer.condition.index', compact('conditions'));
         return view('AdLec.condition.index', [
            // 'student_id' => $student,
            'semester' => $semester,
            'generation' => $generation,
            'conditions' => $conditions,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }
    public function edit($id){
        $conditions = InspectorCondition::findOrFail($id);

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $generation = Generation::all();

        // return view('edit', compact('book'));
        return view('AdLec.condition.edit', [
            // 'student_id' => $student,
            'semester' => $semester,
            'generation' => $generation,
            'conditions' => $conditions,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'behavior_attribute' => 'required',
            'condition' => 'required',
            'value' => 'required',
            // 'instructor_id' => 'required',
            // 'name_column' => 'required',
            // 'course_id' => 'required',
            // 'semester' => 'required',
            // 'year' => 'required',
        ]);
        InspectorCondition::whereId($id)->update($validatedData);

        // $condition = InspectorCondition::whereId($id);

        // $condition->behavior_attribute = $request->behavior_attribute;
        // $condition->condition = $request->condition;
        // $condition->value = $request->value;
        // $condition->course_id = $request->course_id;
        // $condition->semester = $request->semester;
        // $condition->year = $request->year;
        // $condition->instructor_id = Auth::user()->instructor_id;
        // $condition->student_id = Auth::user()->student_id;
        // $condition->curriculum = Auth::user()->curriculum;
        // $condition->position = Auth::user()->position;

        // $condition->save();

        return redirect('/AdLecConditions')->with('success', 'Conditions is successfully updated');
    }

    public function destroy($id){
        $conditions = InspectorCondition::findOrFail($id);
        $conditions->delete();

        return redirect('/AdLecConditions')->with('success', 'Conditions is successfully deleted');
    }
}
