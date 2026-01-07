<?php




namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\Material;


use Illuminate\Http\Request;




class MaterialController extends Controller
{
   



    public function __construct()
    {
        $this->middleware('auth');
    }

  public function index()
{
    $materials = Material::with('course')
        ->latest()
        ->get()
        ->groupBy(function ($material) {
            return $material->course->title ?? 'Belum ada kursus';
        });

    return view('materials.index', compact('materials'));
}





    public function create()
    {
        $courses = Course::all();
        return view('materials.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title'     => 'required|string|max:255',
            'content'   => 'required|string|min:20',
        ]);

        $nextOrder = Material::where('course_id', $validated['course_id'])
            ->max('order_number') ?? 0;

        Material::create([
            'course_id'    => $validated['course_id'],
            'title'        => $validated['title'],
            'content'      => $validated['content'],
            'order_number' => $nextOrder + 1,
        ]);

        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil ditambahkan!');
    }

    public function show(Material $material)
    {
        $material->load('course');
        return view('materials.show', compact('material'));
    }

    public function edit(Material $material)
    {
        $courses = Course::all();
        return view('materials.edit', compact('material', 'courses'));
    }

    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            'course_id'    => 'required|exists:courses,id',
            'title'        => 'required|string|max:255',
            'content'      => 'required|string|min:20',
            'order_number' => 'required|integer|min:1|max:999',
        ]);

        $material->update($validated);

        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil diupdate!');
    }

    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil dihapus!');
    }

    
}
