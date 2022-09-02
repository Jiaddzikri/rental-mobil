<?php

namespace App\Models;

use App\Data\Cars;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CarsModel extends Model
{
    use HasFactory;

    protected $table = "cars_model";
    public $primaryKey = "id_mobil";

}
