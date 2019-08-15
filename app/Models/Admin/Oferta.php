<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = "oferta";
    protected $fillable = ['porcentaje', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_termino'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
