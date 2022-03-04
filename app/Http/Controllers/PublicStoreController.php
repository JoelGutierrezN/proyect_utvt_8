<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicStoreController extends Controller
{
    public function index(){
        return Inertia::render('Store/Pages/Home');
    }
}
