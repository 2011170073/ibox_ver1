<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\follow;
use App\Models\post;
use App\Models\User;


use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function do_follow_store(User $user){#フォローする
        $follows= Auth::user();#userモデルを代入
        $is_following = $follows->is_following($user->id);#真偽値を返す
        if(!$is_following){#ふぉろーしていない場合
            $follows->do_follow($user->id);
            $is_following = $follows->is_following($user->id);
            return back();
        }
    }
    
    public function un_follow_store(User $user){#フォロー解除する
        $follows = Auth::user();
        $is_following = $follows->is_following($user->id);#真偽値を返す
        if($is_following){#ふぉろーしている場合
            $follows->un_follow($user->id);
            return back();
        }
    }
    
    public function user_list_view(User $users){
        return view("xappuserlist")->with(["users"=>$users->get()]);
    }
    
    
}
