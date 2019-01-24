<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Notifications\NewReplyAdded;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class DiscussionsController extends Controller
{
    //
    public function create(){
        return view('discuss');
    }

    public function store(Request $request){
        $this->validate($request,[
            'channel_id'=>'required',
            'body'=>'required',
            'title'=>'required',
        ]);

        $discussion = Discussion::create([
            'title' => $request->title,
            'body' => $request->body,
            'channel_id' => $request->channel_id,
            'user_id' => Auth::id(),
            'slug' => str_slug($request->title),
        ]);

        Session::flash('success', 'Discussion Created Successfully!');


        return redirect()->route('discussions', ['slug'=>$discussion->slug]);
    }

    public function show($slug){
        $discussion = Discussion::where('slug', $slug)->first();
        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussions.show',compact('discussion', 'best_answer'));
    }

    public function reply($id){
        $discussion = Discussion::find($id);
        $reply = Reply::create([
            'user_id'=>Auth::id(),
            'discussion_id'=>$id,
            'body'=>\request()->reply,
        ]);

        $reply->user->points += 25;
        $reply->user->save();

        $watchers = array();
        foreach ($discussion->watchers as $watcher):
            array_push($watchers, User::find($watcher->user_id));
        endforeach;

        Notification::send($watchers, new NewReplyAdded($discussion));

        Session::flash('success', 'Replied to discussion');

        return redirect()->back();

    }

    public function edit($slug){
        return view('discussions.edit', ['discussion'=>Discussion::where('slug', $slug)->first()]);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'body' => 'required',
        ]);

        $discussion = Discussion::find($id);
        $discussion->body = $request->body;
        $discussion->save();

        Session::flash('success', 'Discussion Updated!');

        return redirect()->route('discussions', ['slug'=>$discussion->slug]);

    }
}
