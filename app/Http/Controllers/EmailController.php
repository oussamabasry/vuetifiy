<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Message;
use Mail;
use App\User;

class EmailController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function sendAcceptedMail(Request $request){
        $emails = DB::table('user_profils')
        ->join('condidacies', 'user_profils.id', 'condidacies.user_profil_id')
        ->join('users', 'users.id', 'user_profils.user_id')
        ->where('condidacies.branch', $request->branch)
        ->get()
        ->map(function($user){return $user->email;})
        ->toArray();

        Mail::send('Mails.sendmailaccept',[], function(Message $message) use($emails){
            $message->to($emails)->subject('This is test e-mail');
        });

        return "envoyer";
    }
}
