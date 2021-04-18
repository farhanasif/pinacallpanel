<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;

    protected $table = 'hosts';

    // protected $fillable = [
    //     'firstname', 'lastname', 'email','latitude','nid_no', 'phone_no','bank_account','balance','password','longitude','nid_file'
    // ];
}
