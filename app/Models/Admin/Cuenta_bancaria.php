<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Cuenta_bancaria extends Model
{
    protected $table = "cuenta_bancaria";
    protected $fillable = ['nombre', 'tipo', 'numero_cuenta', 'banco', 'correo', 'rut', 'estado', 'empresa_id'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
