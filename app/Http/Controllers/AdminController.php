<?php

namespace App\Http\Controllers;


use App\Data\Cars;
use App\Data\Services;
use App\Models\CarsModel;
use App\Models\IconsModel;
use App\Models\ServicesModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function redirect;

class AdminController extends Controller
{
  public function __construct(public Cars $cars, public Services $services)
  {
  }

  public function dashboard(): View
  {
    $total_data = CarsModel::query()
      ->get()->count();

    return view("admin/dashboard", [
      "title" => "Dashboard",
      "total_data" => $total_data
    ]);
  }

  public function data(): View
  {
    $cars = CarsModel::all();

    return \view("admin/data", [
      "title" => "Data Mobil | Data",
      "cars" => $cars
    ]);
  }

  public function postData(Request $request): Response
  {
    $search = $request->post("search");

    $cars = DB::table("cars_model")
      ->where(["merk" => $search])
      ->orWhere(["type" => $search])
      ->orWhere(["transmisi" => $search])
      ->get();

    return Response()
      ->view("admin/data", [
        "title" => "Data Mobil | Data",
        "cars" => $cars
      ]);
  }

  public function tambahMobil(): View
  {
    return \view("admin/tambahMobil", [
      "title" => "Data Mobil | Tambah",
      "message" => [
        "success" => null
      ]
    ]);
  }

  public function postTambahMobil(Request $request): Response|RedirectResponse
  {
    $cars = new Cars();
    $cars->id = null;
    $cars->brand = $request->post("brand", "Brand");
    $cars->type = $request->post("type", "Type");
    $cars->transmisi = $request->post("transmisi", null);
    $cars->harga = $request->post("harga", 0);
    $cars->harga_fullday = $request->post("harga_fullday", 0);
    $cars->deskripsi = $request->post("deskripsi", "Deskripsi");
    $cars->gambar = $request->file("gambar");

    $validator = Validator::make($request->all(), [
      "brand" => "required|max:255",
      "type" => "required|max:255",
      "transmisi" => "required",
      "deskripsi" => "required",
      "harga" => "required|numeric",
      "harga_fullday" => "required|numeric",
      "gambar" => "required|max:2000|mimes:jpg,png,jpeg"
    ], [
      "brand.required" => "Kolom Brand Diperlukan",
      "type.required" => "Kolom Type Mobil Diperlukan",
      "transmisi.required" => "Kolom Transmisi diperlukan",
      "deskripsi.required" => "Kolom Deskripsi Diperlukan",
      "harga.required" => "Kolom Harga diperlukan",
      "harga.numeric" => "Hanya boleh memasukan data number",
      "harga_fullday.required" => "Kolom Harga Fullday diperlukan",
      "harga_fullday.numeric" => "Hanya boleh memasukan data number",
      "gambar.required" => "Kolom gambar diperlukan",
      "gambar.max" => "Ukuran Gambar Terlalu Besar",
      "gambar.mimes" => "Hanya Boleh Mengirimkan gambar"
    ]);

    if ($validator->fails()) {
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput($request->all());
    }

    $cars->gambar->storePubliclyAs("pictures", $cars->gambar->hashName(), "public");

    CarsModel::query()
      ->insert([
        "merk" => $cars->brand,
        "type" => $cars->type,
        "transmisi" => $cars->transmisi,
        "harga" => $cars->harga,
        "harga_fullday" => $cars->harga_fullday,
        "deskripsi" => $cars->deskripsi,
        "gambar" => $cars->gambar->hashName()
      ]);

    return Response()->view("admin/tambahMobil", [
      "title" => "Data Mobil | Tambah",
      "message" => [
        "success" => "Data Berhasil Ditambah"
      ]
    ]);
  }

  public function update(Request $request, $id): View
  {
    $cars = CarsModel::query()
      ->where(["id_mobil" => $id])
      ->get();
    return View("admin/update", [
      "title" => "Data Mobil | Update",
      "cars" => $cars,
      "message" => [
        "success" => null
      ]
    ]);
  }

