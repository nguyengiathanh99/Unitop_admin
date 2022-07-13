@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Tạo khóa học')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('course.index') }}" class="link_menu_page">
            <i class="fa fa-book"></i> Khóa học
        </a>
    </li>
@endsection

@section('content')
    <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group" {{ $errors->has('course_name') ? 'has-error' : '' }}>
                <label for="name">Tên khóa học</label>
                <input type="text" class="form-control" id="name" placeholder="Nhập tên khóa học" name="course_name" value="{{ old('course_name') }}">
                @if($errors->has('course_name'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('course_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group" {{ $errors->has('course_image') ? 'has-error' : '' }}>
                <p><label for="file" style="cursor: pointer;">Hình ảnh</label></p>
                <p><input type="file" accept="image/*" name="course_image" id="file" onchange="loadFile(event)"></p>
                <p><img id="output" width="200"/></p>
                @if($errors->has('course_image'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('course_image') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Ghi chú</label>
                <textarea class="form-control" rows="3" placeholder="Nhập..." name="course_desc">{{ old('course_desc') }}</textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Khởi tạo</button>
        </div>
    </form>
@endsection
