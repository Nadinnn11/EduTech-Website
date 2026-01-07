<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function dashboard(Request $request)
{
    // Pastikan user student
    if (!auth()->user() || auth()->user()->role !== 'student') {
        return redirect()->route('login')->with('error', 'Akses ditolak');
    }
    
    $search = $request->input('search');
    
    $coursesQuery = Course::withCount('materials')->latest();
    if ($search) {
        $coursesQuery->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");  // pakai description
        });
    }
    $courses = $coursesQuery->take(8)->get();
    
    $user = auth()->user();
    $enrolledIds = is_array($user->enrolled_courses) ? $user->enrolled_courses : [];
    $enrolledQuery = Course::whereIn('id', $enrolledIds);
    
    if ($search) {
        $enrolledQuery->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }
    
    $enrolledCourses = $enrolledQuery->withCount('materials')->get();

    return view('student.dashboard', compact('courses', 'enrolledCourses', 'search'));
}
}
