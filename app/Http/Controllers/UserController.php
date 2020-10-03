<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->only('email','password'))) {
           return response()->json(Auth::user(), 200);
        }
        throw ValidationException::withMessages([
         'email' => ['The provided credentials are incorrect.']
     ]);
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
    public function store(Request $request)
    {

        request()->validate([
            'firstname' =>['required','max:20','min:3'],
            'lastname' =>['required','max:20','min:3'],
            'email' =>['required','email','unique:candidats'],
            'phonenumber' =>['required','max:15','min:10'],
            'diplome' =>['required'],
            'datebirth' =>['required','date','before:2005-01-01'],
            'password' =>['required','min:8'],
            'sexe' => ['required']
        ]);
      return User::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'phonenumber' => request('phonenumber'),
            'diplome' => request('diplome'),
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
