<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $admin = Auth::user();
        if (!$admin->isAdmin()) {
            abort(403);
        }

        $courses = Course::withCount('materials')->paginate(5);

        return view('admin.dashboard', compact('courses'));
    }
}
