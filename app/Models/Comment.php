<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'commentable_id',
      'commentable_type',
      'content'
      ];
      function commentable(){
        return $this->morphTo();
      }
      function user(){
       return $this->belongsTo('App\Models\User');
      }
}
