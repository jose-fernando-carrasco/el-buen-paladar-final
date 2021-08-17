<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use \Parental\HasChildren;
    use HasFactory;

    protected $fillable = ['nombre', 'imagen', 'descripcion', 'precio', 'tipo_alimento_id' ,'type'];

    protected $childTypes = [
        'Bebida' => App\Bebida::class,
        'PlatoFuerte' => App\PlatoFuerte::class,
        'Sopa' => App\Sopa::class,
        'Ensalada' => App\Ensalada::class,
        'Postre' => App\Postre::class,
    ];

    public function menus(){
        return $this->belongsToMany('App\Models\Menu')->withTimestamps();
    }

    public function ofertas_especiales(){
        return $this->belongsToMany('App\Models\OfertaEspecial')->withTimestamps();
    }

    public function pedidos(){
        return $this->belongsToMany('App\Models\Pedido')->withTimestamps();
    }
    public function tipo_alimento(){
        return $this->belongsToMany('App\Models\TipoAlimento')->withTimestamps();
    }
}
