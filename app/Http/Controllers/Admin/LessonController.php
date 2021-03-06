<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function home(Request $request)
    {
        $lessons = Lesson::search($request->all())->paginate(10);
        return view('lessons.home', compact('lessons', 'request'));
    }

    public function create()
    {
        $courses = Course::select('id','name')->get();
        return view('lessons.create', compact('courses'));
    }

    public function store(LessonRequest $request)
    {
        $data = [
            'course_id' => $request->state,
            'name' =>  $request->lesson_name,
            'time' => $request->lesson_time,
            'description' => $request->lesson_desc,
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('lesson/image'), $filename);
            $data['image']= 'lesson/image/'.$filename;
        }
        if (!empty($data)) {
            Lesson::create($data);
            return redirect()->route('lesson.home')->with('success', 'Thêm bài học thành công !');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $courses = $lesson->course->get();
        return view('lessons.edit', compact('lesson','courses'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'course_id' => $request->course_id,
            'name' => $request->name,
            'description' => $request->description,
            'time' => $request->time,
        ];
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('lesson/image'), $filename);
            $data['image']= 'lesson/image/'.$filename;
        }
        $lesson = Lesson::where('id',$id)->update($data);
        if ($lesson) {
            return redirect()->route('lesson.home')->with('success','Cập nhật bài học thành công !');
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->back();
    }
}
