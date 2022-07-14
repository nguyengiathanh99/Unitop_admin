@extends('layouts.AdminLTE.index')

@section('icon_page', 'Tài liệu')

@section('title', 'Tài liệu')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('document.create') }}" class="link_menu_page">
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
    <form action="{{ route('document.index') }}" method="get">
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
                                    <th class="text-center">Lesson_id</th>
                                    <th class="text-center">Tên tài liệu</th>
                                    <th class="text-center">Tiêu đề</th>
                                    <th class="text-center">Hình ảnh</th>
                                    <th class="text-center">Đường dẫn</th>
                                    <th class="text-center">Ngày tạo</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($docs))
                                @foreach ($docs as $doc)
                                    <tr>
                                        <td>{{ $doc->lesson_id }}</td>
                                        <td>{{ $doc->name }}</td>
                                        <td>{{ $doc->title }}</td>
                                        <td class="text-center">{{ $doc->image }}</td>
                                        <td class="text-center">{{ $doc->file_path }}</td>
                                        <td class="text-center">{{ $doc->created_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning  btn-xs" href="{{ route('document.edit', $doc->id) }}"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger  btn-xs" href="{{ route('document.destroy', $doc->id) }}" data-toggle="modal" data-target="" onclick="return confirm('Bạn có muốn xóa?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    {{ $docs->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

