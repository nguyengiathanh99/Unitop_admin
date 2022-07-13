@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Thêm tài liệu')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('document.index') }}" class="link_menu_page">
            <i class="fa fa-file"></i> Tài liệu
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
                                        <div class="form-group" {{ $errors->has('document_name') ? 'has-error' : '' }}>
                                            <label for="name">Tên tài liệu</label>
                                            <input type="text" class="form-control" id="name" placeholder="Tên tài liệu..." name="document_name">
                                            @if($errors->has('document_name'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('document_name') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                        <div class="form-group" {{ $errors->has('document_title') ? 'has-error' : '' }}>
                                            <label for="name">Tiêu đề</label>
                                            <input type="text" class="form-control" id="title" placeholder="Tên tiêu đề..." name="document_title">
                                            @if($errors->has('document_title'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('document_title') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                        <div class="form-group" {{ $errors->has('lesson_image') ? 'has-error' : '' }}>
                                            <p><label for="file" style="cursor: pointer;">Hình ảnh</label></p>
                                            <p><input type="file"  accept="image/*" name="lesson_image" id="file"  onchange="loadFile(event)"></p>
                                            <p><img id="output" width="200" /></p>
                                            @if($errors->has('lesson_image'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('lesson_image') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                        <div class="form-group" {{ $errors->has('document_file_path') ? 'has-error' : '' }}>
                                            <label for="video">Video bài giảng</label>
                                            <input type="file" class="form-control" id="video" name="document_file_path">
                                            @if($errors->has('document_file_path'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('document_file_path') }}</strong>
                                                 </span>
                                            @endif
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
                <div class="col-md-12 text-center">
                </div>
            </div>
        </div>
    </div>
@endsection
