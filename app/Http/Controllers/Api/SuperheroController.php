<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Superhero;

class SuperheroController extends Controller
{
    public function index()
    {
        $superheroes = Superhero::all();
        return response()->json([
            'status'      => true,
            'message'     => 'Superheroes retrieved successfully',
            'superheroes' => $superheroes
        ]);
    }

    public function getSuperhero($id)
    {
        $superhero = Superhero::find($id);

        if ($superhero) {
            return response()->json([
                'status'     => true,
                'message'    => 'Superhero retrieved successfully',
                'superhero'  => $superhero
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Superhero not found'
            ], 404);
        }
    }

    public function createSuperhero(Request $request)
    {
        $superhero = Superhero::create([
            'name'        => $request->name,
            'real_name'   => $request->real_name,
            'gender'      => $request->gender,
            'universe_id' => $request->universe_id
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Superhero created successfully',
            'superhero' => $superhero
        ]);
    }

    public function updateSuperhero(Request $request, $id)
    {
        $superhero = Superhero::find($id);

        if ($superhero) {
            $superhero->name        = $request->name;
            $superhero->real_name   = $request->real_name;
            $superhero->gender      = $request->gender;
            $superhero->universe_id = $request->universe_id;
            $superhero->save();

            return response()->json([
                'status'    => true,
                'message'   => 'Superhero updated successfully',
                'superhero' => $superhero
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Superhero not found'
            ], 404);
        }
    }

    public function deleteSuperhero($id)
    {
        $superhero = Superhero::find($id);

        if ($superhero) {
            $superhero->delete();

            return response()->json([
                'status'  => true,
                'message' => 'Superhero deleted successfully'
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Superhero not found'
            ], 404);
        }
    }
}