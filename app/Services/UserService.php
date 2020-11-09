<?php

namespace App\Services;

use App\Models\User;

class UserService
{
  public function getById($id)
  {
    return User::find($id);
  }

  public function getByIdWithSentence($id)
  {
    return User::with('sentences')->find($id);
  }

  public function update($data, $id)
  {
    $user = $this->getById($id);
    $user->name = $data['name'];
    $user->save();

    return $user;
  }
}
