<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curd extends Model
{
    //curds table 
    protected $fillable = ['Name','Address','Phone','Email'];
}
