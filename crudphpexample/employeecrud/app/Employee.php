<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $fillable = ['fname', 'lname', 'mname','gender_id','address','birthdate','suffix_id'];


}   
