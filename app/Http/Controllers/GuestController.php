<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Balance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function create(){
        return view('guest.create_guest');
    }

    public function all_guest()
    {
    	$guests = Guest::all();
        // $guests = DB::table('guests as g')
        //            ->select('g.*', 'b.amount as balance_amount')
        //            ->join('balances as b','b.guest_id','=','g.id')
        //            ->get();
        //dd($guests);exit();
        return view('guest.all_guest',compact('guests'));
    }


    public function store(Request $request){
    	// dd($request->all());

        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:guests',
            'nid_no' => 'required',
            'phone_no' => 'required|min:11|numeric|unique:guests',
            'bank_account' => 'required',
            'balance' => 'required',
            'password' => 'required',
            'servicetype' => 'required',
        ]);

        if ($request->balance <= 0) 
        {
            return back()->with('failed','Your balance is negative, Please recheck your balance and submit again.');
        }

        // 2. data insert
        $guest = new Guest();
        $guest->firstname = $request->firstname;
        $guest->lastname = $request->lastname;
        $guest->email = $request->email;
        $guest->nid_no = $request->nid_no;
        $guest->phone_no = $request->phone_no;
        $guest->bank_account = $request->bank_account;
        $guest->balance = $request->balance;
        $guest->password = $request->password;
        $guest->servicetype = $request->servicetype;
        $guest->save();

    	if ($guest->save()) {
    		return back()->with('success','Guest data successfully saved!');
    	}
    	else{
    		return back()->with('failed','Somthing Error Found, Please try again.');
    	}

    }

   public function edit($id)
    {
        $guest = Guest::find($id);
         return view('guest.edit_guest', compact('guest'));
    }

   public function update(Request $request, $id)
    {
        if ($request->balance <= 0) 
        {
            return back()->with('failed','Your balance is negative, Please recheck your balance and submit again.');
        }
        
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'nid_no' => 'required',
            'phone_no' => 'required|min:11|numeric',
            'bank_account' => 'required',
            'balance' => 'required',
            'password' => 'required',
            'servicetype' => 'required',
        ]);

        try{
	        $guests = Guest::find($id);
	        $guests->firstname = $request->firstname;
	        $guests->lastname = $request->lastname;
	        $guests->email = $request->email;
	        $guests->nid_no = $request->nid_no;
	        $guests->phone_no= $request->phone_no;
	        $guests->bank_account= $request->bank_account;
	        $guests->balance= $request->balance;
	        $guests->password= $request->password;
            $guests->servicetype = $request->servicetype;

	    	if ($guests->save()) {
	    		return redirect()->back()->with('success','Guest successfully updated.');
	    	}
        }catch(\Exception $e){
			return back()->with('failed','Somthing Error Found, Please try again.');
        }
    }

   public function deleteGuest($id)
    {
        $guest = Guest::findOrFail($id);
        $balance = Balance::where('guest_id',$id);
        if($guest){
           $guestDelete = $guest->delete();
            if($guestDelete) {
               $balance->delete();
            }
            return redirect()->back()->with('success','Guest successfully deleted.');
        }else{
           return back()->with('failed','Somthing Error Found, Please try again.');
        }
    }
}
