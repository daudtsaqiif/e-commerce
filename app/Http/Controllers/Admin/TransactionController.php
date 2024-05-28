<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaction = Transaction::With('user')->select('id','user_id', 'slug' , 'name', 'email', 'phone', 'status', 'total_price', 'payment_url', 'payment', 'address', 'courier')->latest()->get();

        return view('pages.admin.transaction.index' , compact('transaction'));
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
    public function store(Request $request)
    {
        //
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
        //get data section by id
       

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //get data transaction
        $transaction = Transaction::findOrFail($id);
        try {
            //code...
            $transaction->update([
                'status' => $request->status
            ]);
            return redirect()->route('admin.transaction.index')->with('success', 'Updated');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.transaction.index')->with('error', 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showTransactionUserByAdminWithSlugAndId($slug, $id){
        $transaction = Transaction::where('slug', $slug)->where('id', $id)->first();

        return view('pages.admin.transaction.show', compact('transaction'));
    }

}
