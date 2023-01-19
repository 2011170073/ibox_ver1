<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class comment extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        "id",
        "user_id",
        "post_id",
        "created_at",
        "updated_at",
        "body",
    ];
}
