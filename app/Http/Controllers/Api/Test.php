<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Universe;

class Test extends Controller
{
    public function index()
    {
        $universes = Universe::all();
    }
}
