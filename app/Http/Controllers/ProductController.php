<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->where('name', 'LIKE', "%$request->q%")->paginate(10)->through(function ($product) {
            return [
                'id' => $product->id,
                'code' => $product->code,
                'name' => $product->name,
                'stock' => $product->stock,
                'shop_price' => $product->shop_price,
                'description' => $product->description
            ];
        });

        return Inertia::render('Products/Index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Products/Create', [
            'users' => User::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product($request->except('image'));

        if($request->hasFile('image')){
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->code = $this->generateUniqueCode();

        $product->save();

        return redirect()->route('products.edit', $product)->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => $product,
            'users' => User::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->input('type') == 'add'){
            $product->stock = $product->stock + (int)$request->stock;
        }

        if($request->hasFile('image')){
            Storage::disk('public')->delete($product->image);
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->update($request->except('image', 'stock'));

        return redirect()->route('products.edit', $product)->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('status', 'success');
    }

    public function generateUniqueCode()
    {
        do {
            $code = "LC".random_int(100000, 999999);
        } while (Product::where("code", "=", $code)->first());

        return $code;
    }
}
