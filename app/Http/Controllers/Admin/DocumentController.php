<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Lesson;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $docs = Document::search($request->all())->paginate(10);
        return view('docs.index', compact('docs', 'request'));
    }

    public function create()
    {
        $lessons = Lesson::select('id','name')->get();
        return view('docs.create', compact('lessons'));
    }

    public function store(DocumentRequest $request)
    {
        $data = [
            'lesson_id' => $request->state,
            'name' => $request->document_name,
            'title' => $request->document_title,
            'image' => $request->lesson_image,
        ];
        if($request->file('lesson_image')){
            $file= $request->file('lesson_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('lesson/image'), $filename);
            $data['image']= 'lesson/image/'.$filename;
        }

        if($request->file('document_file_path')){
            $file= $request->file('document_file_path');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('lesson/uploads'), $filename);
            $data['file_path']= 'lesson/uploads/'.$filename;
        }
        if (!empty($data)) {
            Document::create($data);
            return redirect()->route('document.index')->with('success', 'Thêm mới tài liệu thành công !');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $doc = Document::find($id);
        $lessons = Lesson::select('id','name')->get();
        return view('docs.edit', compact('doc', 'lessons'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'lesson_id' => $request->lesson_id,
            'name' => $request->name,
            'title' => $request->title,
        ];
        if($request->file('myFile')){
            $file= $request->file('myFile');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('lesson/image'), $filename);
            $data['image']= 'lesson/image/'.$filename;
        }
        if($request->file('file_path')){
            $file= $request->file('file_path');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('lesson/uploads'), $filename);
            $data['file_path']= 'lesson/uploads/'.$filename;
        }
        $doc = Document::where('id',$id)->update($data);
        if ($doc) {
            return redirect()->route('document.index')->with('success', 'Cập nhật tài liệu thành công !');
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $doc = Document::find($id);
        $doc->delete();
        return redirect()->back();
    }
}
