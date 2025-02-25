<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShippingDetails extends Model
{
    protected $fillable = ['user_id','province','zone', 'district', 'city', 'street', 'phone_number'];


}
