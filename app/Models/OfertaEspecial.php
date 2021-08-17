<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class OfertaEspecial extends Model
{
    use HasFactory;

    public function getFechaInicioAttribute($date)
    {
        if (is_null($date)) {
            return null;
        } else {
            return Carbon::parse($date)->format('d-m-Y');
        }
    }
    public function getFechaFinalAttribute($date)
    {
        if (is_null($date)) {
            return null;
        } else {
            return Carbon::parse($date)->format('d-m-Y');
        }
    }
    protected $fillable = ['nombre', 'estado', 'fecha_inicio', 'fecha_final', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function alimentos()
    {
        return $this->belongsToMany('App\Models\Alimento');
    }
}
