<?php

namespace Tests\Feature;

use App\Data\UserRequest;
use App\Data\UserResponse;
use App\Http\Controllers\UserController;
use App\Service\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceProviderTest extends TestCase
{
    private UserService $user_service;
    private UserController $user_controller;
    private UserRequest $request;
    private UserResponse $response;

    protected function setUp(): void
    {
      parent::setUp(); // TODO: Change the autogenerated stub

      $this->user_service = $this->app->make(UserService::class);
      $this->user_controller = $this->app->make(UserController::class);
      $this->request = $this->app->make(UserRequest::class);
      $this->response = $this->app->make(UserResponse::class);
    }

    public function testSample(): void
    {
      self::assertTrue(true);
    }
}


