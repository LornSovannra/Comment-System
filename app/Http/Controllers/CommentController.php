<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function Comment(CommentFormRequest $request)
    {
        $comment = new Comment();
        $comment -> post_id = $request -> post_id;
        $comment -> user_comment_name = $request -> user_comment_name;
        $comment -> user_comment_content = $request -> user_comment_content;
        $comment -> user_comment_profile_image = $request -> user_comment_profile_image;
        $comment -> user_comment_date = $request -> user_comment_date;
        $comment -> save();

        return redirect("/");
    }

    public function Update(CommentFormRequest $request, $id){
        $comment = Comment::findOrFail($id);
        $comment -> user_comment_content = $request -> user_comment_content;
        $comment -> save();

        return redirect("/");
    }

    public function Delete($id){
        $comment = Comment::findOrFail($id);
        $comment -> delete();

        return redirect("/");
    }
}