  public function postUpdate(Request $request): Response|RedirectResponse
  {
    $cars = $this->cars;
    $cars->id = (int)$request->post("id_mobil", null);
    $cars->brand = $request->post("brand", null);
    $cars->type = $request->post("type", null);
    $cars->harga = $request->post("harga", null);
    $cars->harga_fullday = $request->post("harga_fullday", null);
    $cars->transmisi = $request->post("transmisi", null);
    $cars->deskripsi = $request->post("deskripsi", null);
    $cars->gambar = $request->file("gambar") ?? $request->post("hidden_gambar");

    $validator = Validator::make($request->except(["id"]), [
      "brand" => "required",
      "type" => "required",
      "harga" => "required|numeric",
      "harga_fullday" => "required|numeric",
      "transmisi" => "required",
      "deskripsi" => "required",
      "gambar" => "image|min:500|max:4000"
    ], [
      "brand.required" => "Kolom Brand Tidak Boleh Kosong",
      "type.required" => "Kolom Type Tidak Boleh Kosong",
      "harga.required" => "Kolom Harga Tidak Boleh Kosong",
      "harga.numeric" => "Hanya Boleh Menginputkan Number",
      "harga_fullday.required" => "Kolom Harga Fullday tidak boleh kosong",
      "harga_fullday.numeric" => "Hanya Boleh Menginputkan Number",
      "transmisi.required" => "Kolom Transmisi Tidak Boleh Kosong",
      "deskripsi.required" => "Kolom Deskripsi Tidak Boleh Kosong",
      "gambar.image" => "Hanya Boleh Menginputkan Gambar",
      "gambar.min" => "Ukuran Gambar Terlalu Kecil Minimal > 500kb",
      "gambar.max" => "Ukuran Gambar Terlalu Besar Maksimal < 4MB"
    ]);

    if ($validator->fails()) {
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput($request->all());
    }

    if (is_object($cars->gambar)) {
      $cars->gambar->storePubliclyAs("pictures", $cars->gambar->hashName(), "public");
      $cars->gambar = $cars->gambar->hashName();
    }

    CarsModel::query()
      ->where(["id_mobil" => $cars->id])
      ->update([
        "merk" => $cars->brand,
        "type" => $cars->type,
        "harga" => $cars->harga,
        "harga_fullday" => $cars->harga_fullday,
        "transmisi" => $cars->transmisi,
        "deskripsi" => $cars->deskripsi,
        "gambar" => $cars->gambar
      ]);

    $cars = CarsModel::query()
      ->where(["id_mobil" => $cars->id])
      ->first();

    return \response()
      ->view("admin/update", [
        "title" => "Data Mobil | Update",
        "message" => [
          "success" => "Data Berhasil Dirubah"
        ],
        "cars" => $cars
      ]);
  }

  public function delete(Request $request, int $id): RedirectResponse
  {

    $table = CarsModel::query()
      ->where(["id_mobil" => $id])
      ->first();

    unlink("storage/pictures/" . $table->gambar);

    CarsModel::query()
      ->where(["id_mobil" => $id])
      ->delete();

    return redirect("/data");
  }

  public function listDataServices(): View
  {
    $dataServices = ServicesModel::all();
    return \view("admin/listServices", [
      "title" => "Admin | Tambah Services",
      "dataServices" => $dataServices
    ]);
  }

  public function listIconServices(): View
  {
    $icons = IconsModel::all();
    return view("admin/services", [
      "title" => "Admin | Services",
      "message" => [
        "success" => null
      ],
      "icons" => $icons
    ]);
  }


  public function addListServices(Request $request): Response|RedirectResponse
  {
    $this->services->icon = $request->post("icon");
    $this->services->title = $request->post("title");
    $this->services->description = $request->post("deskripsi");
    $icons = IconsModel::all();


    $validator = Validator::make($request->all(), [
      "icon" => "required|max:50",
      "title" => "required|max:50",
      "deskripsi" => "required"
    ]);


    if ($validator->fails()) {
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput($request->all());
    }

    ServicesModel::query()
      ->insert([
        "icon" => $this->services->icon,
        "title" => $this->services->title,
        "deskripsi" => $this->services->description
      ]);

    return \response()
      ->view("admin/services", [
        "title" => "Admin | Services",
        "message" => [
          "success" => "Data Berhasil Ditambah"
        ],
        "icons" => $icons
      ]);
  }

  public function dataServicesApi(Request $request, int $id): JsonResponse
  {
    $servicesData = DB::table("services")
      ->where(["id" => $id])
      ->first();
    if ($servicesData == null) {
      $data = [
        "status" => 404,
        "message" => "Data Tidak Ditemukan"
      ];
    } else {
      $data = [
        "status" => 200,
        "data" => [
          "icon" => $servicesData->icon,
          "title" => $servicesData->title,
          "description" => $servicesData->deskripsi
        ]
      ];
    }
    return \response()
      ->json($data, $data["status"]);
  }
}
