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
        $product = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->latest()->limit(8)->get();

        return view('pages.frontend.detail-product', compact('category', 'product'));
    }

    public function detailProduct($slug){
        $product = Product::with('product_galleries')->where('slug', $slug)->first();
        $category = Category::select('id', 'name')->latest()->get();    
        $recommendation = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->inRandomOrder()->limit(4)->get();

        return view('pages.frontend.detail-product', compact('product', 'category', 'recommendation'));
    }
}
