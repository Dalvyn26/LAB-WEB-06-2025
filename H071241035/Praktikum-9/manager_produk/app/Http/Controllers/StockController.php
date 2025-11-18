<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\Product;
use App\Models\ProductsWarehouses;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedWarehouseId = $request->input('warehouse_id');
        
        // Get all warehouses for the filter dropdown
        $warehouses = Warehouse::all();
        
        // Get stock data based on selected warehouse or all warehouses
        $stocks = ProductsWarehouses::with(['product', 'warehouse', 'product.category', 'product.productDetail'])
            ->when($selectedWarehouseId, function ($query, $warehouseId) {
                return $query->where('warehouse_id', $warehouseId);
            })
            ->get();
        
        return view('stocks.index', compact('stocks', 'warehouses', 'selectedWarehouseId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouses = Warehouse::all();
        $products = Product::with('category')->get();
        return view('stocks.create', compact('warehouses', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'warehouse_id' => 'required|exists:warehouses,id',
            'product_id' => 'required|exists:products,id',
            'quantity_change' => 'required|integer' // Can be positive (add) or negative (remove)
        ]);

        $quantityChange = $request->quantity_change;

        // Check if the product already exists in the warehouse
        $stock = ProductsWarehouses::where('warehouse_id', $request->warehouse_id)
                                  ->where('product_id', $request->product_id)
                                  ->first();

        if ($quantityChange < 0) {
            // For negative quantity changes, ensure we don't go below 0
            $currentQuantity = $stock ? $stock->quantity : 0;
            if ($currentQuantity + $quantityChange < 0) {
                return redirect()->back()->withErrors(['quantity_change' => 'Cannot reduce stock below zero.']);
            }
        }

        if ($stock) {
            // Update existing stock
            $newQuantity = $stock->quantity + $quantityChange;
            if ($newQuantity < 0) {
                $newQuantity = 0; // Prevent negative stock
            }
            $stock->update(['quantity' => $newQuantity]);
        } else {
            // Only create new stock record if quantity is positive
            if ($quantityChange > 0) {
                ProductsWarehouses::create([
                    'warehouse_id' => $request->warehouse_id,
                    'product_id' => $request->product_id,
                    'quantity' => $quantityChange
                ]);
            } else {
                return redirect()->back()->withErrors(['quantity_change' => 'Cannot create negative stock. Product must exist in warehouse first.']);
            }
        }

        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
