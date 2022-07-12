<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Member;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;

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

        $statistical = [
            'user' => $countUser,
            'course' => $countCourse,
            'userCourse' => $countUserCourse,
        ];

        $chartCourse['labels'] = [];
        $chartCourse['data'] = [];
        $chartCourse['backgroundColor'] = [];
        $chartCourse['borderColor'] = [];
        if ($groupCourses->isNotEmpty()) {
            foreach ($groupCourses as $course) {
                $count = $courseUsers->where('course_id', $course->id)->count();
                $randRgbaColor = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.2)';
                $chartCourse['labels'][] = $course->name;
                $chartCourse['data'][] = $count ?? 0;
                $chartCourse['backgroundColor'][] = $randRgbaColor;
                $chartCourse['borderColor'][] = $this->bm_random_rgb();
            }
        }

        return view('home', compact('statistical', 'chartCourse'));
    }

    function bm_random_rgb()
    {
        return 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')';
    }
}
