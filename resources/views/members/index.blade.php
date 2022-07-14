@extends('layouts.AdminLTE.index')

@section('icon_page', 'member')

@section('title', 'Học viên')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('member.create') }}" class="link_menu_page">
            <i class="fa fa-plus"></i> Thêm
        </a>
    </li>
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('member.index') }}" method="get">
        <div class="search">
            <input type="text" value="{{ $request->keyword }}" name="keyword" placeholder="Tìm kiếm...." class="input-search">
            <button class="btn-search">Tìm kiếm</button>
        </div>
    </form>
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">Tên</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Số điện thoại</th>
                                <th class="text-center">Ngày sinh</th>
                                <th class="text-center">Ghi chú</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Ngày tạo</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (!empty($members))
                                @foreach ($members as $member)
                                    <tr>
                                        <td class="text-center">{{ $member->name }}</td>
                                        <td class="text-center">{{ $member->email }}</td>
                                        <td class="text-center">{{ $member->phone }}</td>
                                        <td class="text-center">{{ $member->date_of_birth }}</td>
                                        <td class="text-center">{{ $member->description }}</td>
                                        <td class="text-center">{{ $member->address }}</td>
                                        <td class="text-center">{{ $member->created_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-danger  btn-xs" href="{{ route('member.destroy', $member->id) }}" data-toggle="modal" data-target="" onclick="return confirm('Bạn có muốn xóa?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    {{ $members->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

