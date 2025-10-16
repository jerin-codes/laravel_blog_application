<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
     public static function middleware(){
        return [
            newMiddleware("auth",except:["index","show"]),
        ];
     }
    public function index()
    {

        $posts=Post::orderBy("created_at","desc")->paginate(6);
        
        
    //    dd($posts[0]["title"]);
        return view("posts.index",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $fields=$request->validate([
        "title"=>["required"],
        "description"=>["required"]
       ]);
     
       
       Auth::user()->posts()->create($fields);
        return back()->with(
            "success","Your post created successfully"
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.post-details",["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('modify',$post);//here we accessing the modify policy here is first argument is user which is automatically passed by the laravel
        return view("posts.edit",["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('modify',$post);
        $fields=$request->validate([
            "title"=>["required"],
        "description"=>["required"]
        ]);
        $post->update($fields);
        
        return redirect()->route("dashboard");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
            Gate::authorize('modify',$post);
            $post->delete();
           return back()->with('delete', 'Deletion completed successfully!');
}
}
