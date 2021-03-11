<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function sentences()
    {
        return $this->hasMany('App\Models\Sentence');
    }
}
