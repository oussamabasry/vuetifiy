<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

   
    public function store(Request $request)
    {
    
        $id = Auth::id(); 
        $note = ($request->note_S1+ $request->note_S2+$request->note_S3+$request->note_S4)/4;
        $affected = DB::table('user_profils')
              ->where('user_id', $id)
              ->update([
              'CNE' => $request->CNE,
              'CNI' => $request->CNI,
              'grade_s1' => $request->note_S1,
              'grade_s2' => $request->note_S2,
              'grade_s3' => $request->note_S3,
               'grade_s4' => $request->note_S4, 
               'note' => $note,
              'année_bac' => $request->annee_bac,
              'filliere' => $request->filliere,
              'année_bac2' => $request->annee_bac2,
              ]);

              
        $user = auth()->user();
        $userCompleted = DB::table('users')
              ->where('id', $user->id)
              ->update([
                'completed' => 1
              ]);
     
    return "succes";
    }
    public function bdate(Request $request)
    {
        $id = Auth::id(); 
        $affected = DB::table('user_profils')
              ->where('user_id', $id )
              ->update(['phonenumber' => $request-> tele
              ]);
        
              
     
    return "succes";
    }
    public function glsid(Request $request)
    {
        $id = request('id');

        $user_profil = UserProfil::select("id")
        ->where("user_id", $id)
        ->first();

        DB::table('condidacies')->insert([
            ['user_profil_id' => $user_profil->id,
             'branch' => 'GLSID ',
            ],
            
        ]);
     return "glsid";
    
    }
    public function bdcc(Request $request)
    {
        $id = request('id');

        $user_profil = UserProfil::select("id")
        ->where("user_id", $id)
        ->first();

        DB::table('condidacies')->insert([
            ['user_profil_id' => $user_profil->id,
             'branch' => 'BDCC ',
            ],
            
        ]);
        return "bdcc";
    
    }public function gmsi(Request $request)
    {
        $id = request('id');

        $user_profil = UserProfil::select("id")
        ->where("user_id", $id)
        ->first();

        DB::table('condidacies')->insert([
            ['user_profil_id' => $user_profil->id,
             'branch' => 'GMSI ',
            ],
            
        ]);
        return 'gmsi';
     
    
    }public function gil(Request $request)
    {
        $id = request('id');

        $user_profil = UserProfil::select("id")
        ->where("user_id", $id)
        ->first();

        DB::table('condidacies')->insert([
            ['user_profil_id' => $user_profil->id,
             'branch' => 'GIL ',
            ],
            
        ]);
        return"gil";
     
    
    }public function gecsi(Request $request)
    {
        $id = request('id');

        $user_profil = UserProfil::select("id")
        ->where("user_id", $id)
        ->first();

        DB::table('condidacies')->insert([
            ['user_profil_id' => $user_profil->id,
             'branch' => 'GECSI ',
            ],
            
        ]);
        return 'gecsi';
     
    
    }public function seer(Request $request)
    {
        $id = request('id');

        $user_profil = UserProfil::select("id")
        ->where("user_id", $id)
        ->first();

        DB::table('condidacies')->insert([
            ['user_profil_id' => $user_profil->id,
             'branch' => 'SEER',
            ],
            
        ]);
     
        return 'seer';
     
    }

    public function logout()
    {
        Auth::logout();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $condidacies = DB::select('select * from user_profils');
         return response()->json($condidacies);
     }
     public function savefile(Request $request)
     {
         $request->validate([
             'photo' => 'required|file|image',
     
         ]);
     
         
         $contents = file_get_contents($request->photo->path());
         
         
         $newPath = $request->photo->store('photos', 'local');
         $url =url($newPath);
         $id = Auth::id();
         $affected = DB::table('user_profils')
               ->where('user_id', $id)
               ->update(['CV' => $url]);
         return $url ;
         
        
     }
     
     public function savefilee(Request $request)
     {
         $request->validate([
             'pic' => 'required|file|image',
 
         ]);
     
        
         $contents = file_get_contents($request->pic->path());
         
         
         $newPath = $request->pic->store('photos', 'public');
         $url =url($newPath);
         $id = Auth::id();
         $affected = DB::table('user_profils')
               ->where('user_id', $id)
               ->update(['Photo' => $url]);
         return $url ;
        
     }
     public function savecnir(Request $request)
     {
         $request->validate([
             'cnir' => 'required|file|image',
 
         ]);
     
         $contents = file_get_contents($request->cnir->path());
         
        
         $newPath = $request->cnir->store('cnir', 'cnir');
         $url =url($newPath);
         $id = Auth::id();
         $affected = DB::table('user_profils')
         ->where('user_id', $id)
         ->update(['CNI_Recto' => $url]);

   return $url ;
 
         return $id ;
        
     }
     public function savecniv(Request $request)
     {
         $request->validate([
             'cniv' => 'required|file|image',
 
         ]);
     
         $contents = file_get_contents($request->cniv->path());
         
        
         $newPath = $request->cniv->store('cniv', 'cniv');
         $url =url($newPath);
         $id = Auth::id();
         $affected = DB::table('user_profils')
               ->where('user_id', $id)
               ->update(['CNI_Verso' => $url]);
 
         return $url ;
        
     }
     public function saver1(Request $request)
     {
         $request->validate([
             'r1' => 'required|file|image',
 
         ]);
     
         $contents = file_get_contents($request->r1->path());
         
         $newPath = $request->r1->store('rel1', 'r1');
         
         $url =url($newPath);
         $id = Auth::id();
         $affected = DB::table('user_profils')
               ->where('user_id', $id)
               ->update(['Relevet_S1' => $url]);
 
         return $url ;
        
     }
     public function saver2(Request $request)
     {
         $request->validate([
             'r2' => 'required|file|image',
 
         ]);
     
         $contents = file_get_contents($request->r2->path());
         
        
         $newPath = $request->r2->store('r2', 'r2');
         $url =url($newPath);
         $id = Auth::id();
         $affected = DB::table('user_profils')
               ->where('user_id', $id)
               ->update(['Relevet_S2' => $url]);
 
         return $url ;
        
        
     }
     public function saver3(Request $request)
     {
         $request->validate([
             'r3' => 'required|file|image',
 
         ]);
     
         $contents = file_get_contents($request->r3->path());
         
        
         $newPath = $request->r3->store('r3', 'r3');
         $url =url($newPath);
         $id = Auth::id();
         $affected = DB::table('user_profils')
               ->where('user_id', $id)
               ->update(['Relevet_S3' => $url]);
 
         return $url ;
     }
     public function saver4(Request $request)
     {
         $request->validate([
             'r4' => 'required|file|image',
 
         ]);
     
         $contents = file_get_contents($request->r4->path());
         
        
         $newPath = $request->r4->store('r4', 'r4');
         $url =url($newPath);
         $id = Auth::id();
         $affected = DB::table('user_profils')
               ->where('user_id', $id)
               ->update(['Relevet_S4' => $url]);
 
         return $url ;
     }
     public function savedp(Request $request)
     {
         $request->validate([
             'dp' => 'required|file|image',
 
         ]);
     
         $contents = file_get_contents($request->dp->path());
         
        
         $newPath = $request->dp->store('dp', 'dp');
         $url =url($newPath);
         $id = Auth::id();
         $affected = DB::table('user_profils')
               ->where('user_id', $id)
               ->update(['diploma' => $url]);
 
         return $url ;
     }
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
            'firstname' => ['required', 'max:20', 'min:3'],
            'lastname' => ['required', 'max:20', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'phonenumber' => ['required', 'max:15', 'min:10'],
            'CNE' => ['required'],
            'datebirth' => ['required', 'date', 'before:2005-01-01'],
            'password' => ['required', 'min:8'],
            'sexe' => ['required'],
            'role' => ['required'],
        ]);

      $user =  User::create([
            //'firstname' => request('firstname'),
            // 'lastname' => request('lastname'),
            'email' => request('email'),
            //'phonenumber' =>   request('phonenumber'),
            // 'CNE' => request('CNE'),
            // 'datebirth' => request('datebirth'),
            'password' => Hash::make(request('password')),
            //'sexe' => request('sexe'),
            'role' => request('role')
        ]);

     

        $userProfil = new UserProfil;

        $years = \Carbon\Carbon::parse(request('datebirth'))->age;

        $userProfil->user()->associate($user);

        $userProfil->firstname = request('firstname');
        $userProfil->lastname = request('lastname');
        $userProfil->phonenumber = request('phonenumber');
        $userProfil->CNE = request('CNE');
        $userProfil->datebirth = request('datebirth');
        $userProfil->sexe = request('sexe');

        $userProfil->age = $years;
        $userProfil->note=0;
        $userProfil->diploma = '';
        $userProfil->CNI = '';
        $userProfil->CNE = '';
        $userProfil->grade_s1 = 0;
        $userProfil->grade_s2 = 0;
        $userProfil->grade_s3 = 0;
        $userProfil->grade_s4 = 0;
        
        $userProfil->completed = 0;

        $userProfil->CV = '';
        $userProfil->filliere = '';
        $userProfil->année_bac = '';
        $userProfil->année_bac2 = '';
        $userProfil->Photo = '';
        $userProfil->CNI_Recto = '';
        $userProfil->CNI_Verso = '';
        $userProfil->Relevet_S1 = '';
        $userProfil->Relevet_S2 = '';
        $userProfil->Relevet_S3 = '';
        $userProfil->Relevet_S4 = '';
        $userProfil->save();
        
       
        //    $userProfil = UserProfil::create([
        //         'firstname' => request('firstname'),
        //         'user_id' =>request($user->id),
        //         'lastname' => request('lastname'),
        //         'phonenumber' => request('phonenumber'),
        //         'CNE' => request('CNE'),
        //         'datebirth' => request('datebirth'),
        //         'sexe' => request('sexe'),
        //     ]);



        return response($userProfil, 201);
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
