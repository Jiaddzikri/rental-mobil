<?php

namespace Tests\Feature;

use App\Data\UserRequest;
use App\Exceptions\UserValidationException;
use App\Service\UserService;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
   private UserService $user_service;
   private UserRequest $request;

    protected function setUp(): void
    {
      parent::setUp();

      $this->user_service = $this->app->make(UserService::class);

      $this->request = $this->app->make(UserRequest::class);
    }

    public function testTrue(): void
    {
      self::assertTrue(true);
    }

    public function testLoginSuccess(): void
    {
      $this->request->username = "usertest";
      $this->request->email = null;
      $this->request->password = "test";

      $login = $this->user_service->postLogin($this->request);

      self::assertEquals($this->request->username, $login->username);
      self::assertTrue(password_verify($this->request->password, $login->password));
    }

    public function testLoginUsernameEmpty(): void
    {
      $this->expectException(UserValidationException::class);

      $this->request->username = null;
      $this->request->password = "test";

      $login = $this->user_service->postLogin($this->request);

      self::assertNull($login);
    }

    public function testLoginUserNotFound(): void
    {
      $this->expectException(UserValidationException::class);

      $this->request->username = "notfound";
      $this->request->password = "test";

      $login = $this->user_service->postLogin($this->request);

      self::assertNull($login);
    }

    public function testLoginPasswordWrong(): void
    {
      $this->expectException(UserValidationException::class);

      $this->request->username = "usertest";
      $this->request->password = "salah";

      $login = $this->user_service->postLogin($this->request);

      self::assertNull($login);
    }


}
