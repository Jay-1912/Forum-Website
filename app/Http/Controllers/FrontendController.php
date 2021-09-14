<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Forum;
use App\Models\Topic;
use App\Models\User;

class FrontendController extends Controller
{
    public function index(){
        $user = new User;
        $users_online = $user->allOnline();
        $categories = Category::latest()->get();
        $forums = Forum::latest()->get();
        $forumsCount = count(Forum::all());
        $topicsCount = count(Topic::all());
        $userCount = count(User::all());
        $fewUsers = $user->take(5)->get();
        $newest = User::latest()->first();
        return view('welcome', \compact('categories','fewUsers','forums','forumsCount','topicsCount','newest','userCount','users_online'));
    }

    public function categoryOverview($id){
        $category = Category::find($id);

        $user = new User;
        $users_online = $user->allOnline();
        $categories = Category::latest()->get();
        $forums = Forum::latest()->get();
        $forumsCount = count(Forum::all());
        $topicsCount = count(Topic::all());
        $userCount = count(User::all());
        $newest = User::latest()->first();

        return view('client-side.category-overview',\compact('category','categories','forums','forumsCount','topicsCount','newest','userCount','users_online'));
    }

    public function forumOverview($id){
        $forum = Forum::find($id);

        return view('client-side.forum-overview',\compact('forum'));
    }

    public function topicOverview($id){
        $topic = Topic::find($id);

        if($topic)
        {
            $topic->increment('views', 1);
        }
        return view('client-side.topic-overview',\compact('topic'));
    }

    public function profile($id)
    {
        $user = User::find($id);
        $latest_user_post = Topic::where('user_id', auth()->id())->latest()->first();
        $latest = Topic::latest()->first();

        return view('client-side.user_profile', \compact('user','latest_user_post','latest'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);

        return view('client-side.users', \compact('users'));
    }
}
