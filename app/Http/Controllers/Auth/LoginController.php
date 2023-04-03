<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('login');
    }
   
    public function login(Request $request){

        $input = $request->all();
        $this->validate($request,[
            "email" => ['required','email'],
            "password" => 'required'
        ]);
        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            session::flash('message', 'Welcome Back!');
            if(Auth::user()->role=='approver'){
                return redirect()->route('approver.home')-> with('title','ORMECO-Promisorry Potal | Approver Page');
            }
            elseif(Auth::user()->role=='verifier'){
                return redirect()->route('verifier.home')-> with('title','ORMECO-Promisorry Potal | Verifier Page');
            }
            else{
                return redirect()->route('home')-> with('title','ORMECO-Promisorry Potal | Home');
            }
        }
        else{
            return redirect()
            ->route('login')
            ->with('error','Incorrect email or password');
        }
       }
}
