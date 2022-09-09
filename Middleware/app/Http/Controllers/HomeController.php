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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
//        echo $request->session()->put(['ashma'=>'php coder']);
//        session(['edwin'=>'php teacher']);
//        return session('edwin');

//        flush = delete all sessions
//        foget(key) = forget one session
//        return $request->session()->flush();

        $request->session()->flash('message', "Post has been created");
        return $request->session()->get('message');

//        return view('home');
    }
}
