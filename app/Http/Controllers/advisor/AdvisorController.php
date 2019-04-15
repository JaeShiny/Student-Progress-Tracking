<?php

namespace App\Http\Controllers\advisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvisorController extends Controller
{
    public function index()
    {
        return view('advisor/dashboard');
    }
}
