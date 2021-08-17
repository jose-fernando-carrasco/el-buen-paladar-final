<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'dia', 'estado', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function alimentos(){
        return $this->belongsToMany('App\Models\Alimento');
    }
}
