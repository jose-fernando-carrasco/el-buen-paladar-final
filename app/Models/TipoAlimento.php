<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAlimento extends Model
{

    use HasFactory;

    protected $fillable = ['nombre'];

    public function alimentos(){
        return $this->hasMany('App\Models\Alimento');
    }
}
