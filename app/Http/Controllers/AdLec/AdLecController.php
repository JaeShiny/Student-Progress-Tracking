<?php

namespace App\Http\Controllers\AdLec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdLecController extends Controller
{
    public function index()
    {
        return view('AdLec/dashboard');
    }
}
