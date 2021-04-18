<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\Guest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class BalanceController extends Controller
{
    public function all_balance()
    {
        $balances = Balance::all();
        // $balances = DB::select("SELECT balances.*, g.id AS guest_id, (g.phone_no) AS guest_phone
     //                            FROM balances
     //                            LEFT JOIN guests as g ON balances.guest_id = g.id");
        return view('balance.all_balance',compact('balances'));
    }

    public function createBalance()
    {
    	$guests = Guest::all();
        return view('balance.create_balance',compact('guests'));
    }

    public function StoreBalance(Request $request){

        if ($request->amount <= 0) 
        {
            return back()->with('failed','Your balance is negative, Please recheck your balance and submit again.');
        }

    	$this->validate($request,[
            'phone_number' => 'required',
            'amount' => 'required',
        ]);

         $balances = new Balance;
         $balances->guest_id = $request->guest_id;
         $balances->phone_number = $request->phone_number;
         $balances->amount = $request->amount;

         if ($balances->save()) {
            return back()->with('success','Balance Successfully saved.');
         }else{
             return back()->with('failed','Somthing Error Found, Please try again.');
         }
    }
}
