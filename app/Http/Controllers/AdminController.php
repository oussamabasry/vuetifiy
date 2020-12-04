<?php

namespace App\Http\Controllers;

use App\Condidacies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function condidacies(Request $request)
    {

        $user_profils = DB::table('user_profils')
            ->join('condidacies', 'user_profils.id', 'condidacies.user_profil_id')
            ->where('condidacies.branch', $request->branch)
            ->get();


        return $user_profils;
    }

    public function acceptCondidacie(Request $request)
    {
        $condidacie = Condidacies::find($request->id);
        $condidacie->accepted = 1;
        $condidacie->save();

        return $condidacie;
    }

    public function refuseCondidacie(Request $request)
    {
        $condidacie = Condidacies::find($request->id);
        $condidacie->accepted = 0;
        $condidacie->save();

        return $condidacie;
    }
}
