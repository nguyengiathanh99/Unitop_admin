@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Thêm bài học')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('lesson.home') }}" class="link_menu_page">
            <i class="fa fa-list-alt"></i> Bài học
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
                                        <div class="form-group" {{ $errors->has('lesson_name') ? 'has-error' : '' }}>
                                            <label for="name">Tên bài học</label>
                                            <input type="text" class="form-control" id="name" placeholder="Nhập tên bài học" name="lesson_name" value="{{ old('lesson_name') }}">
                                            @if($errors->has('lesson_name'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('lesson_name') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                        <div class="form-group" {{ $errors->has('image') ? 'has-error' : '' }}>
                                            <p><label for="file" style="cursor: pointer;">Hình ảnh</label></p>
                                            <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"></p>
                                            <p><img id="output" width="200"/></p>
                                            @if($errors->has('image'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group" {{ $errors->has('lesson_time') ? 'has-error' : '' }}>
                                            <label>Thời gian</label>
                                            <input type="number" class="form-control" id="time" placeholder="Nhập thời gian" name="lesson_time" value="{{ old('lesson_time') }}">
                                            @if($errors->has('lesson_time'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('lesson_time') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <textarea class="form-control" rows="3" placeholder="Nhập...." name="lesson_desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Khởi tạo</button>
                                    </div>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
