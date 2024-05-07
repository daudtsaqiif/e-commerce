<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProducGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $product =Product::findOrFail($id);
        $gallery = $product->product_galleries;

        // dd($product);

        return view('pages.admin.product.gallery.index', compact('product', 'gallery'));

        // dd($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        //
        try {
            
            $files = $request->file('files');

            foreach ($files as $file){
                //upload gambar(image)
                $file->storeAs('public/product/gallery', $file->hashName());

                $product->product_galleries()->create([
                    'products_id' => $product->id,
                    'image' => $file->hashName()
                ]);
            }

            return redirect()->route('admin.product.gallery.index', $product->id )->with('success','Berhasil di buat');


        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.product.gallery.index', $product->id )->with('error', 'Gagal!');
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
