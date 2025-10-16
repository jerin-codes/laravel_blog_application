<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;

class DashBoardController extends Controller 
{   

   
    public function index(){
        

        $posts=Post::where('user_id',Auth::id())->latest()-> paginate(6);
        return view('users.dashboard',["posts"=>$posts]);
    }

    public function getUserPosts($user_id){
        $user=User::where("id",$user_id)->get();
        $user=$user[0];
        // dd($user[0]->username);
        $userPosts=Post::where("user_id",$user_id)->paginate(6);
        return view("users.user-posts",["posts"=>$userPosts,"user"=>$user]);
    }
}
