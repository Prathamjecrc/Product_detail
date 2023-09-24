<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all(); // Retrieve all products (adjust the query as needed)

        return view('products', ['products' => $products]);// Assuming 'products' is the name of your Blade view
    }
    
    public function filterProducts(Request $request)
{
    
    $query = Product::query()->with('category');

    // Apply filters based on request parameters

    if ($request->has('name')) {
        $query->where('product_name', 'like', '%' . $request->input('name') . '%');
    }

    if ($request->has('category')) {
        // Assuming category_id is the foreign key relationship
        $query->whereHas('category', function ($subQuery) use ($request) {
            $subQuery->where('category_name', $request->input('category'));
        });
    }

    if ($request->has('brand')) {
        $brands = $request->input('brand');
        $query->whereIn('brand', $brands);
    }

    $filteredProducts = $query->get();
 
    return response()->json($filteredProducts);
}

    
}
