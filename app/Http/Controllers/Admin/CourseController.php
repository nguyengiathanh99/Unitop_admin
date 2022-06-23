<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->course_name,
            'description' => $request->course_desc,
        ];

        if($request->file('course_image')){
            $file= $request->file('course_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('course/image'), $filename);
            $data['image']= 'course/image/'.$filename;
        }
        $course = Course::create($data);
        if ($course) {
            return redirect()->route('course.index');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        if($request->file('myFile')){
            $file= $request->file('myFile');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('course/image'), $filename);
            $data['image'] = 'course/image/'.$filename;
        }
        $course = Course::where('id', $id)->update($data);
        if ($course) {
            return redirect()->route('course.index');
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->back();
    }
}
