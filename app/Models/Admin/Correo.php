<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $table = "correo";
    protected $fillable = ['email', 'empresa_id'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
