<?php

namespace App\Services;

use App\Models\User;

class UserService
{
  public function getById($id)
  {
    return User::find($id);
  }

  public function getByEmail($email)
  {
    return User::where('email', $email)->first();
  }

  public function getByIdWithSentence($id)
  {
    return User::with('sentences')->find($id);
  }

  public function create($data)
  {
    $user           = new User();
    $user->name     = $data["name"];
    $user->email    = $data["email"];
    $user->password = bcrypt($data["password"]);
    $user->save();

    return $user;
  }

  public function update($data, $id)
  {
    $user = $this->getById($id);
    $user->name = $data['name'];
    $user->save();

    return $user;
  }
}
