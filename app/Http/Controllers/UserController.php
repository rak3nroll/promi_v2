<?php

namespace App\Http\Controllers;

use App\Models\Promisorris;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
    public function showUserPromisorry(string $id)
    {
        $data = Promisorris::findOrFail($id);
        return view('update_promi',['Promisorris'=>$data])->with('title','ORMECO-Promisorry Potal | Update Records Promissory');
    }

    public function PrintPromi(string $id)
    {

        // $data = Promisorris::findOrFail($id);
        $data = DB::table('Promisorris')
        ->where('id','=',$id)
        ->get();

        // $users = DB::table('Promisorris')
        // ->join('Users','Promisorris.verified_by','=','Users.id')
        // ->select('Users.id','Users.name','Users.position', 'Promisorris.*')
        // ->get();  

        $users = DB::table('users')
        ->where('Promisorris.id','=',$id)
        ->Join('Promisorris', 'users.id', '=', 'Promisorris.verified_by')
        ->get();
      
        return view('print_promi',['Promisorris'=>$data,'users'=>$users])->with('title','ORMECO-Promisorry Potal | Print Promissory Note');
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
    public function updateUserPromisorry(Request $request,  string $id)
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

        // $promisorris->update($validate_request);

        return redirect('/home')->with('message', 'Data was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
