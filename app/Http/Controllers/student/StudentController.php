<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inspector\HeaderNotificationCount;

class StudentController extends Controller
{
    use HeaderNotificationCount;

    public function index()
    {
        return view('student/dashboard');
    }
}
