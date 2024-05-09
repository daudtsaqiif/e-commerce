<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function index(){
        $category = Category::count();
        $product = Product::count();
        $user = User::where('role', 'user')->count();
        return view('pages.admin.index', compact('category', 'product', 'user'));
    }

    public function userList(){
        $user = User::where('role', 'user')->get();
        return view('pages.admin.userList', compact('user'));
    }

    public function resetPassword($id){
        try {
            $user = User::find($id);
            $user->password = Hash::make('password');
            $user->save();
            
            return redirect()->route('admin.userList')->with('success', 'Password has reset');
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->with('error', 'Password failed to reset');
            
        }
    }
}
