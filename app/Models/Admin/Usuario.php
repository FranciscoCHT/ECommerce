<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuario";
    protected $fillable = ['nombre', 'tipo', 'email', 'apellido', 'rut'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
