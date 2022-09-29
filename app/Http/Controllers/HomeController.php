<?php

namespace App\Http\Controllers;

use App\Data\Cars;
use App\Models\CarsModel;
use App\Models\ServicesModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
  public function index(): View
  {
    $servicesList = ServicesModel::all();
    return \view("home/home", [
      "title" => "Page | Home",
      "servicesList" => $servicesList
    ]);
  }

  public function about(): View
  {
    return view("about/index", [
      "title" => "Page | About"
    ]);
  }

  public function dataMobil(): View
  {
    $dataMobil = CarsModel::all();
    return view("data/list-mobil", [
      "title" => "Page | List Mobil",
      "dataMobil" => $dataMobil
    ]);
  }
}
