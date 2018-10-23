<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function rating(){
       return $this->hasOne(Rating::class, 'productId','id');
    }

    public function gethubDetails(){
        return $this->belongsTo(hub::class, 'hubId', 'id');
    }
}
