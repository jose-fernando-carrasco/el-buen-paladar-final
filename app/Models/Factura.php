<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'monto', 'nit', 'cuenta_id', 'user_id'];

    public function cuenta(){
        return $this->belongsTo('App\Models\Cuenta');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
