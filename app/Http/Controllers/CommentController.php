<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function post_comment_store(Request $req,comment $comments){
        $input = $req["comment"];
        print_r($input);
        $comments->fill($input)->save();
        return back();
    }
}
