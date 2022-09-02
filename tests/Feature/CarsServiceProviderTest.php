<?php

namespace Tests\Feature;

use App\Data\Cars;
use App\Http\Controllers\AdminController;
use App\Models\CarsModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarsServiceProviderTest extends TestCase
{
    private CarsModel $cars_model;
    private Cars $cars;

    public function testCarsModel(): void
    {
        $cars_1 =  $this->app->make(CarsModel::class);
        $cars_2 =  $this->app->make(CarsModel::class);

        self::assertSame($cars_1, $cars_2);
    }

    public function testCarsData(): void
    {
      $cars_1 = $this->app->make(Cars::class);
      $cars_2 = $this->app->make(Cars::class);

      self::assertSame($cars_1, $cars_2);
    }

    public function testAdminController(): void
    {
      $admin_1 = $this->app->make(AdminController::class);
      $admin_2 = $this->app->make(AdminController::class);

      self::assertSame($admin_1, $admin_2);
    }

}
