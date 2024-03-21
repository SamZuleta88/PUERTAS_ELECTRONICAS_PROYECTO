<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function materiales()  {
        return $this->belongsToMany('App\Models\Material', 'materials_productos');
    }

    public function cotizaciones()  {
        return $this->hasMany('App\Models\Cotizacion');
    }

}
