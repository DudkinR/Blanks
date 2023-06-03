<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.index');
    }
    public function about()
    {
        return view('guest.about');
    }
    public function contacts()
    {
        return view('guest.contacts');
    }
    public function faq()
    {
        return view('guest.faq');
    }
    public function doc()
    {
        return view('guest.doc');
    }
    public function instr()
    {
        return view('guest.instr');
    }
     public function service()
    {
        return view('guest.service');
    } 
    public function examples()
    {
        return view('guest.examples');
    }


    public function postprofile(Request $request)
    {
        
    }
    public function profile(Request $request)
    {
        return view('profile');
    }
    public function postsetting(Request $request)
    {
        
    }
    public function setting(Request $request)
    {
        return view('setting');
    }
}
