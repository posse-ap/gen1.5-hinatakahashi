<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudyHoursPost;
use App\Models\LanguagePost;
use App\Models\ContentPost;
use App\Models\Language;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use Abraham\TwitterOAuth\TwitterOAuth;

class HomeController extends Controller
{

    public function news() {
        return view('news');
    }
    public function news_detail(Request $request) {
        $id = $request -> id;
        return view('news_detail', ['id' => $id]);
    }

    protected function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
    
    public function index(Request $request){
        $users = User::all();
        $user = Auth::user();
        $languages = Language::all();
        $contents = Content::all();
        $study_hours_posts = $user->get_study_hours_posts_table;
        $header_week = 1;
        $today_study_hour = 0;
        $month_study_hour = 0;
        $total_study_hour = 0;
        $date = 0;
        $columntime = '';


        //header_week
        $start_date = $user->created_at;
        $diff = $start_date->diff(date("Y-m-d H:i:s"));
        if($diff->d > 0){
            $header_week = ceil($diff->d / 7);
        }

        foreach($study_hours_posts as $study_hours_post){
            //Total
            $total_study_hour += $study_hours_post->total_hour;

            //Month
            if(substr($study_hours_post->study_date, 0, 7) == date('Y-m')){
                $month_study_hour += $study_hours_post->total_hour;
            }

            //Today
            if($study_hours_post->study_date == date('Y-m-d')){
                $today_study_hour += $study_hours_post->total_hour;
            }

            //学習時間
            if($date == substr($study_hours_post->study_date, 8, 10)){
                $total_hour += $study_hours_post->total_hour;
            }else{
                $date = substr($study_hours_post->study_date, 8, 10);
                $total_hour = $study_hours_post->total_hour;
            }

            $columntime .= "[" . $date . ", " . $total_hour;

            if($date % 2 == 0){
                $columntime .= ", '#3ccfff'],";
            }else{
                $columntime .= ", '#0f71bc'],";
            }
        }

        return view('home', [
            'users' => $users,
            'languages' => $languages,
            'contents' => $contents,
            'header_week' => $header_week,
            'today_study_hour' => $today_study_hour,
            'month_study_hour' => $month_study_hour,
            'total_study_hour' => $total_study_hour,
            'columntime' => $columntime,
        ]);
    }

    public function post(Request $request){
        // return($request->languages);


        $study_date = $request->date;
        $study_date = str_replace('年', '-', $study_date);
        $study_date = str_replace('月', '-', $study_date);
        $study_date = str_replace('日', '', $study_date);

        $study_hours_post = StudyHoursPost::create([
            'user_id' => Auth::id(),
            'total_hour' => $request->hour,
            'study_date' => $study_date,
        ]);

        $languages = $request->languages;
        $contents = $request->contents;

        foreach($languages as $language){
            $language_post = LanguagePost::create([
                'study_hours_post_id' => $study_hours_post->id,
                'language_id' => $language,
                'hour' => $study_hours_post->total_hour / count($languages),
            ]);
        }

        foreach($contents as $content){
            $content_post = ContentPost::create([
                'study_hours_post_id' => $study_hours_post->id,
                'content_id' => $content,
                'hour' => $study_hours_post->total_hour / count($contents),
            ]);
        }

        $twitter_post = $request->twitter;
        $twitter_text = $request->twittertext;

        if(isset($twitter_post) && isset($twitter_text)){
            $twitter = new TwitterOAuth(
                env('TWITTER_CLIENT_ID'),
                env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
                env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET')
            );

            $twitter->post('statuses/update', [
                'status' => $twitter_text . PHP_EOL . '#twitteroauth'
            ]);
        }
    }


    //管理画面よう
    public function admin(Request $request){
        $users = User::all();
        $user = Auth::user();
        $languages = Language::all();
        $contents = Content::all();
        $study_hours_posts = $user->get_study_hours_posts_table;
        $header_week = 1;
        $today_study_hour = 0;
        $month_study_hour = 0;
        $total_study_hour = 0;
        $date = 0;
        $columntime = '';


        //header_week
        $start_date = $user->created_at;
        $diff = $start_date->diff(date("Y-m-d H:i:s"));
        if($diff->d > 0){
            $header_week = ceil($diff->d / 7);
        }

        foreach($study_hours_posts as $study_hours_post){
            //Total
            $total_study_hour += $study_hours_post->total_hour;

            //Month
            if(substr($study_hours_post->study_date, 0, 7) == date('Y-m')){
                $month_study_hour += $study_hours_post->total_hour;
            }

            //Today
            if($study_hours_post->study_date == date('Y-m-d')){
                $today_study_hour += $study_hours_post->total_hour;
            }

            //学習時間
            if($date == substr($study_hours_post->study_date, 8, 10)){
                $total_hour += $study_hours_post->total_hour;
            }else{
                $date = substr($study_hours_post->study_date, 8, 10);
                $total_hour = $study_hours_post->total_hour;
            }

            $columntime .= "[" . $date . ", " . $total_hour;

            if($date % 2 == 0){
                $columntime .= ", '#3ccfff'],";
            }else{
                $columntime .= ", '#0f71bc'],";
            }
        }

        return view('admin', [
            'users' => $users,
            'languages' => $languages,
            'contents' => $contents,
            'header_week' => $header_week,
            'today_study_hour' => $today_study_hour,
            'month_study_hour' => $month_study_hour,
            'total_study_hour' => $total_study_hour,
            'columntime' => $columntime,
        ]);
    }



    public function admin_user_add(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->family_name = $request->family_name;
        $user->first_name_hira = $request->first_name_hira;
        $user->family_name_hira = $request->family_name_hira;
        $user->email = $request->email;
        $user->password= $request->password;
        $user->generation = $request->generation;
        $user->role = $request->role;
        $user->save();
        return redirect('admin');
    }




    public function admin_content_edit($id) {
        $content = Content::find($id);
        return view('content_edit', ['content' => $content]);
    }

    public function admin_content_update(Request $request)
    {
        $content = Content::find($request->id);
        $content->content = $request-> content;
        $content->save();
        return redirect('admin');
    }
    public function admin_content_delete($id) {
        $content = Content::find($id);
        $content->delete();
        return redirect('admin');
    }
    public function admin_content_add(Request $request)
    {
        $content = new Content();
        // $content->id= $request->id;
        $content->content = $request->content;
        $content->color_code = $request->color_code;
        $content->save();
        return redirect('admin');
    }

    public function admin_language_edit($id) {
        $language = Language::find($id);
        return view('language_edit', ['language' => $language]);
    }

    public function admin_language_update(Request $request)
    {
        $language = Language::find($request->id);
        $language->language = $request-> language;
        $language->save();
        return redirect('admin');
    }
    public function admin_language_delete($id) {
        $language = Language::find($id);
        $language->delete();
        return redirect('admin');
    }
    public function admin_language_add(Request $request)
    {
        $language = new Language();
        // $language->id= $request->id;
        $language->language = $request->language;
        $language->color_code = $request->color_code;
        $language->save();
        return redirect('admin');
    }
}
