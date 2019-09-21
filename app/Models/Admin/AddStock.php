<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AddStock extends Model
{
    protected $table = "addstock";
    protected $fillable = ['cantidad', 'fecha', 'producto_id', 'usuario_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
