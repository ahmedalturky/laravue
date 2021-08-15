<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{



/**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
     
    //     $this->middleware('auth');
    // }
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     return User::latest()->paginate(10);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);
        return User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'type' => $request['type'],
            'bio' => $request['bio'],
            'password' => Hash::make($request['password']),
        ]);
        // return $request->all();
    }

    public function profile()
    {

        // return Auth::User();

    //    $userId = Auth::id();
    // return $request->user();
    return  auth()->user();
        // return auth()-/{{ Auth::user()->id }}>user();
        // return User::latest()->paginate(10);
        //          $user= auth()->user();
//    return response()->json(['status'=>'success','data'=>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user =User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|string|min:6'
        ]);
        $user->update($request->all());

        return ['message' => 'update date'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $user = User::findOrFail($id);
     $user->delete();

     return ['message' => 'user Deletet'];
    }
}
