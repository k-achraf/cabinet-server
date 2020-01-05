<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $primaryKey = 'day_id';

    public function month(){
        return $this->belongsTo('App\Month' , 'month_id');
    }
}
