<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;
    protected $table = 'trips';

    protected $fillable = ['trip_from','trip_to','trip_type','passenger_name','email','surname',
    'passenger_phone','driver_id','trip_id','date','time','booking_date','booking_time','status',
    'day','month','year','dest_area','est_min','est_max','tickets','state','pay_status','airline_branch_id','total','pickup_address'];

}
