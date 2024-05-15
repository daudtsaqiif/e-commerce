<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index(){
        $category = Category::select('id', 'name')->latest()->get();

        return view('pages.frontend.index', compact('category'));
    }
}
