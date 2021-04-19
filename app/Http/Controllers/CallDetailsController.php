<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Balance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CallDetailsController extends Controller
{
    public function callDetails(){
        return view('report.callDetails');
    }
}
