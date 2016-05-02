<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    public function review(){
        return $this->hasMany('App\Models\review');
    }
}
