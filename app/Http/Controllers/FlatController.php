<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FlatController extends Controller
{
    public function create (Request $request) {
        $this->validate($request, [
            "name" => "required",
        ]);

        Flat::create($request->all());
        return back();
    }

    public function index() {

        return Inertia::render('Dashboard',
            ['flutes' => Flat::latest()->get()]
        );
    }

    public function show($id) {

        return Inertia::render('Flat/Index',
            ['flat' => Flat::findOrFail($id)]
        );
    }
}
