<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Cloudinary;


use Illuminate\Support\Facades\Auth;


class PostController extends Controller{
    public function posts_list_view(post $posts){
        //return view("posts/list")->with(["posts"=>$posts->get()]);
        return view("xapplist")->with(["posts"=>$posts->latest()->get()]);

    }
    
    public function post_detail_view(post $post){
        //return view("posts/detail")->with(["post"=>$post]);
        return view("xappdetail")->with(["post"=>$post,"comments"=>$post->comments]);
    }
    
    public function post_create_view(post $posts){
        return view("xappcreate")->with(["posts"=>$posts->get()]);
    }
    
    public function post_store_view(post $posts,Request $req){
        $input = $req["post"];
        $image_url = Cloudinary::upload($input["image"]->getRealPath())->getSecurePath();#画像をcloudinaryのクラウドディレクトリに保存
        #dd($input["image"]->getRealPath());
        #$image_url=str型
        #print_r($image_url);
        $user_id = Auth::user()->id;
        $created_at = now();
        $input += array("user_id"=>$user_id);
        $input += array("created_at"=>$created_at);
        $input["image"]=$image_url;
        #print_r($input);  input連想配列をprint_r関数で表示する場合
        $posts->fill($input)->save();#postsテーブルに１行追加
        return redirect("/");
    }
    
    public function post_mylist_view(User $user_id){#xappmylist.blade.phpで指定したuser_idを指定しないといけない
        return view("xappmylist")->with(["posts"=>$user_id->posts_latest]);#postsはuserモデル.phpのposts()関数の事、指定した$user_idを持つpostsモデルのみを持ってくるように参照している
    }
    
    public function post_delete_view(post $post){
        $post->delete();
        $cloudinary_image_url = explode("/",$post->image);#文字列を/ごとに区切り、配列に代入
        $cloudinary_image_title = $cloudinary_image_url[sizeof($cloudinary_image_url)-1];#インデックス指定で、cloudinaryに保存されている画像の〇〇.jpg部分のみを切り取り
        #sizeof($public_id);#sizeof関数＝配列のインデックス数-1で、publicid.jpgなどの部分が取得できる、
        $public_id = explode(".",$cloudinary_image_title)[0];#文字列を.ごとに区切り配列に代入⇛〇〇.拡張子の、〇〇部分のみを切り取り
        exec('php ../artisan cloudinary:delete '.$public_id, $output, $retval);#$outputは出力結果
        #実行時はpublicディレクトリにいる、../でartisanファイルの場所にいる
        #dd($a->getRealPath());
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
        
        if(!isset($input["image"])){#画像を選択してない場合(isset関数で引数が存在するかを確認)
            $input += array("image"=>$input["image2"]);
            unset($input["image2"]);
        }else{#画像を選択した場合
            #1⇛画像削除
            $cloudinary_image_url = explode("/",$input["image2"]);#文字列を/ごとに区切り、配列に代入
            $cloudinary_image_title = $cloudinary_image_url[sizeof($cloudinary_image_url)-1];#インデックス指定で、cloudinaryに保存されている画像の〇〇.jpg部分のみを切り取り
            $public_id = explode(".",$cloudinary_image_title)[0];#文字列を.ごとに区切り配列に代入⇛〇〇.拡張子の、〇〇部分のみを切り取り
            exec('php ../artisan cloudinary:delete '.$public_id, $output, $retval);#$outputは出力結果
            #2⇛画像アップロード＆アップロード画像のパスを連想配列imageキーに代入＆連想配列のimage2キー削除
            $image_url = Cloudinary::upload($input["image"]->getRealPath())->getSecurePath();
            $input["image"] = $image_url;
            unset($input["image2"]);
        }
        
        $post->fill($input)->save();
        #$postが実際に存在するテーブルのある行を指していれば更新を行う、指していなければテーブルに新しく追加する
        $user_id = Auth::user()->id;
        return redirect("/mylist/{$user_id}");
    }
    
    public function user_profile_view(User $user_id){
        return view("xappuserprofile")->with(["posts"=>$user_id->posts_latest,"user_id"=>$user_id]);
    }
    
}


