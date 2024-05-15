<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index(){
        $category = Category::select('id', 'name')->latest()->get();
        $product = Product::with('product_galleries');

        return view('pages.frontend.index', compact('category'));
    }
}
