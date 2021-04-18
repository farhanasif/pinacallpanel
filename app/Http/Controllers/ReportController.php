<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;

class ReportController extends Controller
{
    public function call_record_report(){
        return view('report.call_record_report');
    }

    public function customer_report(){
        return view('report.customer_report');
    }

    public function rider_report(){
        return view('report.rider_report');
    }

    public function approve_settlement(){
    	return view('report.approve_settlement_request');
    }

    public function dateDiseReport(){
        $hosts=Host::all();
        return view('report.dateWiseReporte',compact('hosts'));
    }

    //print host date wise
    public function printHostReport(){
        return view('print_report.dateWiseHostReport');
    }


    public function monthWiseReport(){
        $hosts=Host::all();
        return view('report.monthWiseReporte',compact('hosts'));
    }

    //print host month wise
    public function printMonthWiseReport(){
        return view('print_report.printMonthWise_host');
    }
}
