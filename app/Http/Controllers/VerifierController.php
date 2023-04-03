<?php

namespace App\Http\Controllers;

use App\Models\Promisorris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_promi_verifier')-> with('title','ORMECO-Promisorry Potal | Add New Promisorry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate_request = $request->validate([
            "consumer_name" => 'required',
            "consumer_address" =>'required',
            "consumer_contact" => 'required',
            "account_no" =>'required',
            "no_of_bills" =>'required',
            "total_balance" =>'required',
            "partial_payment" => 'required',
            "total_amount" =>'required',
            "months_to_pay" =>'required',
            "per_month" =>'required',
            "start_date" =>'required',
            "exp_date" =>'required',
            "recon_fee" => '',
            "tr_no_recon" => '',
            "surcharge" => '',
            "tr_no_surcharge" => '',
            "remarks" => '',
            "is_verified" => '',
            "is_approve" => '',
            "is_posted" => ''
        ]);
            Promisorris::create($validate_request);
        
            return redirect('/home/verifier');
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
