<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function all_service(){
    	$services = Service::all();
        return view('service.all_service',compact('services'));
    }

    public function create_service(){
    	return view('service.create_service');
    }

    public function store_service(Request $request){
    	// dd($request->all());

        $this->validate($request,[
            'type' => 'required'
        ]);

        $services = new Service;
        $services->type = $request->type;

    	if ($services->save()) {
    		return redirect()->back()->with('success','Service added successfully!');
    	}
    	else{
    		return redirect()->back()->with('failed','Service not inserted!');
    	}

    }

   public function edit_service($id)
    {
        $service = Service::find($id);
         return view('service.edit_service', compact('service'));
    }

   public function update_service(Request $request, $id)
    {
        $this->validate($request,[
            'type' => 'required',
        ]);

        $services = Service::find($id);
        $services->type = $request->type;

    	if ($services->save()) {
    		return redirect()->back()->with('success','Service updated successfully!');
    	}
    	else{
    		return redirect()->back()->with('failed','Service not updated!');
    	}
    }

   public function delete_service($id)
    {
        $service = Service::find($id);
        if($service){
            $service->delete();
            return redirect()->back()->with('success','Service deleted successfully!');
        }else{
            return redirect()->back()->with('failed','Service not deleted!');
        }
    }
}
