<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha' , 'hora', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function mesas(){
        return $this->morphMany('App\Models\Mesa', 'mesaable');
    }
}
