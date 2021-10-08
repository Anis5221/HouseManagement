<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    public function index ($id) {
        return Inertia::render('Flat/Invoice',
            ['flat' => Flat::findOrFail($id),
             'invoies' => Invoice::latest()->get()
            ]
        );
    }

    public function store (Request $request) {

        foreach ($request->all() as $items) {
            Invoice::create([
                'flat_id' => $items['flat_id'],
                'name' => $items['name'],
                'qty' => $items['qty'],
                'unit_price' => $items['unit_price'],
                'service_charge' => $items['service_charge'],
                'total_price' => ($items['qty']*$items['unit_price'])+$items['service_charge'],
            ]);
        }

        return back();
    }
    public function update (Request $request) {

        $invoice = Invoice::findOrFail($request->id);
        $invoice->update([
            'name' => $request->name,
            'qty' => $request->qty,
            'unit_price' => $request->unit_price,
            'service_charge' => $request->service_charge,
            'total_price' => $request->total_price,
        ]);

        return back();
    }

    public function delete ($id) {
        Invoice::findOrFail($id)->delete();
        return back();
    }
}
