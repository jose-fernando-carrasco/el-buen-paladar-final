<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'total', 'tipo'];

    public function historial(){
        return $this->hasMany('App\Models\Historial');
    }

    public function factura(){
        return $this->hasOne('App\Models\Factura');
    }

    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }
}
