<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    // use HasFactory;
    protected $fillable=['asunto','destinatario','cuerpo','user_id','estado'];

    public function job(){
        return $this->hasOne(Job::class, 'estado');
    }
}
