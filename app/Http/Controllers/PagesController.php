<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $title = 'Welcome to my Laravel Project';
        return view('pages.index',compact('title')) ; 
    }

    public function about(){
        $title = 'This is my about pages';
        return view('pages.about')->with('title',$title);
    }

    public function services(){
        $data = array(
            'title'=> 'Services',
            'services'=>['Web design','Programming','UX/UI']
        );
        return view('pages.services')->with($data);
    }
}
