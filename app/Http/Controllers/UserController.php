<?php

namespace App\Http\Controllers;

use App\Data\User;
use App\Service\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
  public function __construct(private User $user, private UserService $user_service)
  {
  }

  public function login(): View
  {
    return view("user/login", [
      "title" => "Page | Login"
    ]);
  }

  public function postLogin(Request $request): View|RedirectResponse
  {

  }
}
