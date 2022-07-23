<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  //Import the auth and user
use App\Models\User;

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
        $user = User::with('student')->find(Auth::id());


        if($user->student){
            if($user->student->status == 'inactive'){
                Auth::logout();
                return redirect('/login');
            }else{
                return view('home');
            }
        }

        //Pwede ring ganto lang >> return view('welcome'), compact(user));

          if($user->roles == 'admin'){
            return view('home');
        }else if($user->roles == 'student'){
            return view('welcome');  // Pwedeng ganto (,compact('user')
        }else{
            Auth::logout();
            return redirect('/login');
        }



        //  dd($user);
        // if($user->student->status == 'inactive'){
        //     Auth::logout();
        //     return redirect('/login');
        // }else{
        //     return view('home');
        // }
        // return view('home');
    }
}
