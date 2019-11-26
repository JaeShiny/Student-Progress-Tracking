<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inspector\HeaderNotificationCount;

class AdminController extends Controller
{
    use HeaderNotificationCount;

    public function index()
    {
        return view('Admin/dashboard');
    }
}
