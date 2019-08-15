<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "producto";
    protected $fillable = ['nombre', 'descripcion', 'fecha_modificacion', 'precio_oferta', 'precio', 'estado', 'stock', 'categoria_id'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
