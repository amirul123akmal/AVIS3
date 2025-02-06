<?php

namespace App\Http\Controllers\Volunteers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class volunteerController extends Controller
{
    public function homepage()
    {
        return view('volunteers.homepage');
    }
}
