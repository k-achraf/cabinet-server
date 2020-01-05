<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pourcentage extends Model
{
    protected $primaryKey = 'pourcentage_id';

    protected $hidden = [
        'employe_id' , 'service_id'
    ];

    public function service(){
        return $this->belongsTo('App\Service' , 'service_id');
    }

    public function employe(){
        return $this->belongsTo('App\Employe' , 'employe_id');
    }
}
