<?php

namespace App\Http\Controllers;

use App\Data\UserRequest;
use App\Exceptions\UserValidationException;
use App\Service\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserController extends Controller
{
  public function __construct(private UserRequest $request, private UserService $user_service)
  {
  }

  public function login(): View
  {
    return view("user/login", [
      "title" => "Page | Login",
      "feedback" => [
        "success" => null,
        "failed" => [
          "username" => null,
          "password" => null
        ]
      ]
    ]);
  }

  public function postLogin(Request $request): View|RedirectResponse
  {
    $this->request->email = null;
    $this->request->username =  $request->post("username", null);
    $this->request->password =  $request->post("password", null);

    $validator = Validator::make($request->all(), [
      "username" => "required|max:30",
      "password" => "required"

      ], [
        "username.required" => "Kolom Username Dibutuhkan",
        "password.required" => "Kolom Password Dibutuhkan"
    ]);

    if($validator->fails()) {
      return \redirect()
        ->back()
        ->withErrors($validator)
        ->withInput($request->all());
    }

    try {
      $this->user_service->postLogin($this->request);

      return redirect("/");
    } catch (UserValidationException $exception) {
      $username = "";
      $password = "";
      if(preg_match("/Username Tidak Ditemukan!/i", $exception->getMessage())) {
        $username = "Username Tidak Ditemukan";
      } else if(preg_match("/Password Salah!/i", $exception->getMessage())) {
        $password = "Password Salah!";
      }

      return view("user/login", [
        "title" => "Page | Login",
        "feedback" => [
          "success" => null,
          "failed" => [
            "username" => $username ?? null,
            "password" => $password ?? null
          ]
        ]
      ]);
    }
  }
}
