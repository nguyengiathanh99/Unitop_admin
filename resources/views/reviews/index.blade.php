@extends('layouts.AdminLTE.index')

@section('icon_page', 'Review')

@section('title', 'Nhận xét')

@section('layout_css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection

@section('content')
    <form action="{{ route('review.index') }}" method="get">
        <div class="search">
            <input type="text" value="" name="keyword"  placeholder="Tìm kiếm..." class="input-search">
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
                                <th class="text-center">Học viên</th>
                                <th class="text-center">Khoá học</th>
                                <th class="text-center">Bình luận</th>
                                <th class="text-center">Đánh giá</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Created</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (!empty($reviews))
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td class="text-center">{{ !empty($review->user) ? $review->user->name : '' }}</td>
                                        <td class="text-center">{{ !empty($review->course) ? $review->course->name : '' }}</td>
                                        <td class="text-center">{{ $review->comment }}</td>
                                        <td class="text-center">{{ $review->vote }}</td>
                                        <td class="text-center">
                                            @if($review->status == true)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $review->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-center">
                                            <input class="toggle-status-class" type="checkbox" data-id="{{$review->id}}"
                                                   {{ $review->status ? 'checked' : '' }} data-toggle="toggle"
                                                   data-size="xs" onclick="abc(event)">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('layout_js')
    <script type="text/javascript">
        $(function () {
            $('.toggle-status-class').change(function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var reviewId = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: `/reviews/${reviewId}/status`,
                    data: {'status': status},
                    success: function (data) {
                        window.onload(undefined)
                    },
                    error: function () {
                        window.onload(undefined)
                    }
                });
            })
        })
    </script>
@endsection
