<?php

namespace App\Http\Controllers;

use App\Models\Promisorris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BillingUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data = Promisorris::findOrFail($id);
        return view('billing.update_promi', ['Promisorris' => $data])->with('title', 'ORMECO-Promisorry Potal | Update Records Promissory');
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
        DB::table('promisorris')
        ->where('id',$id)
        ->update(['is_posted' => '1', 'date_posted' => now()->toDateTimeString()]);

    return redirect('/home/billing')->with('message', 'Data was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
