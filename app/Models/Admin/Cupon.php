<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $table = "cupon";
    protected $fillable = ['nombre', 'descuento', 'estado', 'fecha_creacion', 'fecha_inicio', 'fecha_termino'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
