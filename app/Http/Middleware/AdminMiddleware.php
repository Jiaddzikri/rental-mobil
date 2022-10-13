<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminMiddleware
{
  public function handle(Request $request, Closure $next)
  {
    $admin = $request->session()->has("admin");
    $isAdmin = $request->session()->has("isAdmin");

    if (!$admin && !$isAdmin) {
      return redirect("/");
    }
    return $next($request);
  }
}
