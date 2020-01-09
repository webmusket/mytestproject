<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategory;

class Item extends Model
{
    public  function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcat_id');
    }
}
