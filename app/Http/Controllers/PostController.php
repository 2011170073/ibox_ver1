<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;


class PostController extends Controller{
    public function posts_list_view(post $posts){
        //return view("posts/list")->with(["posts"=>$posts->get()]);
        return view("xapplist")->with(["posts"=>$posts->get()]);

    }
    
    public function post_detail_view(post $post){
        //return view("posts/detail")->with(["post"=>$post]);
        return view("xappdetail")->with(["post"=>$post]);
    }
    
    public function post_create_view(post $posts){
        return view("xappcreate")->with(["posts"=>$posts->get()]);
    }
    
    public function post_store_view(post $posts,Request $req){
        $input = $req["post"];#postリクエストという意味
        $user_id = Auth::user()->id;
        $created_at = now();
        $input += array("user_id"=>$user_id);
        $input += array("created_at"=>$created_at);
        print_r($input);#input連想配列をprint_r関数で表示する場合
        $posts->fill($input)->save();#postsテーブルに１行追加
        return redirect("/");
    }
    
    public function post_mylist_view(User $user_id){#xappmylist.blade.phpで指定したuser_idを指定しないといけない
        return view("xappmylist")->with(["posts"=>$user_id->posts]);#postsはuserモデル.phpのposts()関数の事、指定した$user_idを持つpostsモデルのみを持ってくるように参照している
    }
    
    public function post_delete_view(post $post){
        $post->delete();
        $user_id=Auth::user()->id;
        return redirect("mylist/{$user_id}");
    }
    
    public function post_edit_view(post $post){
        return view("xappedit")->with(["post"=>$post]);
        #urlから$postを受け取っているため、getはしない
    }
    
    public function post_edit_store(post $post,Request $req){
        #urlにpostのid情報がある場合は、引数の$postにその情報が入る
        #$post=post::find($input['id']);
        $input = $req["post"];
        $user_id = Auth::user()->id;
        #$updated_at = now();
        #print_r($input);
        $post->fill($input)->save();
        #$postが実際に存在するテーブルのある行を指していれば更新を行う、指していなければテーブルに新しく追加する
        return redirect("/mylist/{$user_id}");
    }
    
}


