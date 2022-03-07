<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicStoreController extends Controller
{
    public function index(){
        return Inertia::render('Store/Pages/Home',[
            'recommended' => Product::where('stock', '>=', '25')->get(),
            'most_popular' => Product::where('stock', '=', '1')->first(),
            'second_popular' => Product::where('stock', '>=', '2')->first(),
            'popular' => Product::where('stock', '>=', '5')->skip(1)->limit(2)->get()
        ]);
    }
}
