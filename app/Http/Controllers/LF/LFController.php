<?php

namespace App\Http\Controllers\LF;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LFController extends Controller
{
    public function index()
    {
        return view('LF/dashboard');
    }
}
