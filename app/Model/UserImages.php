<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class UserImages extends Model
{
    protected $fillable = ['user_id','image_name'];
    public function imageUser()
    {
         return $this->belongsTo(User::class, 'user_id');
    }
}
