<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = "oferta";
    protected $fillable = ['porcentaje', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_termino'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'oferta_producto');
    }
}
