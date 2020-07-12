<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Usuario_sistema extends Model
{
    protected $table = "usuario_sistema";
    protected $fillable = ['nombre', 'apellido', 'password', 'correo', 'tipo', 'estado'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
