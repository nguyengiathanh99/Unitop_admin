@extends('layouts.AdminLTE.index')

@section('icon_page', 'Document')

@section('title', 'Document')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('document.create') }}" class="link_menu_page">
            <i class="fa fa-plus"></i> Add
        </a>
    </li>
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Lesson_id</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th class="text-center">File Path</th>
                                    <th class="text-center">Created</th>
                                    <th class="text-center">Actions</th>
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
                                            <a class="btn btn-danger  btn-xs" href="{{ route('document.destroy', $doc->id) }}" data-toggle="modal" data-target=""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
{{--                    {{ $course->links() }}--}}
                </div>
            </div>
        </div>
    </div>

@endsection

