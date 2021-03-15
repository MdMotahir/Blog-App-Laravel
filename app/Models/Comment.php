<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Blog;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['comment','author_id','blog_id'];

    public function author(){
        return $this->belongsTo(User::class,'author_id');
    }
    public function posts(){
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
