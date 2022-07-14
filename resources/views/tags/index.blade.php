@extends('layouts.AdminLTE.index')

@section('icon_page', 'Tag')

@section('title', 'Tag')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('tag.create') }}" class="link_menu_page">
            <i class="fa fa-plus"></i> Add
        </a>
    </li>
@endsection

@section('content')
    <form action="{{ route('tag.index') }}" method="get">
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
                                <th class="text-center">Tên</th>
                                <th class="text-center">Đường dẫn</th>
                                <th class="text-center">Ngày tạo</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (!empty($tags))
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td class="text-center">{{ $tag->name }}</td>
                                        <td class="text-center">{{ $tag->link }}</td>
                                        <td class="text-center">{{ $tag->created_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning  btn-xs" href="{{ route('tag.edit', $tag->id) }}"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger  btn-xs" href="{{ route('tag.destroy', $tag->id) }}" data-toggle="modal" data-target=""><i class="fa fa-trash" onclick="return confirm('Bạn có muốn xóa?')"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
