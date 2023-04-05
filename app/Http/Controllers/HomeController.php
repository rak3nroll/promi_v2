<?php

namespace App\Http\Controllers;

use App\Models\Promisorris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        if (view()->exists('auth.login')) {
            return view('auth.login')->with('title', 'ORMECO-Promisorry Potal | Login');
        } else {
            return abort(404);
        }
    }

    public function userHome()
    {
        $data = Promisorris::all();

        $is_approve = DB::table('promisorris')
            ->where('is_approve', '<>', '0')
            ->count();

        $is_pending = DB::table('promisorris')
            ->where('is_approve', '=', '0')
            ->count();

        return view('home', ['promisorris' => $data, 'is_approve' => $is_approve, 'is_pending' => $is_pending])->with('title', 'ORMECO-Promisorry Potal | Home');
    }

    public function approverHome()
    {
        $data = Promisorris::all();

        $is_approve = DB::table('promisorris')
            ->where('is_approve', '<>', '0')
            ->count();

        $is_pending = DB::table('promisorris')
            ->where('is_approve', '=', '0')
            ->count();

        $is_verified = DB::table('promisorris')
            ->where('is_verified', '=', '0')
            ->count();

        $notif = DB::table('promisorris')
            ->where('is_verified', '=', 1)
            ->where('is_approve', '=', 0)
            ->count();

            if($notif <> 0){
                session::flash('warning', 'You Have'.' '. $notif .' '. 'pending for Approval');
                return view('approver.index', ['promisorris' => $data, 'is_approve' => $is_approve, 'is_pending' => $is_pending, 'is_verified' => $is_verified])->with('title', 'ORMECO-Promisorry Potal | Approver Page');
            }else{  
                return view('approver.index', ['promisorris' => $data, 'is_approve' => $is_approve, 'is_pending' => $is_pending, 'is_verified' => $is_verified])->with('title', 'ORMECO-Promisorry Potal | Approver Page');
            }     

       
        
    }
    public function verifierHome()
    {
        
        $data = Promisorris::all();

        $is_approve = DB::table('promisorris')
            ->where('is_approve', '<>', '0')
            ->count();

        $is_pending = DB::table('promisorris')
            ->where('is_approve', '=', '0')
            ->count();

        $is_verified = DB::table('promisorris')
            ->where('is_verified', '=', '0')
            ->count();

        if($is_verified == 0){
            return view('verifier.home', ['promisorris' => $data, 'is_approve' => $is_approve, 'is_pending' => $is_pending, 'is_verified' => $is_verified])->with('title', 'ORMECO-Promisorry Potal | Verifier Page', 'warning');
        }else{
            session::flash('warning', 'You Have'.' '. $is_verified .' '. 'pending for verification');

            return view('verifier.home', ['promisorris' => $data, 'is_approve' => $is_approve, 'is_pending' => $is_pending, 'is_verified' => $is_verified])->with('title', 'ORMECO-Promisorry Potal | Verifier Page', 'warning');
        }     

    }
}
