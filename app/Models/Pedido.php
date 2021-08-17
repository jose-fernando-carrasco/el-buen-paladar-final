<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'estado', 'mesa', 'user_id', 'cuenta_id'];

  

    public function mesas(){
        return $this->morphMany('App\Models\Mesa', 'mesaable');
    }


    public function alimentos(){
        return $this->belongsToMany('App\Models\Alimento');
    }

    public function cuenta(){
        return $this->belongsTo('App\Models\Cuenta');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
