<?php

namespace App\Http\Controllers;
use App\Study;
use App\Language;
use App\Content;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    public function index() {
        $studies = Study::all();
        
        // 日付関連
		$dt_from = Carbon::now()->startOfMonth();
		$dt_to = Carbon::now()->endOfMonth();
		$today = Carbon::now()->format('Y-m-d');
		$thisMonth = Carbon::now()->format('Y-m');
        // $lastdate = Carbon::now()->endOfMonth()->format('d');

        
        $studies = Study::all();

        // 今日の学習時間
        $today_study_hour = Study::where('study_date', '=', $today)->sum('study_hour');
        // 今月の学習時間
        $month_study_hour = Study::whereBetween('study_date', [$dt_from, $dt_to])->sum('study_hour');
        // 合計の学習時間
        $total_study_hour = Study::all()->sum('study_hour');



        return view('index',compact('studies','today_study_hour','month_study_hour','total_study_hour'));
    }
}
