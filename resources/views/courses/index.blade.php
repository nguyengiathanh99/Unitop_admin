@extends('layouts.AdminLTE.index')

@section('icon_page', 'course')

@section('title', 'Course')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('course.create') }}" class="link_menu_page">
            <i class="fa fa-plus"></i> Add
        </a>
    </li>
@endsection

@section('content')
    <form action="{{ route('course.index') }}" method="get">
        <div class="search">
            <input type="text" value="{{ $request->keyword }}" name="keyword"  placeholder="Tìm kiếm..." class="input-search">
            <button class="">Tìm kiếm</button>
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
                                <th class="text-center">Name</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Created</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (!empty($courses))
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td class="text-center">{{ $course->name }}</td>
                                            <td class="text-center"><img src="{{ $course->image }}" alt="" height="80px" ></td>
                                            <td class="text-center">{{ $course->description }}</td>
                                            <td class="text-center">{{ $course->created_at }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-warning  btn-xs" href="{{ route('course.edit', $course->id) }}"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger  btn-xs" href="{{ route('course.destroy', $course->id) }}" data-toggle="modal" data-target=""><i class="fa fa-trash"></i></a>
                                           </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

