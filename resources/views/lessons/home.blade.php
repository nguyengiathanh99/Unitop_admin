@extends('layouts.AdminLTE.index')

@section('icon_page', 'Bài học')

@section('title', 'Bài học')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('lesson.create') }}" class="link_menu_page">
            <i class="fa fa-plus"></i> Thêm mới
        </a>
    </li>
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('lesson.home') }}" method="get">
        <div class="search">
            <input type="text" value="{{ $request->keyword }}" name="keyword"  placeholder="Tìm kiếm..." class="input-search">
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
                                <th>Course_id</th>
                                <th>Tên bài học</th>
                                <th class="text-center">Hình ảnh</th>
                                <th>Thời gian</th>
                                <th class="text-center">Ghi chú</th>
                                <th class="text-center">Ngày tạo</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (!empty($lessons))
                                @foreach ($lessons as $lesson)
                                    <tr>
                                        <td>{{ $lesson->course_id }}</td>
                                        <td>{{ $lesson->name }}</td>
                                        <td class="text-center"><img src="{{ asset($lesson->image) }}" alt="" height="80px" ></td>
                                        <td>{{ $lesson->time }}</td>
                                        <td class="text-center">{{ $lesson->description }}</td>
                                        <td class="text-center">{{ $lesson->created_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning  btn-xs" href="{{ route('lesson.edit', $lesson->id) }}"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger  btn-xs" href="{{ route('lesson.destroy', $lesson->id) }}" data-toggle="modal" data-target="" onclick="return confirm('Bạn có muốn xóa?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    {{ $lessons->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

