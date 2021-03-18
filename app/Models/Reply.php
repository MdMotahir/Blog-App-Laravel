<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;


class Reply extends Model
{
    use HasFactory;
    protected $fillable=['reply','author_id','comment_id'];

    public function author(){
        return $this->belongsTo(User::class,'author_id');
    }
    public function comments(){
        return $this->belongsTo(Blog::class,'comment_id');
    }
}
