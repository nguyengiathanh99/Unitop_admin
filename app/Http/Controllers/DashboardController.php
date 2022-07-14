<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Member;
use App\Models\Review;
use App\Models\UserCourse;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    public function index()
    {
        $groupCourses = Course::query()->get();
        $courseUsers = UserCourse::query()->get();
        $userCourseIds = $groupCourses->pluck('id')->toArray();
        $countUser = Member::query()->count();
        $countCourse = $groupCourses->count();
        $countUserCourse = $courseUsers->whereIn('course_id', $userCourseIds)->count();
        $reviewCourses = Review::query()->get();
        $statistical = [
            'user' => $countUser,
            'course' => $countCourse,
            'userCourse' => $countUserCourse,
        ];
        $chartCourse['labels'] = [];
        $chartCourse['data']['courses'] = [];
        $chartCourse['data']['review'] = [];
        $chartCourse['backgroundColor']['courses'] = [];
        $chartCourse['backgroundColor']['review'] = [];
        $chartCourse['borderColor']['courses'] = [];
        $chartCourse['borderColor']['review'] = [];
        if ($groupCourses->isNotEmpty()) {
            foreach ($groupCourses as $course) {
                $count = $courseUsers->where('course_id', $course->id)->count();
                $countReview = $reviewCourses->where('course_id', $course->id)->count();
                $chartCourse['labels'][] = $course->name;
                $chartCourse['data']['courses'][] = $count ?? 0;
                $chartCourse['data']['review'][] = $countReview ?? 0;
                $chartCourse['backgroundColor']['courses'][] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.2)';
                $chartCourse['backgroundColor']['review'][] = 'rgba('.rand(100,255).', '.rand(100,255).', '.rand(100,255).', 0.2)';
                $chartCourse['borderColor']['courses'][] = 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')';
                $chartCourse['borderColor']['review'][] = 'rgb(' . rand(100, 255) . ',' . rand(100, 255) . ',' . rand(100, 255) . ')';
            }
        }
        return view('home', compact('statistical', 'chartCourse'));
    }
}
