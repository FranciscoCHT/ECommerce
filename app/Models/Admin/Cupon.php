<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $table = "cupon";
    protected $fillable = ['descuento', 'estado', 'fecha_creacion', 'fecha_termino'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
