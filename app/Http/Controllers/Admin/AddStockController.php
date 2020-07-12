<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionAddStock;
use App\Models\Admin\AddStock;
use App\Models\Admin\Producto;

class AddStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionAddStock $request)
    {
        $productos = $request->get('data');
        date_default_timezone_set('America/Santiago');
        $fecha = now();
        foreach($productos as $index => $producto){
            $index = $producto[0];
            $producto_id = $producto[1];
            $nombre = $producto[2];
            $precio = $producto[3];
            $cantidad = $producto[4];
            AddStock::create([
                'cantidad' => $cantidad,
                'fecha' => $fecha,
                'producto_id' => $producto_id,
                'usuario_id' => 1
            ]);
            Producto::findOrFail($producto_id)->update(['precio' => $precio]);
            Producto::findOrFail($producto_id)->increment('stock', $cantidad);
        }
        //return redirect('admin/producto')->with('mensaje', 'Stock añadido exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionAddStock $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        //
    }
}
