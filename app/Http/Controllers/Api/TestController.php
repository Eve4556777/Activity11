<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Universe;

class TestController extends Controller
{
    public function index()
    {
        $universes = Universe::all();
        return response()->json([
            'test' => 'prueba',
            'universes' => $universes
        ]);
    }

    public function getUniverse($id)
    {
        $universe = Universe::find($id);

        if ($universe) {
            return response()->json([
                'status' => true,
                'message' => 'Universe retrieved successfully',
                'universe' => $universe
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Universe not found'
            ], 404);
        }
    }

    public function createUniverse(Request $request)
    {
        $universe = Universe::create([
            'universe'   => $request->universe,
            'company'    => $request->company,
            'age'        => $request->age,
            'new_column' => $request->new_column
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Universe created successfully',
            'universe' => $universe
        ]);
    }

    public function updateUniverse(Request $request, $id)
{
    $universe = Universe::find($id);

    if ($universe) {
        $universe->universe   = $request->universe;
        $universe->company    = $request->company;
        $universe->age        = $request->age;
        $universe->new_column = $request->new_column;
        $universe->save();

        return response()->json([
            'status'   => true,
            'message'  => 'Universe updated successfully',
            'universe' => $universe
        ]);
    } else {
        return response()->json([
            'status'  => false,
            'message' => 'Universe not found'
        ], 404);
    }
}

public function deleteUniverse($id)
{
    $universe = Universe::find($id);

    if ($universe) {
        $universe->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Universe deleted successfully'
        ]);
    } else {
        return response()->json([
            'status'  => false,
            'message' => 'Universe not found'
        ], 404);
    }
}

}