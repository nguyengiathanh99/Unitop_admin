<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {

        $tags = Tag::search($request->all())->paginate(10);
        return view('tags.index', compact('tags', 'request'));
    }

    public function create()
    {
        $courses = Course::select('id','name')->get();
        return view('tags.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->tag_name,
            'link' => $request->tag_link,
        ];
        if (!empty($data)) {
            Tag::create($data);
            return redirect()->route('tag.index');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        $courses = $tag->course->get();
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'link' => $request->link,
        ];

        $tag = Tag::where('id',$id)->update($data);
        if ($tag) {
            return redirect()->route('tag.index');
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back();
    }
}
