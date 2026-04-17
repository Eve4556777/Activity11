<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index() {

        if (auth()->user()->is_admin) {
            return view('testing');
        } else {
            abort(403, 'Acceso no autorizado');
        }
    }
}
