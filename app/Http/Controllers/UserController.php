<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $req){
     $user= DB::table('users')->where('email', $req->email)->first();
       
     if( $user && Hash::check($req->password, $user->password) ){
        $req->session()->put('user', $user);
         return redirect('/product');
     }
     else{
         return "Incorrect email address or password";
     }
    
    }
}
