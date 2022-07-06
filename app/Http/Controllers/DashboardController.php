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
        $this->middleware('auth');
    }

    public function index()
    {
        $countUser = Member::query()->count();
        $countCourse = Course::query()->count();
        $countUserCourse = UserCourse::query()->count();

        $statistical = [
            'user' => $countUser,
            'course' => $countCourse,
            'userCourse' => $countUserCourse,
        ];

        $groupCourses = Course::query()->leftJoin('user_courses', 'courses.id', '=', 'user_courses.course_id')
            ->select('name', DB::raw("count(*) as userTotal"))
            ->groupBy("name")
            ->get();
//        dd($groupCourses);

        $chartCourse['labels'] = [];
        $chartCourse['data'] = [];
        $chartCourse['backgroundColor'] = [];
        $chartCourse['borderColor'] = [];
        if ($groupCourses->isNotEmpty()) {
            foreach ($groupCourses as $course) {
                $randRgbaColor = 'rgba(201, 203, 207, 0.2)';
                $chartCourse['labels'][] = $course->name;
                $chartCourse['data'][] = $course->userTotal ?? 0;
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
