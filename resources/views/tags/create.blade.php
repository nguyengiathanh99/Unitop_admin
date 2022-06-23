@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add Tag')

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
                    <div class="table-responsive">
                        <table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Link</th>
                                <th class="text-center">Created</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="tag_name">
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter link" name="tag_link">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
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
`
