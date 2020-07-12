<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Metodo_pago extends Model
{
    protected $table = "metodo_pago";
    protected $fillable = ['nombre', 'estado'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
