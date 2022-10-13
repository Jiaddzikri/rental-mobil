<?php

namespace App\Service\implementations;

use App\Data\UserRequest;
use App\Data\UserResponse;
use App\Exceptions\UserValidationException;
use App\Models\UserModel;
use App\Service\UserService;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

class UserServiceImplementations implements UserService
{
  public function __construct(private UserResponse $response){}

  public function postLogin(UserRequest $request): UserResponse
  {
    $userTable = DB::table("user_models")
      ->where(["username" => $request->username])
      ->first();

    if ($userTable == null) throw new UserValidationException("Username Tidak Ditemukan!");
    try {
      if (password_verify($request->password, $userTable->password)) {
        $this->response->username = $userTable->username;
        $this->response->email  = $userTable->email;
        $this->response->password = $userTable->password;
        $this->response->role = $userTable->role;

        return $this->response;
      } else {
        throw new UserValidationException("Password Salah!");
      }
    } catch (UserValidationException $exception) {
      throw $exception;
    }


  }
}
