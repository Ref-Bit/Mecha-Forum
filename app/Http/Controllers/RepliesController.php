<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RepliesController extends Controller
{
    //
    public function like($id){
        Like::create([
            'reply_id'=>$id,
            'user_id'=>Auth::id(),
        ]);

        Session::flash('success', 'You liked the reply');

        return redirect()->back();
    }

    public function unlike($id){
       $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

        $like->delete();

        Session::flash('success', 'You unliked the reply');

        return redirect()->back();
    }

    public function best_answer($id){
        $reply = Reply::find($id);
        $reply->best_answer = 1;
        $reply->save();

        $reply->user->points += 100;
        $reply->user->save();

        Session::flash('success', 'This reply has been marked as the best answer!');

        return redirect()->back();
    }

    public function edit($id){
        return view('replies.edit', ['reply'=>Reply::find($id)]);
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'body'=>'required',
        ]);

        $reply = Reply::find($id);
        $reply->body = $request->body;
        $reply->save();

        Session::flash('success', 'Reply Updated!');

        return redirect()->route('discussions', ['slug'=>$reply->discussion->slug]);

    }
}
