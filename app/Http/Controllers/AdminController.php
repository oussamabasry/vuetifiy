<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function glsidCondidacies(Request $request){
           
          $condidacies= DB::table('condidacies')
          ->join('user_profils','user_profils.id','condidacies.user_profil_id')
          ->where('condidacies.branch',$request->branch)
          ->get();
          
        

         return $condidacies;
    }
}
