<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $primaryKey = 'employe_id';

    public function pourcentages(){
        return $this->hasMany('App\Pourcentage' , 'employe_id');
    }
}
