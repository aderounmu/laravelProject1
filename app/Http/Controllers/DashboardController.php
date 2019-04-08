<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Log;
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

    public function sociteyIndex(Request $request)
    {
        $age = $request->age;
        Log::info('Log age' .  $age);
        return view('posts.test',compact('age'));
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id  ;
        $user = User::find($user_id);
        return view('dashboard')->with('posts',$user->post);
    }
}
