@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add Lesson')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('lesson.home') }}" class="link_menu_page">
            <i class="fa fa-user"></i> Lesson
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
                                <th>Course_id</th>
                                <th>Name</th>
                                <th>Time</th>
                                <th>Desciption</th>
                                <th class="text-center">Created</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('lesson.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Course_id</label>
                                            <select class="js-example-basic-single" name="state" style="width: 100%">
                                                @foreach($courses as $course)
                                                <option  value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="lesson_name">
                                        </div>
                                        <div class="form-group">
                                            <label>Time</label>
                                            <input type="number" class="form-control" id="time" placeholder="Enter time" name="lesson_time">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="lesson_desc"></textarea>
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

