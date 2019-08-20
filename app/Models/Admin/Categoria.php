<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categoria";
    protected $fillable = ['nombre', 'descripcion', 'estado', 'sku'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
