<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha', 'descripcion', 'cuenta_id'];

    public function cuenta(){
        return $this->belongsTo('App\Models\Cuenta');
    }
}
