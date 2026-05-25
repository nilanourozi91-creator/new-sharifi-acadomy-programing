<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        "last_name",
        "image_url",
        "bio",
        ""
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
