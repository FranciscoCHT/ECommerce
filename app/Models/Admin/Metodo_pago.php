<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Metodo_pago extends Model
{
    protected $table = "metodo_pago";
    protected $fillable = ['nombre', 'estado'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
