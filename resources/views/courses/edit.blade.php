@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Edit Course')

@section('menu_pagina')

    <li role="presentation">
        <a href="{{ route('course.index') }}" class="link_menu_page">
            <i class="fa fa-user"></i> Courses
        </a>
    </li>

@endsection

@section('content')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('course.update',$course->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="nome">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required="" autofocus value="{{$course->name}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                        <label for="myFile" style="cursor: pointer">Image</label>
                                        <div class="course-img">
                                            <img src="{{ asset($course->image) }}" alt="{{ $course->image }}" class="img-thumbnail" id="image">
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
                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label for="course_desc">Description</label>
                                        <textarea class="form-control" id="course_desc" rows="3" name="description">{{ $course->description }}</textarea>
                                        @if($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-save"></i>Save</button>
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
      $(function(){
        $('.select2').select2({
          "language": {
            "noResults": function(){
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