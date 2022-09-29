<?php

namespace App\Service;

use App\Data\User;
use App\Data\UserRequest;
use App\Data\UserResponse;

interface UserService
{
  public function postLogin(UserRequest $request): UserResponse;
}
