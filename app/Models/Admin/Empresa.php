<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    protected $fillable = ['nombre', 'razon_social', 'telefono', 'direccion', 'rut', 'tipo'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
