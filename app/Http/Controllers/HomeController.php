<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\ServicesModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
  public function index(Request $request): View|RedirectResponse
  {
    if(session()->has("id")) {
      dd("OK");
    }

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
