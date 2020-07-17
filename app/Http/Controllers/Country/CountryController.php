<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function country(){
        return response()->json(CountryModel::get(), 200);
    }
}
