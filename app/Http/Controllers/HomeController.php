<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        // return Auth::User();

    //    $userId = Auth::id();
    // return $request->user();
    // return ['message' => 'data '];
        // return auth()->user();
        // return User::latest()->paginate(10);
        //          $user= auth()->user();
//    return response()->json(['status'=>'success','data'=>$user]);
    }
}
