<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function dashboard(Request $request)
{
    $search = $request->get('search');
    
  
    $coursesQuery = Course::withCount('materials')->latest();
    if ($search) {
        $coursesQuery->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('brand_description', 'like', "%{$search}%");
        });
    }
    $courses = $coursesQuery->take(8)->get();
    
    $user = auth()->user();
    $enrolledIds = is_array($user->enrolled_courses) ? $user->enrolled_courses : [];
    $enrolledQuery = Course::whereIn('id', $enrolledIds);
    
    if ($search) {
        $enrolledQuery->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('brand_description', 'like', "%{$search}%");
        });
    }
    
    $enrolledCourses = $enrolledQuery->withCount('materials')->get();

   
    return view('student.dashboard', compact('courses', 'enrolledCourses', 'search'));
}

    public function index()
    {
        $courses = Course::withCount('materials')
            ->with('creator')
            ->latest()
            ->paginate(10);

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('courses.index')
                ->with('error', 'Anda tidak memiliki akses untuk membuat kursus.');
        }
        return view('courses.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('courses.index')
                ->with('error', 'Anda tidak memiliki akses untuk membuat kursus.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:courses,title',
            'description' => 'required|string|min:10',
        ]);

        Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('courses.index')
            ->with('success', 'Kursus berhasil dibuat!');
    }

    public function show(Course $course)
    {
        $course->load(['materials', 'creator']);
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        if (!Auth::user()->isAdmin() && Auth::id() !== $course->created_by) {
            return redirect()->route('courses.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit kursus ini.');
        }

        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        if (!Auth::user()->isAdmin() && Auth::id() !== $course->created_by) {
            return redirect()->route('courses.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengupdate kursus ini.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:courses,title,' . $course->id,
            'description' => 'required|string|min:10',
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Kursus berhasil diupdate!');
    }

    public function destroy(Course $course)
    {
        if (!Auth::user()->isAdmin() && Auth::id() !== $course->created_by) {
            return redirect()->route('courses.index')
                ->with('error', 'Anda tidak memiliki akses untuk menghapus kursus ini.');
        }

        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Kursus berhasil dihapus!');
    }
   public function enroll($id)
{
    $course = Course::findOrFail($id);
    $user = auth()->user();
    
    $enrolled = $user->enrolled_courses ?? [];
    if (!in_array($id, $enrolled)) {
        $enrolled[] = $id;
        $user->enrolled_courses = array_unique($enrolled);
        $user->save();
    }

    return redirect()->back()->with('success', 'Berhasil enroll "' . $course->title . '"!');
}



}
