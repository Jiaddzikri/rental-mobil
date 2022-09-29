<?php

namespace App\Providers;

use App\Data\User;
use App\Data\UserRequest;
use App\Data\UserResponse;
use App\Http\Controllers\UserController;
use App\Service\implementations\UserServiceImplementations;
use App\Service\UserService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{

  public function provides()
  {
    return [User::class, UserController::class, UserService::class];
  }

  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->singleton(User::class, function () {
      return new User();
    });

    $this->app->singleton(UserRequest::class, function() {
      return new UserRequest();
    });

    $this->app->singleton(UserResponse::class, function() {
      return new UserResponse();
    });

    $this->app->singleton(UserService::class, function($app) {
      return new UserServiceImplementations($app->make(UserResponse::class));
    });

    $this->app->singleton(UserController::class, function ($app) {
      return new UserController($app->make(UserRequest::class), $app->make(UserService::class));
    });

  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
