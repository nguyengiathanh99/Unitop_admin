<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('keyword');
        $reviews = Review::query()
            ->with(['course', 'user']);

        if (!empty($search)) {
            $reviews = $reviews->where('comment', '%' . $search . '%');
        }

        $reviews = $reviews->orderBy('id', 'desc')->paginate(10);

        return view('reviews.index', compact('reviews'));
    }

    public function changeStatus($id, Request $request): \Illuminate\Http\JsonResponse
    {
        $status = $request->boolean('status');
        $review = Review::query()->where('id', $id)->first();
        if (empty($review)) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy thông tin dữ liệu'
            ]);
        }

        $review = tap($review)->update(['status' => $status]);
        if (empty($review)) {
            return response()->json([
                'success' => false,
                'message' => 'Cập nhật dữ liệu thất bại'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Thay đổi trạng thái thành công'
        ]);
    }
}
