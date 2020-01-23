<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
