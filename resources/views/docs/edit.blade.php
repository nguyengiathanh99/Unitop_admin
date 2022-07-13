@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Cập nhật tài liệu')

@section('menu_pagina')

    <li role="presentation">
        <a href="{{ route('document.index') }}" class="link_menu_page">
            <i class="fa fa-user"></i> Tài liệu
        </a>
    </li>

@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('document.update',$doc->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('lesson_id') ? 'has-error' : '' }}">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto my-1">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Lesson_id</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                                    style="width: 100%" name="lesson_id">
                                                @foreach($lessons as $lesson)
                                                    <option value="{{ $lesson->id }}" {{ $doc->lesson_id == $lesson->id ? 'selected' : '' }}>{{ $lesson->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Tên tài liệu</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required=""
                                           autofocus value="{{$doc->name}}">
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="nome">Tiêu đề</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title" required=""
                                           autofocus value="{{$doc->title}}">
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nome">Hình ảnh</label>
                                    <div class="course-img">
                                        <img src="{{ asset($doc->image) }}" alt="{{ $doc->image }}"
                                             class="img-thumbnail" id="image">
                                        <label for="myFile" class="fileImage"><i class="fa fa-camera"></i></label>
                                        <input type="file" id="myFile" name="myFile" class="inputFile">
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('file_video') ? 'has-error' : '' }}">
                                    <label for="file_path">Video bài giảng</label>
                                    <input type="file" name="file_path" class="form-control" id="file_path"
                                           placeholder="File_path" value="{{ $doc->file_path }}">
                                    @if($errors->has('file_path'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('file_video') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary pull-right"><i
                                            class="fa fa-fw fa-save"></i> Lưu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('layout_js')

    <script>
      $(function () {
        $('.select2').select2({
          "language": {
            "noResults": function () {
              return "No records found.";
            }
          }
        });

        $('#icheck').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue'
        });
      });

    </script>

@endsection
