@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Khởi tạo nhãn')

@section('menu_pagina')
    <li role="presentation">
        <a href="{{ route('tag.index') }}" class="link_menu_page">
            <i class="fa fa-user"></i> Nhãn
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
                            <tbody>
                                <form action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="name">Tên</label>
                                            <input type="text" class="form-control" id="name" placeholder="Nhập tên..." name="tag_name">
                                        </div>
                                        <div class="form-group">
                                            <label>Đường dẫn</label>
                                            <input type="text" class="form-control" id="name" placeholder="Nhập đường dẫn..." name="tag_link">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Khởi tạo</button>
                                    </div>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                </div>
            </div>
        </div>
    </div>
@endsection
