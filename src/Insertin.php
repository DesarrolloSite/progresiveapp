<?php

namespace DigitalsiteSaaS\Progresiveapp;

use Illuminate\Database\Eloquent\Model;

class Insertin extends Model{ 
 protected $table = 'insertos';
 public $timestamps = false;
 protected $fillable = [
 'capsula'
 ];
}