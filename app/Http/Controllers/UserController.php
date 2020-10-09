<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        try{
            if($user->email_verified_at != null){
                if (Auth::attempt($request->only('email','password'))) {
                    return response()->json(Auth::user(), 200);
                 }
            }elseif($user->email_verified_at == null){
               return response([
                   'message' => 'you must confirm your email'
               ],403);
            }

        }catch(\Exception $exception){
           return response([
               'message' => $exception->getMessage()
           ],400);
        }

        return response([
            'message' => 'Invalid email or password'
        ],401);


    }

    public function logout(){
        Auth::logout();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        request()->validate([
            'firstname' =>['required','max:20','min:3'],
            'lastname' =>['required','max:20','min:3'],
            'email' =>['required','email','unique:candidats'],
            'phonenumber' =>['required','max:15','min:10'],
            'CNE' =>['required'],
            'datebirth' =>['required','date','before:2005-01-01'],
            'password' =>['required','min:8'],
            'sexe' => ['required']
        ]);

      return User::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'phonenumber' => request('phonenumber'),
            'CNE' => request('CNE'),
            'datebirth' => request('datebirth'),
            'password' => Hash::make(request('password')),
            'sexe' => request('sexe')
        ]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
