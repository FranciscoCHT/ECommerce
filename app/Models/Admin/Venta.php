<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "venta";
    protected $fillable = ['total', 'fecha_compra', 'estado', 'metodo_pago_id', 'usuario_id', 'numero_orden', 'numero_seguimiento'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function metodo_pago()
    {
        return $this->belongsTo(Metodo_pago::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_venta');
    }
}
