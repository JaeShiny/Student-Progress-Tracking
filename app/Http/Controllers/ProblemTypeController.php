<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\spts\Problem;
use App\Model\spts\ProblemType;
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

class ProblemTypeController extends Controller
{

    public function create(){
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $generation = Generation::all();

        return view('Admin.problemtype.create',[
            'semester' => $semester,
            'generation' => $generation,
        ]);

    }
    public function store(Request $request){

        $condition = new ProblemType();

        $condition->problem_type = $request->problem_type;

        $condition->save();

        return redirect('/ProblemType')->with('success', 'Conditions is successfully saved');
    }

    public function index(){
        $conditions = ProblemType::all();

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $generation = Generation::all();

         return view('Admin.problemtype.index', [
            'semester' => $semester,
            'generation' => $generation,
            'conditions' => $conditions,
        ]);
    }
    public function edit($id){
        $conditions = ProblemType::findOrFail($id);

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $generation = Generation::all();

        return view('Admin.problemtype.edit', [
            'semester' => $semester,
            'generation' => $generation,
            'conditions' => $conditions,
        ]);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'problem_type' => 'required',
        ]);
        ProblemType::whereId($id)->update($validatedData);

        return redirect('/ProblemType')->with('success', 'Conditions is successfully updated');
    }

    public function destroy($id){
        $conditions = ProblemType::findOrFail($id);
        $conditions->delete();

        return redirect('/ProblemType')->with('success', 'Conditions is successfully deleted');
    }
}
