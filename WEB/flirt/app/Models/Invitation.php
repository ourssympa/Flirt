<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    protected  $fillable =[
        "user_id_for",
        "user_id_to",
        "accept"
    ];

    function invited_by(){
    return $this->belongsTo(User::class,"user_id_for","id");
    }
}
