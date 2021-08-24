<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    // use HasFactory;
    public function country(){
        return $this->belongsTo(Country::class, 'province_id');
        // return $this->belongsTo(Supplier::class, 'supplier_ids', 'id');
        
    }

    public function city(){
        return $this->hasMany(City::class);
    }
}
