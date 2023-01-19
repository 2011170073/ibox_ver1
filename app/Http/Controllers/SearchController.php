<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;

class SearchController extends Controller
{
    public function post_list_search_view(Request $req){
        $keyword = $req["keyword"];
        
        $quary = post::query();
        
        if(!empty($keyword)){
            $quary->where("title","LIKE","%{$keyword}%")
                ->orwhere("spell","LIKE","%{$keyword}%");
        }
        
        $posts = $quary->get();
        
        return view("xapplist",compact("posts","keyword"));
    }
    
    public function user_list_search_view(Request $req){
        $keyword = $req["keyword"];#name=keywordを持つinputの入力情報をgetリクエストで取得
        
        $quary = User::query();#Userモデルにクエリを適用？
        
        if(!empty($keyword)){#inputの入力情報が空じゃないならば
            $quary->where("name","LIKE","%{$keyword}%");
        }
        
        $users = $quary->get();
        #LIKEによって類似検索を行って絞ったテーブル情報を取得
        
        return view("xappuserlist",compact("users","keyword"));
    }
}





