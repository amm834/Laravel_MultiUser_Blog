<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;
use Auth;
class VoteController extends Controller
{
  function like($id) {
    $isExist = Vote::where('post_id', $id)->where('user_id', Auth::user()->id)->first();
    if ($isExist) {
      if ($isExist->status == 'like') {
        Vote::whereId($isExist->id)->update([
          'status' => 'unlike'
        ]);
      } elseif ($isExist->status == 'unlike') {
        Vote::whereId($isExist->id)->update([
          'status' => 'like'
        ]);
      }
      return back();
    } else {
      Vote::create([
        'user_id' => Auth::user()->id,
        'post_id' => $id,
        'status' => 'like'
      ]);
      return back();
    }
  }

}