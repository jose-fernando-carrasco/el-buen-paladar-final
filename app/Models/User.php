<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use \Parental\HasChildren;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'fecha_de_nacimiento',
        'telefono',
        'direccion',
        'nit',
        'ci',
        'profesion',
        'estado',
        'email',
        'password',
        'type'
    ];
    protected $childTypes = [
        'Cajero' => App\Cajero::class,
        'Cliente' => App\Cliente::class,
        'Gerente' => App\Gerente::class,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function adminlte_image()
    {
        return auth()->user()->profile_photo_url;
    }

    public function reservas(){
        return $this->hasMany('App\Models\Reserva');
    }

    public function menus(){
        return $this->hasMany('App\Models\Menu');
    }

    public function ofertas_especiales(){
        return $this->hasMany('App\Models\OfertaEspecial');
    }
    public function facturas(){
        return $this->hasMany('App\Models\Fatura');
    }

    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }

    public function bitacoras(){
        return $this->hasMany('App\Models\Bitacora');
    }

}
