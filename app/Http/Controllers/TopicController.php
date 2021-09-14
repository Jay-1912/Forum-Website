<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Topic;
use App\Models\User;
use App\Models\TopicReplies;
use App\Notifications\NewReply;
use App\Models\ReplyLike;
use App\Models\ReplyDislike;
use Telegram;
use App\Notifications\NewTopic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $forums = Forum::latest()->get();
        $forum =Forum::find($id);

        return view('client-side.new-topic',\compact('forums','forum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notify = 0;
        if($request->notify && $request->notify=="on")
        {
            $notify = 1;
        }

        $topic = new Topic;
        $topic->title = $request->title;
        $topic->desc = $request->desc;
        $topic->forum_id = $request->forum_id;
        $topic->user_id = auth()->id();
        $topic->notify = $notify;
        $image=null;
        $topic->save();

        $user = auth()->user();
        $user->increment('rank', 10);

        $latestTopic = Topic::latest()->first();
        $user = User::find($topic->user_id);

        $admins = User::where('is_admin', 1)->get();
            foreach($admins as $admin)
            {
                $admin->notify(new NewTopic($latestTopic));
            }


        Telegram::sendMessage([
            'chat_id'=>env('TELEGRAM_CHAT_ID','-586596833'),
            'parse_mode'=>'HTML',
            'text'=>'<b>'.$user->name."</b> started topic ".$topic->title."."
        ]);

        toastr()->success('Topic saved successfully!');


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = TopicReplies::find($id);

        $reply->delete();

        toastr()->success('Reply deleted successfully!');

        return back();
    }

    /**
     * Store a reply to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function reply(Request $request,$id)
    {
        $treply = new TopicReplies;

        $treply->reply=$request->reply;
        $treply->topic_id=$id;
        $treply->user_id=auth()->id();
        $topic = Topic::find($id);
        $forumId = $topic->forum->id;
        $url = \URL::to('/forum/overview/'.$forumId);
        $treply->save();

        $user = auth()->user();
        $user->increment('rank', 10);

        $latestReply = TopicReplies::latest()->first();

        $admins = User::where('is_admin', 1)->get();
            foreach($admins as $admin)
            {
                $admin->notify(new NewReply($latestReply));
            }

        Telegram::sendMessage([
            'chat_id'=>env('TELEGRAM_CHAT_ID','-586596833'),
            'parse_mode'=>'HTML',
            'text'=>'<b>'.auth()->user()->name."</b>"."Replied to the topic "."<b>".$topic->title." : "."</b>"."\n"."<a href='".$url."'>Read it Here</a>"
        ]);

        toastr()->success('You replied successfully!');

        return back();
    }

    public function updates()
    {
        $updates = Telegram::getUpdates();
        dd($updates);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $topic = Topic::find($id);
        $topic->delete();
        toastr()->success('Topic deleted successfully!');

        return back();
    }

    public function like($id)
    {
        $reply = TopicReplies::find($id);
        $user_id = $reply->user_id;

        $liked = ReplyLike::where('user_id', '=', auth()->id())->where('reply_id', '=', $id)->get();

        if(count($liked)>0)
        {
            toastr()->error('You already liked the reply');
            return back();
        }

        $reply_like = new ReplyLike;
        $reply_like->user_id = auth()->id();
        $reply_like->reply_id = $id;
        $reply_like->save();

        $owner = User::find($user_id);
        $reply->increment('liked',1);
        $owner->increment('rank',10);
        return back();
    }

    public function dislike($id)
    {
        $reply = TopicReplies::find($id);
        $user_id = $reply->user_id;

        $disliked = ReplyDislike::where('user_id', '=', auth()->id())->where('reply_id', '=', $id)->get();

        if(count($disliked)>0)
        {
            toastr()->error('You already disliked the reply');
            return back();
        }

        $reply_dislike = new ReplyLike;
        $reply_dislike->user_id = auth()->id();
        $reply_dislike->reply_id = $id;
        $reply_dislike->save();

        $owner = User::find($user_id);
        $reply->increment('disliked',1);
        $owner->decrement('rank',5);
        return back();
    }
}
