<?php

namespace CountryList\Http\Controllers;

use CountryList\Http\Requests\StoreStateRequest;
use CountryList\Http\Requests\UpdateStateRequest;
use CountryList\Models\State;
use Illuminate\Http\Request;


class StateController extends Controller
{

    public function index()
    {
        $state = State::all();
        return response()->json([
            'status' => true,
            'data' => $state,
        ], 200);
    }
    public function store(StoreStateRequest $request)
    {
        $validatedData = $request->validated();
        $state = State::create($validatedData);
        return response()->json([
            'status' => true,
            'message' => 'State created successfully.',
            'data' => $state,
        ], 200);
    }
    public function show($id)
    {
        $state = State::find($id);
        if (!$state) {
            return response()->json([
                'status' => false,
                'message' => 'state not found.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $state,
        ], 200);
    }


    public function update(UpdateStateRequest $request, $id)
    {
        $state = State::find($id);

        if (!$state) {
            return response()->json([
                'status' => false,
                'message' => 'state not found.',
            ], 404);
        }
        $state->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'state updated successfully.',
            'data' => $state,
        ], 200);
    }


    public function destroy($id)
    {
        $state = State::find($id);

        if (!$state) {
            return response()->json([
                'status' => false,
                'message' => 'state not found.',
            ], 404);
        }

        $state->delete();

        return response()->json([
            'status' => true,
            'message' => 'state deleted successfully.',
        ], 200);
    }
}
