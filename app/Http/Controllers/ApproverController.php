<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApproverController extends Controller
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
        $validate_request = $request->validate([
            "consumer_name" => '',
            "consumer_address" =>'',
            "consumer_contact" => '',
            "account_no" =>'',
            "no_of_bills" =>'',
            "total_balance" =>'',
            "partial_payment" => '',
            "total_amount" =>'',
            "months_to_pay" =>'',
            "per_month" =>'',
            "start_date" =>'',
            "exp_date" =>'',
            "recon_fee" => '',
            "tr_no_recon" => '',
            "surcharge" => '',
            "tr_no_surcharge" => '',
            "remarks" => '',
            "is_verified" => '',
            "date_verified" => '',
            "is_approve" => '',
            "approve_date" => '',
            "is_posted" => '',
            "date_posted" => '',
            "encoder" => '',
            "district" => '',
        ]);
        
        DB::table('promisorris')
        ->where('id', $id)
        ->update($validate_request);
        
        return redirect('/admin/manage_user')->with('info', 'Data was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
