<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;
use App\User;
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
    public function index()
    {
        $user = DB::table('users')->get();
        return view('home')->with('data',$user);
    }
    public function data(){
        return Datatables::of(User::query())->make(true);
    }

    
}
