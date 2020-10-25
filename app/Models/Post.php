<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
  
    protected $fillable = [
      'user_id',
      'category_id',
      'content',
      'img'
      ];
      function user(){
        return $this->belongsTo('App\Models\User');
      }
      function category(){
        return $this->belongsTo('App\Models\Category');
      }
      function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
      }
}

