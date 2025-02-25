<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = ['applicants_name', 'applicants_email', 'applicants_address', 'gender', 'phone_number', 'applied_post', 'experience', 'message'];
}
