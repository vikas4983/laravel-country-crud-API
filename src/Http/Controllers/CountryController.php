<?php

namespace CountryList\Http\Controllers;

use CountryList\Models\Country;
use Illuminate\Http\Request;
use CountryList\Http\Requests\StoreCountryRequest;
use CountryList\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::all();
        return response()->json([
            'status' => true,
            'data' => $countries,
        ], 200);
    }
    public function store(StoreCountryRequest $request)
    {
        $validatedData = $request->validated();
        $country = Country::create($validatedData);
        return response()->json([
            'status' => true,
            'message' => 'Country created successfully.',
            'data' => $country,
        ], 200);
    }
    public function show($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json([
                'status' => false,
                'message' => 'Country not found.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $country,
        ], 200);
    }


    public function update(UpdateCountryRequest $request, $id)
    {
        $country = Country::find($id);

        if (!$country) {
            return response()->json([
                'status' => false,
                'message' => 'Country not found.',
            ], 404);
        }

        $country->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Country updated successfully.',
            'data' => $country,
        ], 200);
    }


    public function destroy($id)
    {
        $country = Country::find($id);

        if (!$country) {
            return response()->json([
                'status' => false,
                'message' => 'Country not found.',
            ], 404);
        }

        $country->delete();

        return response()->json([
            'status' => true,
            'message' => 'Country deleted successfully.',
        ], 200);
    }
}
