<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\post;

use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function posts(){
        return $this->hasMany(post::class);
    }
    
    public function posts_latest(){
        return $this->hasMany(post::class)->latest();
    }
    
    public function followers(){
        return $this->belongsToMany(User::class,'follows', 'follower_id', 'follow_id');
    }
    
    public function follows(){
        return $this->belongsToMany(User::class,'follows', 'follow_id', 'follower_id');
    }

    
    public function is_following($user_id){#フォローしているか？
#followsテーブルに、$user_id(フォローする側)とfollower_id(フォローされる側)の組み合わせの行がすでにあるかどうかを
#whereで検索して、ある場合はtrue,ない場合はfalseを返す
        return $this->follows()->where("follower_id",$user_id)->exists();
        
    }
    
    public function do_follow($user_id){#フォローする
        return $this->follows()->attach($user_id);
    }
    
    public function un_follow($user_id){#フォロー解除
        return $this->follows()->detach($user_id);
    }
    
    
    
    public function likes(){#postから、postと同じIDを持つpost_idカラムを持ったlikesテーブルを参照できる、はず
        return $this->belongsToMany(post::class,"likes","user_id","post_id");
    }
    
    public function likes_latest(){
        return $this->belongsToMany(post::class,"likes","user_id","post_id")->latest();
    }
    
    public function is_likeing($post_id){#いいねしているか判別して真偽値返す
        return $this->likes()->where("post_id",$post_id)->exists();
    }
    
    public function do_like($post_id){#いいねする
        return $this->likes()->attach($post_id);
    }
    
    public function un_like($post_id){#いいね解除する
        return $this->likes()->detach($post_id);
    }
    
    


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public $incrementing = false;
}
