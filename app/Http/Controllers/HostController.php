<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Host;
use File;
use Image;
use Illuminate\Support\Facades\Hash;

class HostController extends Controller
{
    public function create(){
        return view('host.create_host');
    }



    public function all_host(){
    	$hosts = Host::all();
        return view('host.all_host',compact('hosts'));
    }


    public function hostStore(Request $request){
    	//dd($request->all());
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:guests',
            'nid_no' => 'required',
            'phone_no' => 'required|min:11|numeric',
            'bank_account' => 'required',
            'balance' => 'required',
            'nid_file' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'password' => 'required',
            'servicetype' => 'required',
        ]);

        // 2. data insert
        $host = new Host;
        $host->firstname = $request->firstname;
        $host->lastname = $request->lastname;
        $host->email = $request->email;
        $host->latitude = $request->latitude;
        $host->nid_no = $request->nid_no;
        $host->phone_no = $request->phone_no;
        $host->bank_account = $request->bank_account;
        $host->balance = $request->balance;
        $host->password = $request->password;
        $host->longitude = $request->longitude;
        $host->servicetype = $request->servicetype;
        //dd($request->all());
       if ($request->hasFile('nid_file')){
            $photo = $request->file('nid_file');
            $filename = time().".".$photo->getClientOriginalExtension();
            $destination_path = public_path('upload/file/');
            $photo->move($destination_path,$filename);
            $host->nid_file = $filename;
            //dd($host->nid_file);
        }
        //dd($host);
        $host->save();

    	if ($host->save()) {
    		return redirect()->back()->with('success','Host data added successfully!');
    	}
    	else{
    		return redirect()->back()->with('failed','Host not Added!');
    	}

    }

   public function edit($id)
    {
        $host = Host::find($id);
         return view('host.edit_host', compact('host'));
    }

   public function update(Request $request, $id)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'nid_no' => 'required',
            'phone_no' => 'required|min:11|numeric',
            'bank_account' => 'required',
            'balance' => 'required',
            'password' => 'required',
            // 'latitude' => 'required',
            // 'longitude' => 'required',
        ]);

        $hosts = Host::find($id);
        //dd($request->all());
        $hosts->firstname = $request->firstname;
        $hosts->lastname = $request->lastname;
        $hosts->email = $request->email;
        $hosts->latitude = $request->latitude;
        $hosts->nid_no = $request->nid_no;
        $hosts->phone_no = $request->phone_no;
        $hosts->bank_account = $request->bank_account;
        $hosts->balance = $request->balance;
        $hosts->password = $request->password;
        $hosts->longitude = $request->longitude;
        $hosts->servicetype = $request->servicetype;

        //dd($request->all());

        //$previous_image=Host::where('id',$hosts->id)->first();
       // if ($request->hasFile('nid_file')){
       //          unlink(public_path('upload/file/'.$hosts->nid_file));
       //          $hosts->delete();
       //      }
       //      $image = $request->file('nid_file');
       //      $filename = time().".".$image->getClientOriginalExtension();
       //      $destination_path = public_path('upload/file',$filename);
       //      $image->move($destination_path,$filename);
       //  $hosts->nid_file=$filename;
        //For Single Image Upload
        $singleFile = $request->file('nid_file');

        if ($singleFile) {
            $i = 0;
            $singleFileEx = $singleFile->getClientOriginalExtension();
            $singleFileName = time().$i. '.'.$singleFileEx;

            
            $destination_path = public_path('upload/file');
            $singleFile->move($destination_path,$singleFileName);

            if ($hosts->nid_file) {
               
                if(file_exists('upload/file/'.$hosts->nid_file) AND !empty($hosts->nid_file)){
                    unlink('upload/file/'.$hosts->nid_file);
                    // dd("OK");
                }
            }
            $hosts->nid_file = $singleFileName;
        }
        else{
            $hosts->nid_file = $hosts->nid_file;
        }

        $hosts->save();
    	if ($hosts->save()) {
    		return redirect()->back()->with('success','Host data updated successfully!');
    	}
    	else{
    		return redirect()->back()->with('failed','Host not updated!');
    	}
    }

   public function deleteHost($id)
    {
        $host = Host::find($id);
        if($host){
            $host->delete();
            return redirect()->back()->with('success','Host data deleted successfully!');
        }else{
            return redirect()->back()->with('failed','Host not deleted!');
        }
    }
}
