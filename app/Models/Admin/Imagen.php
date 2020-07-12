<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "imagen";
    protected $fillable = ['nombre', 'img', 'estado', 'galeria_id'];
    protected $guarded = ['id'];
    public $timestamps = false; 
    
    public function galeria()
    {
        return $this->belongsTo(Galeria::class);
    }
}
