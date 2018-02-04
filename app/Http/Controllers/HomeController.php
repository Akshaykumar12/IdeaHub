<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$topics = Topic::orderBy('created_at','desc')->get();
      //$comments = Comment::orderBy('created_at','desc')->get();
        return view('home',[
          'topics'=>$topics
        ]);*/
      $topics = Topic::join('users', 'topics.user_id', '=', 'users.id')
                ->select('topics.*','users.id AS user_id','users.name AS author')
                ->get();
        return view('home',[
          'topics'=>$topics
        ]);
        
    }
   
  public function newTopic()
  {
    return view('new-topic');
  }
   public function ProcessNewTopic(Request $request){
     //dd($request);
     $topic = new Topic; 
     
  
    $topic->user_id = Auth::user()->id;
    $topic->name = $request->name;
    $topic->description = $request->description;
    $topic->save();
    return redirect(route('home'));
     
   }
}