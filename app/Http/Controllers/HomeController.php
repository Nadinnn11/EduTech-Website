<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class HomeController 
{
    public function index()
    {
        if (!auth()->check()) {
            return view('home');
        }

        if (auth()->user()->isAdmin()) {
            return redirect()->route('courses.index');
        }

        return redirect()->route('student.dashboard');
    }
}
