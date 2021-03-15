<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;


class Blog extends Model
{
    use HasFactory;

    protected $fillable=['title','content','image','cat_id','author_id'];

    public function author(){
        return $this->belongsTo(User::class,'author_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
