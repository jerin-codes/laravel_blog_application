<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request){
         
        //valiadte
     $request->validate([
        "username"=>["required",'max:255'],

        "email"=>['required','max:255','email',"unique:users"],
        "password"=>['required',"min:3","confirmed"]

     ]);

    //register the user
    $user= User::create([
        "username"=>$request->username,
        "email"=>$request->email,
        "password"=>$request->password,
     ]);

     //login user with the dataas of the currently created user data
     Auth::login($user);

     return redirect()->route('posts.index');
    }  


public function login(Request $request){


            if(!empty($request->username)){

               $fields= $request->validate([
                    "username"=>["required","max:255"],
                    "password"=>['required',"min:3"]
                ]);
            }else{
               $fields= $request->validate([
                    
                    "email"=>["required","email"],
                    "password"=>["required","min:3"],
                    ]);
               
            }
            // dd($fields);
            if(Auth::attempt($fields,$request->remember)){


                return redirect()->route('dashboard');
            }else{
                return back()->withErrors([
                    "failed"=>"The provided credentials does not match our records"
                ]);
            }
            

}


//log out user
public function logout(Request $request){
    //logout the user
    Auth::logout();

    //invalidate users session
    $request->session()->invalidate();

    //regenrate  the csrf token
    $request->session()->regenerateToken();

    //redirecting to home page
    return redirect("/");
}


}
