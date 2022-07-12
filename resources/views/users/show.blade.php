@extends('layouts.AdminLTE.index')

@section('icon_page', 'eye')

@section('title', 'Xem quản trị')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('user') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Quản trị
		</a>
	</li>

@endsection

@section('content')
    @if ($user->id != 1)
        <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">
    					<div class="col-lg-3 text-center">
                            <br>
                            @if(file_exists($user->avatar))
                              <img src="{{ asset($user->avatar) }}" class="profile-user-img img-responsive img-circle">
                            @else
                              <img src="{{ asset('public/img/config/nopic.png') }}" class="profile-user-img img-responsive img-circle">
                            @endif
                            <h3 class="profile-username text-center">
                                {{ $user->name }}
                            </h3>
                            @if($user->active == true)
                                <span class="label label-success">Hoạt động</span>
                            @else
                                <span class="label label-danger">Không hoạt động</span>
                            @endif
                        </div>
                        <div class="col-lg-9">
                            <div class="attachment">
                                <h4><b>E-mail: </b></h4>
                                <span>{{ $user->email }}</span>
                                <h4><b>Nhóm quyền</b></h4>
                                @foreach($roles as $role)
                                    @if(in_array($role->id, $roles_ids))
                                        <span class="label label-primary">{{ $role->name }}</span>
                                    @endif
                                @endforeach
                                <br><br>
                                <p class="help-block"><i class="fa fa-clock-o"></i> Đã khởi tạo: {{$user->created_at->format('d/m/Y H:i') }}</p>
                                <p class="help-block"><i class="fa fa-refresh"></i> Cập nhật cuối cùng: {{$user->updated_at->format('d/m/Y H:i') }}</p>
                                <br>
                                <div class="pull-right">
                                    <a href="{{ route('user.edit.password', $user->id) }}" title="Change Password {{ $user->name }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-key"></i> Đổi mật khẩu</button></a>
                                    <a href="{{ route('user.edit', $user->id) }}" title="Edit {{ $user->name }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Chỉnh sửa</button></a>
                                </div>
                            </div>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    @endif
@endsection
