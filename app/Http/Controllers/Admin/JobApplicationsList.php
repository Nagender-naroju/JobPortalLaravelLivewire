<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobApplicationsList extends Controller
{
    public function index()
    {
        return view('Admin.job-applications');
    }
}
