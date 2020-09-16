<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['id','post_id','comment','user_id','created_at'];

    //Relations

    public  function user(){
        return $this->belongsTo('App\Models\User');
    }

    public  function post(){
        return $this->belongsTo('App\Models\Post');
    }
}
