<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $primaryKey = 'service_id';

    public function pourcentages(){
        return $this->hasMany('App\Pourcentage' , 'service_id');
    }
}
