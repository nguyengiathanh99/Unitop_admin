@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Edit Tag')

@section('menu_pagina')

    <li role="presentation">
        <a href="{{ route('tag.index') }}" class="link_menu_page">
            <i class="fa fa-user"></i> Tag
        </a>
    </li>

@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('tag.update',$tag->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Name</label>
                                    <input type="text" name="name" class="form-control" maxlength="30" minlength="4"
                                           placeholder="Name" required="" autofocus value="{{$tag->name}}">
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" id="link" class="form-control" placeholder="Link"
                                           required="" autofocus value="{{$tag->link}}">
                                    @if($errors->has('link'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('link') }}</strong>
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