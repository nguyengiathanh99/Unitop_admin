@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add Document')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('document.index') }}" class="link_menu_page">
            <i class="fa fa-user"></i> Document
        </a>
    </li>
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Lesson_id</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th class="text-center">File Path</th>
                                <th class="text-center">Created</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Lesson_id</label>
                                            <select class="js-example-basic-single" name="state" style="width: 100%">
                                                @foreach($lessons as $lesson)
                                                    <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                                @endforeach>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter title" name="document_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Enter title" name="document_title">
                                        </div>
                                        <div class="form-group">
                                            <p><label for="file" style="cursor: pointer;">Upload Image</label></p>
                                            <p><input type="file"  accept="image/*" name="lesson_image" id="file"  onchange="loadFile(event)"></p>
                                            <p><img id="output" width="200" /></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="video">File Video</label>
                                            <input type="file" class="form-control" id="video" placeholder="Enter file video" name="document_file_path">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
{{--                    {{ $course->links() }}--}}
                </div>
            </div>
        </div>
    </div>
@endsection