<?php

namespace CountryList\Http\Controllers;

use CountryList\Http\Requests\StoreCityRequest;
use CountryList\Http\Requests\UpdateCityRequest;


use CountryList\Models\City;
use Illuminate\Http\Request;


class CityController extends Controller
{

    public function index()
    {
        $city = City::all();
        return response()->json([
            'status' => true,
            'data' => $city,
        ], 200);
    }
    public function store(StoreCityRequest $request)
    {
        $validatedData = $request->validated();
        $city = City::create($validatedData);
        return response()->json([
            'status' => true,
            'message' => 'city created successfully.',
            'data' => $city,
        ], 200);
    }
    public function show($id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json([
                'status' => false,
                'message' => 'city not found.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $city,
        ], 200);
    }


    public function update(UpdateCityRequest $request, $id)
    {
        $city = City::find($id);

        if (!$city) {
            return response()->json([
                'status' => false,
                'message' => 'city not found.',
            ], 404);
        }
        $city->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'city updated successfully.',
            'data' => $city,
        ], 200);
    }


    public function destroy($id)
    {
        $city = City::find($id);

        if (!$city) {
            return response()->json([
                'status' => false,
                'message' => 'city not found.',
            ], 404);
        }

        $city->delete();

        return response()->json([
            'status' => true,
            'message' => 'city deleted successfully.',
        ], 200);
    }
}
