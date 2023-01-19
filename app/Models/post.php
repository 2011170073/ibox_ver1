<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\comment;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function comments(){
        return $this->hasMany(comment::class);
    }
    
    
    

    
    protected $fillable = [
        "id",
        'title',
        "body",
        "image",
        "spell",
        "user_id",
        "created_at",
        "updated_at",
        "deleted_at",
    ];
}
