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

        DB::connection('mysql_second')->table('promissory_note')->insert([
            'promi_name'=>'consumer_name',
            'consumer_address' => 'consumer_address',
            'total_amount' => 'total_amount',
            'is_posted' => '1'
        ]);
        
            return redirect('/home')->with('info','New Promisorry Submited Successfully!');
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

        DB::connection('mysql_second')->table('promissory_note')
        ->where('promi_id',$id)
        ->update(['is_posted' => '1']);

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
