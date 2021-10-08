<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\Flat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DocumentRequestController extends Controller
{
    public function index ($id) {
        return Inertia::render('Flat/Document',
            ['flat' => Flat::findOrFail($id),
             'documentRequsets' => DocumentRequest::latest()->get()
            ]
        );
    }

    public function store (Request $request) {
        $this->validate($request, [
            "title" => "required",
        ]);

        DocumentRequest::create($request->all());
        return back();
    }
}
