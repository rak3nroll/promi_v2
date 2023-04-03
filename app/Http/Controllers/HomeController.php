<?php

namespace App\Http\Controllers;

use App\Models\Promisorris;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (view()->exists('auth.login'))
    {
        return view('auth.login')->with('title','ORMECO-Promisorry Potal | Login');  
    }else{
        return abort(404);
    }
    }

    public function userHome(){
        $data = Promisorris::all();

        $is_approve = DB::table('promisorris')
        ->where('is_posted','<>','0')
        ->count();

        $is_pending = DB::table('promisorris')
        ->where('is_posted','=','0')
        ->count();

        return view('home',['promisorris'=>$data,'is_approve'=>$is_approve,'is_pending'=>$is_pending])-> with('title','ORMECO-Promisorry Potal | Home');
    }

    public function approverHome(){
        $data = Promisorris::all();

        $is_approve = DB::table('promisorris')
        ->where('is_approve','<>','0')
        ->count();

        $is_pending = DB::table('promisorris')
        ->where('is_approve','=','0')
        ->count();

        return view('home',['promisorris'=>$data,'is_approve'=>$is_approve,'is_pending'=>$is_pending])-> with('title','ORMECO-Promisorry Potal | Home');
    }
    public function verifierHome(){
        $data = Promisorris::all();

        $is_approve = DB::table('promisorris')
        ->where('is_approve','<>','0')
        ->count();

        $is_pending = DB::table('promisorris')
        ->where('is_approve','=','0')
        ->count();

        return view('home',['promisorris'=>$data,'is_approve'=>$is_approve,'is_pending'=>$is_pending])-> with('title','ORMECO-Promisorry Potal | Home');
    }
}

