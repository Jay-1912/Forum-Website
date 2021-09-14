<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Forum;
use App\Models\setting;

class DashboardController extends Controller
{
    public function home()
    {
        $categories = Category::latest()->paginate(15);
        $topics = Topic::latest()->paginate(15);
        $forum = Forum::latest()->paginate(15);
        $users = User::latest()->paginate(15);
        return view('admin.pages.home',\compact('categories','topics','forum','users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $latest_user_post = Topic::where('user_id', auth()->id())->latest()->first();
        $latest = Topic::latest()->first();
        return view('admin.pages.user',\compact('user','latest_user_post','latest'));
    }

    public function profile($id)
    {
        $user = auth()->user();
        $latest_user_post = Topic::where('user_id', auth()->id())->latest()->first();
        $latest = Topic::latest()->first();
        return view('admin.pages.user',\compact('user','latest_user_post','latest'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.pages.users',\compact('users'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        toastr()->success('User deleted successfully!');

        return back();
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications()->where('read_at', null)->get();

        return view('admin.pages.notifications',\compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->where('id',$id)->get();
        $notification->markAsRead();

        toastr()->info('Notification marked as read');

        return back();
    }

    public function deleteNotification($id)
    {
        $notification = auth()->user()->notifications()->where('id',$id)->get();
        $notification->delete();
        toastr()->success('Notification deleted successfully!');
        return back();
    }

    public function settingForm()
    {
        return view('admin.pages.setting');
    }

    public function newSetting(Request $request)
    {
        $set = new setting;
        $set->forum_name = $request->forum_name;
        $set->save();
        toastr()->success('Setting saved successfully!');
        return view('admin.pages.setting');
    }

}
