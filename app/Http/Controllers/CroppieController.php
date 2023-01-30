<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;
use Image;
use App\Models\User;

class CroppieController extends Controller
{
    public function croppie_icon_store(Request $req,User $user_id){#user_idはpostリクエストで、自分のユーザー行が入っている
        $input = $req["user"];
    
        $image_url = Cloudinary::upload($input["icon"]->getRealPath())->getSecurePath();
        $input["icon"] = $image_url;
        $input += array("name"=>$user_id->name);
        $input += array("email"=>$user_id->email);
        $user_id->fill($input)->save();
        return back();
    }
    
    public function croppie_icon_edit_store(Request $req,User $user_id){
        $input = $req["user"];
        
        #もともとのアイコンをcloudinaryから削除
        $cloudinary_image_url = explode("/",$user_id->icon);
        $cloudinary_image_title = $cloudinary_image_url[sizeof($cloudinary_image_url)-1];
        $public_id = explode(".",$cloudinary_image_title)[0];
        exec('php ../artisan cloudinary:delete '.$public_id, $output, $retval);
        
        #新規アイコン設定
        $image_url = Cloudinary::upload($input["icon"]->getRealPath())->getSecurePath();
        $input["icon"] = $image_url;
        $input += array("name"=>$user_id->name);
        $input += array("email"=>$user_id->email);
        $user_id->fill($input)->save();
        return back();
    }
}
