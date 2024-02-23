<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest; 
use App\Models\Category; 
use App\Models\Product; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB; 
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('products/index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    { 
        return Inertia::render('products/create', ['categories' => Category::all()]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request) 
    { 
        try { 
            $product = DB::transaction(function () use ($request) { 
                $product = Product::create($request->validated());
                $categories = $request->get('categories'); 
                $product->categories()->sync($categories); 
            });  
            return redirect()->back(); 
        } catch (\Exception $e) { 
            return redirect()->back()->withErrors(''); 
        } 
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
