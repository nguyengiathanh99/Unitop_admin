@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Thêm học viên')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('member.index') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Học viên
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
                                    <label for="nome">Tên học viên</label>
                                    <input type="text" name="name" class="form-control"  placeholder="Tên học viên" value="{{ old('name') }}">
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
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="nome">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="">
                                    @if($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="nome">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{ old('phone') }}">
                                    @if($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="dob">Ngày sinh</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="date" id="birthday" placeholder="dob" class="form-control" name="dob">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label for="nome">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control"  placeholder="Địa chỉ" value="">
                                    @if($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="desc">Ghi chú</label>
                                    <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
                                  </div>
                            </div>
                            <div class="col-lg-12">
                               <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Khởi tạo</button>
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
