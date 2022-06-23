@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add Course')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('course.index') }}" class="link_menu_page">
            <i class="fa fa-user"></i> Course
        </a>
    </li>
@endsection

@section('content')
    <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="course_name">
            </div>
            <div class="form-group">
                <p><label for="file" style="cursor: pointer;">Upload Image</label></p>
                <p><input type="file"  accept="image/*" name="course_image" id="file"  onchange="loadFile(event)"></p>
                <p><img id="output" width="200" /></p>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..." name="course_desc"></textarea>
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
