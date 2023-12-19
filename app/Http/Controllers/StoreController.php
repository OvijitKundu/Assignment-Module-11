<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $todaySales = $this->getSalesForDate(now());
        $yesterdaySales = $this->getSalesForDate(now()->subDay());
        $thisMonthSales = $this->getSalesForMonth(now());
        $lastMonthSales = $this->getSalesForMonth(now()->subMonth());

        return view('dashboard', compact('products', 'todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $product = Product::findOrFail($request->input('product_id'));
            $quantity = $request->input('quantity');

            $product->decrement('quantity', $quantity);

            Sale::create([
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        });

        return redirect()->route('dashboard')->with('success', 'Sale recorded successfully.');
    }

    private function getSalesForDate($date)
    {
        return Sale::whereDate('created_at', $date)->sum('quantity');
    }

    private function getSalesForMonth($date)
    {
        return Sale::whereYear('created_at', $date->year)
            ->whereMonth('created_at', $date->month)
            ->sum('quantity');
    }

}
