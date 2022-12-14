<?php

namespace Tests\Feature;

use App\Data\Cars;
use App\Http\Controllers\AdminController;
use App\Models\CarsModel;
use Faker\Core\File;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
  private AdminController $admin_controller;

  protected function setUp(): void
  {
    parent::setUp(); // TODO: Change the autogenerated stub
    $this->admin_controller = $this->app->make(AdminController::class);
  }

  public function testDashboard(): void
  {
    $this->get("/dashboard")
      ->assertSeeText("Dashboard")
      ->assertSeeText("ArhamTrans");
  }

  public function testData(): void
  {
    $this->get("/data")
      ->assertSee("Data Mobil")
      ->assertSeeText("ArhamTrans")
      ->assertSeeText("Home");
  }

  public function testTambahData(): void
  {
    $this->get("/data/tambah")
      ->assertSeeText("Tambah Mobil")
      ->assertSeeText("Data Mobil")
      ->assertSeeText("Tambah Data Mobil")
      ->assertSeeText("Brand")
      ->assertSeeText("Type")
      ->assertSeeText("Harga")
      ->assertSeeText("Harga Fullday")
      ->assertSeeText("Transmisi...")
      ->assertSeeText("Deskripsi")
      ->assertSeeText("Pilih Gambar Mobil...x`");
  }

  public function testPostTambahData(): void
  {
    $file = \Illuminate\Http\UploadedFile::fake()->image("one.jpg");
    $this->post("/data/tambah", [
      "brand" => "Toyota",
      "type" => "Supra",
      "transmisi" => "AT",
      "harga" => 1000,
      "harga_fullday" => 10000,
      "deskripsi" => "erereweufheugneugherugfgnghr",
      "gambar" => $file
    ])->assertSeeText("Data Berhasil ditambah");
  }

  public function testPostTambahDataFailed(): void
  {
    $file = \Illuminate\Http\UploadedFile::fake()->image("one.jpg");
    $this->post("/data/tambah", [

      "brand" => "",
      "type" => "",
      "transmisi" => "",
      "harga" => "",
      "harga_fullday" => "",
      "deskripsi" => "",
      "gambar" => ""
    ])->assertRedirect("http://localhost");
  }

  public function testPostData(): void
  {
    $this->post("/data", [
      "search" => "Mazda"
    ])->assertSeeText("Data Mobil");
  }

  public function testUpdatePage(): void
  {
    $this->get("/data/update/20")
      ->assertSeeText("Update")
      ->assertSeeText("Update Data Mobil");
  }

  public function testPostUpdatePage(): void
  {
    $image = \Illuminate\Http\UploadedFile::fake()->image("att.jpg");
    $this->post("/data/update", [
      "id_mobil" => 1,
      "brand" => "Toyota",
      "type" => "Supra",
      "harga" => 3000000,
      "harga_fullday" => 5900000,
      "transmisi" => "AT",
      "deskripsi" => "Mobil Mahal",
      "gambar" => $image
    ])->assertSeeText("Data Berhasil diubah");
  }

  public function testPostUpdateColumnEmpty(): void
  {
    $this->post("/data/update", [
      "id_mobil" => "",
      "brand" => "",
      "type" => "",
      "harga" => "",
      "harga_fullday" => "",
      "transmisi" => "",
      "deskripsi" => "",
      "gambar" => ""
    ])->assertRedirect("http://localhost");
  }

  public function testDeleteData(): void
  {
    $gambar = \Illuminate\Http\UploadedFile::fake()
      ->image("image.jpg");
    $this->post("/data/tambah", [
      "brand" => "Toyota",
      "type" => "Supra",
      "harga" => 10000,
      "harga_fullday" => 2000000,
      "transmisi" => "MT",
      "deskripsi" => "Lorem Ipsum",
      "gambar" => $gambar
    ]);

    $this->get("/data/delete/14");

    $find = CarsModel::query()
      ->where(["id_mobil" => 14])
      ->get();

    self::assertTrue(true);
  }

  public function testAdminListServices(): void
  {
    $this->get("/admin/services")
      ->assertSeeText("Admin | Services");
  }

}
