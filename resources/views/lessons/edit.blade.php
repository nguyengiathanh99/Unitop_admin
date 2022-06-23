@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Edit Lesson')

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
                    <form action="{{ route('lesson.update',$lesson->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('course_id') ? 'has-error' : '' }}">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto my-1">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Course_id</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 100%" name="course_id">
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}" {{ $lesson->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="nome">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required="" autofocus value="{{$lesson->name}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
                                        <label for="nome">Time</label>
                                        <input type="number" name="time" class="form-control" placeholder="Time" required="" autofocus value="{{$lesson->time}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('time') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label for="course_desc">Description</label>
                                        <textarea class="form-control" id="course_desc" rows="3"
                                                  name="description">{{ $lesson->description }}</textarea>
                                        @if($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary pull-right"><i
                                                class="fa fa-fw fa-save"></i>Save
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
