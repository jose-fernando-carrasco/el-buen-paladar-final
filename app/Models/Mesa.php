<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad', 'ubicacion', 'mesaable_id', 'mesaable_type'];

    public function mesaable(){
        return $this->morphTo();
    }
}
