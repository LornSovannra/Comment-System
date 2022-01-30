<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function Home()
    {
        $posts = Post::all() -> sortDesc();
        $comments = Comment::all() -> sortBy("id");

        $date = Carbon::now();
        $date->toArray();

        return view("index", ["posts" => $posts, "comments" =>  $comments, 'date' => $date -> toDayDateTimeString()]);
    }

    public function Post(PostFormRequest $request)
    {
        $post = new Post();
        $post -> user_post_name = $request -> user_post_name;
        $post -> user_post_caption = $request -> user_post_caption;

        if($request -> hasFile("user_post_image") && $request -> file("user_post_image") -> isValid())
        {
            $file = time() . "." . $request -> file("user_post_image") -> getClientOriginalExtension();
            $request -> file("user_post_image") -> move(public_path('/post_img'), $file);
        }

        if($request->file('user_post_image') != null)
        {
            $post -> user_post_image = $file;
        }
        
        $post -> user_post_profile_image = $request -> user_post_profile_image;
        $post -> user_post_date = $request -> user_post_date;
        $post -> save();

        return redirect("/");
    }
}