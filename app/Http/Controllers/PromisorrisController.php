<?php

namespace App\Http\Controllers;

use App\Models\Promisorris;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PromisorrisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Promisorris::all();

        return view('home',['promisorris' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPromisorry()
    {
        return view('create_promi')-> with('title','ORMECO-Promisorry Potal | Add New Promisorry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePromisorry(Request $request)
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
        ]);
            Promisorris::create($validate_request);
            
            return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function showPromisorry(string $id)
    {
        $data = Promisorris::findOrFail($id);
        return view('approver.update_promi',['Promisorris'=>$data])->with('title','ORMECO-Promisorry Potal | Update Records Promissory');
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
    public function updatePromisorry(Request $request, string $id)
    {
        DB::table('promisorris')
        ->where('id',$id)
        ->update(['is_approve' => '1', 'approve_date' => date('y-m-d', time())]);

        return redirect('/home/admin')->with('message', 'Data was successfully updated');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
