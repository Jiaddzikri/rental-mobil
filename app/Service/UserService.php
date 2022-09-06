<?php

namespace App\Service;

use App\Models\User;

interface UserService
{
  public function postLogin(User $User): User;
}
