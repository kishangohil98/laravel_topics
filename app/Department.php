<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = array('dept_name', 'dept_type');
    //public $timestamps = true;

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

}
