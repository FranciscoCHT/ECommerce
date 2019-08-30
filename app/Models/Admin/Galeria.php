<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = "galeria";
    protected $fillable = ['fecha_creacion', 'fecha_modificacion', 'estado', 'producto_id'];
    protected $guarded = ['id'];
    public $timestamps = false; 
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
}
