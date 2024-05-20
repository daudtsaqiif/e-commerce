<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->latest()->limit(8)->get();

        return view('pages.frontend.index', compact('category', 'product'));
    }

    public function detailProduct($slug)
    {
        $product = Product::with('product_galleries')->where('slug', $slug)->first();
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $recommendation = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->inRandomOrder()->limit(4)->get();

        return view('pages.frontend.detail-product', compact('product', 'category', 'recommendation'));
    }

    public function detailCategory($slug)
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $categories = Category::where('slug', $slug)->first();
        $product = Product::with('product_galleries')->where('category_id', $categories->id)->get();

        return view('pages.frontend.detail-category', compact('category', 'categories', 'product'));
    }

    public function cart(){
        $category = Category::select('id', 'name', 'slug');
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();

        return view('pages.frontend.cart', compact('category', 'cart'));
    }

    public function addToCart(Request $request, $id){
        try {
            Cart::create([
                'product_id' => $id,
                'user_id' => auth()->user()->id
            ]);
            return redirect()->route('cart');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }

    public function deleteCart($id){
        try {
            Cart::findOrFail($id)->delete();

            return redirect()->route('cart');
        } catch (\Exception $e) {
            // dd($e->getMessage())
            return redirect()->back();
        }
    }
}
