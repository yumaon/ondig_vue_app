<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function top()
    {
        return Inertia::render('Home/Top');
    }
}
