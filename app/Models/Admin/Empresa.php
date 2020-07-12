<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    protected $fillable = ['nombre', 'razon_social', 'telefono', 'direccion', 'rut', 'tipo', 'logo'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function correos()
    {
        return $this->hasMany(Correo::class);
    }

    public function cuentas_bancarias()
    {
        return $this->hasMany(Cuenta_bancaria::class);
    }
}
