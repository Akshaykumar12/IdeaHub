<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Idea;
use Auth;

class TopicsController extends Controller
{
    public function topic($id)
    {
       $topic = Topic::where('id',$id)->get()->first();
      // $ideas = Idea::where('topic_id',$id)->orderBy('created_at','desc')->get();
       $ideas = Idea::join('users', 'ideas.user_id', '=', 'users.id')
                ->select('ideas.*','users.id AS user_id','users.name AS author')
                ->where('topic_id',$id)
                ->orderBy('created_at','desc')
                ->get();
       //dd($topic);
      $user = Auth::user()->id;
        return view('topic',[
          'topic'=>$topic,
          'ideas'=>$ideas,
          'user'=>$user
        ]);
    }
    public function ProcessIdea(Request $request, $id){
      //dd($request);
      $idea = new Idea;
      $idea->user_id = Auth::user()->id;
      $idea->topic_id = $id;
      $idea->body = $request->body;
      $idea->save();
      return redirect(route('home'));
    }
    public function ProcessDeleteTopic($id){
     //dd($request);
     $topic = Topic::where('id',$id)->first();
     $topic->delete();
       
    return redirect(route('home'));
     
   }
}
