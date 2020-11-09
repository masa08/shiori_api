<?php

namespace App\Services;

use App\Models\Sentence;
use App\Models\User;

class SentenceService
{
  public function getWithBooks()
  {
    return Sentence::with('book')->orderBy('created_at', 'desc')->get();
  }

  public function getByUserIdWithBooks($user_id)
  {
    return Sentence::where('user_id', $user_id)->with('book')->orderBy('created_at', 'desc')->get();
  }

  public function create($sentence_data, $book_id)
  {
    $sentence = new Sentence();

    $sentence->sentence = $sentence_data["sentence"];
    $sentence->book_id  = $book_id;
    $sentence->user_id  = User::find($sentence_data["user_id"])->id;

    $sentence->save();

    return $sentence;
  }
}
