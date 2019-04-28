<?php

namespace App\Http\Controllers\EducationOfficer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationOfficerController extends Controller
{
    public function index()
    {
        return view('educationOfficer/dashboard');
    }
}
