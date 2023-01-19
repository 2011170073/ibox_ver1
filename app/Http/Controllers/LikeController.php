<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\like;
use App\Models\post;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function do_like_store(post $post){#いいねするまでの処理
        $login_user= Auth::user();#userモデルを代入
        $is_liking = $login_user->is_likeing($post->id);#真偽値を返す
        if(!$is_liking){#ふぉろーしていない場合
            $login_user->do_like($post->id);
            $is_liking = $login_user->is_likeing($post->id);
            return back();
        }
    }
    
    public function un_like_store(post $post){#いいね解除までの処理
        $login_user = Auth::user();
        $is_liking = $login_user->is_likeing($post->id);#真偽値を返す
        if($is_liking){#ふぉろーしている場合
            $login_user->un_like($post->id);
            return back();
        }
    }
    
    public function post_like_view(like $likes){
        $login_user = Auth::user();
        return view("xapplike")->with(["posts"=>$login_user->likes_latest]);
    }
}





