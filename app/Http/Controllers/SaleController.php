<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
        ]);

        $sale = new Sale();
        $sale->product_name = $request->input('product_name');
        $sale->quantity = $request->input('quantity');
        $sale->amount = $request->input('amount');
        $sale->save();

        return redirect('/dashboard')->with('success', 'Sale added successfully');
    }

}
