<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "producto";
    protected $fillable = ['nombre', 'descripcion', 'fecha_modificacion', 'precio_oferta', 'precio', 'estado', 'stock', 'imgPrincipal', 'categoria_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function ofertas()
    {
        return $this->belongsToMany(Oferta::class, 'oferta_producto');
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'detalle_venta');
    }
}
