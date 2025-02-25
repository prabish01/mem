<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Slider extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = ['title','show','image'];
}
