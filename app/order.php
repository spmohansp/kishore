<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    
    public function products(){
        return $this->belongsTo(product::class, 'productId');
    }

    public function rating(){
       return $this->belongsTo(Rating::class, 'productId','productId');
    }
}
