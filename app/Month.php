<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $primaryKey = 'month_id';

    public function days(){
        return $this->hasMany('App\Day' , 'month_id');
    }
}
