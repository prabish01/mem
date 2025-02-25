<?php

namespace App;

use App\User;
use App\Model\Order;
use App\Model\ShippingDetails;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id','is_approved','pan_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_approved()
    {
        $value = $this->is_approved;
         if ($value == 1) {
             return true;
         }else {
             return false;
         }
         
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

      public function verifyUser()
    {
        return $this->hasOne('App\Model\VerifyUser');
    }

}
