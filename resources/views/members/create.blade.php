@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add member')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('member.index') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Users
		</a>
	</li>

@endsection

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					 <form action="{{ route('member.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="active" value="1">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Name</label>
                                    <input type="text" name="name" class="form-control"  placeholder="Name" value="">
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nome">E-mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" value="">
                                    @if($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="nome">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    @if($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="nome">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="phone">
                                    @if($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <p><label for="file" style="cursor: pointer;">Image</label></p>
                                    <p><input type="file"  accept="image/*" name="member_image" id="file"  onchange="loadFile(event)"></p>
                                    <p><img id="output" width="200" /></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="dob">Date of birth</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="date" class="form-control" placeholder="dob" name="dob">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label for="nome">Address</label>
                                    <input type="text" name="address" class="form-control"  placeholder="Address" value="">
                                    @if($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
                                  </div>
                            </div>
                            <div class="col-lg-12">
                               <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Add</button>
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
                        return "Nenhum registro encontrado.";
                    }
                }
            });
        });

    </script>
    <script>
        $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
        });
    </script>

@endsection
