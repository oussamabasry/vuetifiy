<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmEmailRequest;
use App\User;
use Illuminate\Support;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResetRequest;
use App\Http\Requests\ForgotRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendEmailConfirmRequest;

class ConfirmemailController extends Controller
{
    public function SendEmailConfirm(SendEmailConfirmRequest $request){

        $email = $request->input('email');

        if(User::where('email',$email)->doesntExist()){
            return response([
                'message' => 'user doesnt exist !'
            ],404);
        }

        $user = DB::table('users')->where('email', $email)->first();

        if($user->email_verified_at == null){

            $token = Str::random(10);


            try {

               DB::table('email_confirmations')->insert([
                   'email' => $email,
                   'token' => $token,
               ]);

                //send an email
                Mail::send('Mails.confirmemail',['token'=> $token], function(Message $message) use($email){
                   $message->to($email);
                   $message->subject('La confirmation de l\'email');
                });

                return response([
                    'message' => 'check your email'
                ]);

            } catch (\Exception $exception) {

               return response([
                   'message' => $exception->getMessage()
               ],400);

            }

        }

        return response([
            'message' => 'email already confirmed'
        ],406);

    }


    public function ConfirmEmail(ConfirmEmailRequest $request){

         $token = $request->input('token');

         if(!$emailconfirmation = DB::table('email_confirmations')->where('token',$token)->first()){
            return response([
                'message'=> 'Invalid token !'
            ],400);
         }

        if(!$user = User::where('email',$emailconfirmation->email)->first()){
            return response([
                'message' => 'This user doesnt exist ! '
            ],404);
        }
        $currentDateTime = date('Y-m-d H:i:s');

        $affected = DB::table('users')
        ->where('email', $user->email)
        ->update(['email_verified_at' => $currentDateTime]);

       

        return response([
            'message' => 'succes'
        ],200);

    }
}
