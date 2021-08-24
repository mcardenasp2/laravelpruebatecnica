<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // use HasFactory;
    public function user(){
        return $this->hasMany(User::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
        // return $this->belongsTo(Supplier::class, 'supplier_ids', 'id');
        
    }
}
