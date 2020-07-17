<?php

/**
 *
 *
 */

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Http\Request;
use App\Http\Requests\CountryValidator;

use Validator;

class CountryController extends Controller
{
    public function country(){
        return response()->json(CountryModel::get(), 200);
    }

    public function countryById($id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Record Not Found!!"], 404);
        }
        return response()->json($country, 200);
    }

    /**
     * Method : Save in api.php
     * This method is used to Save data in _z_country table
     *
    */

    public function countrySave(Request $request){


        $rules = [
            'name' => 'required|min:3',
            'iso'  => 'required|min:2|max:3'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }

    /**
     * Method : Put in api.php
     * This method is used to update data in _z_country table
     *
    */

    public function countryUpdate(Request $request, $id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Record Not Found!!"], 404);
        }
        $country->update($request->all());
        return response()->json($country, 200);
    }

     /**
     * Method : Delete in api.php
     * This method is used to delete a record data in _z_country table
     *
    */

    public function countryDelete(Request $request, $id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Record Not Found!!"], 404);
        }
        $country->delete();
        return response()->json(null, 204);
    }
}
