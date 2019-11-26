<?php

namespace App\Http\Controllers\EducationOfficer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inspector\HeaderNotificationCount;

class EducationOfficerController extends Controller
{
    use HeaderNotificationCount;

    public function index()
    {
        return view('educationOfficer/dashboard');
    }
}
