<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCupon;
use App\Models\Admin\Cupon;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*$nombre, $pass = false*/)
        {
            $cupons = Cupon::orderBy('id', 'desc')->get();
            return view('admin.cupon.index', compact('cupons'));
            //return view('admin.cupon.index', ['cupons' => $cupons]); //Se pasa un array a laravel, pero para evitar esto
            //return view('cupons', compact('nombre', 'pass'));            //se usa compact, el cual hace y manda el array automaticamente. 
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function crear()
        {
            return view('admin.cupon.crear');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function guardar(ValidacionCupon $request)
        {   
            date_default_timezone_set('America/Santiago');
            if ($request->estado == '1') {
                $existeCuponActivo = Cupon::where('nombre', $request->nombre)->where('estado', 1)->exists();
                if ($existeCuponActivo) {
                    $request->flash();
                    return redirect('admin/cupon')->with('error', 'Ya existe un cupón activo con los datos proporcionados.');
                } else {
                    $data = request()->all();  
                    $data['fecha_creacion'] = now();
                    Cupon::create($data);
                }
            } else {
                $data = request()->all();  
                $data['fecha_creacion'] = now();
                Cupon::create($data);
            }
            return redirect('admin/cupon')->with('mensaje', 'Cupón creado exitosamente.');
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
            $cupons = Cupon::findOrFail($id); // O utilizar find(), pero no genera el 404 si no encuentra
            return view('admin.cupon.editar', compact('cupons'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function actualizar(ValidacionCupon $request, $id)
        {
            if ($request->estado == '1') {
                $existeCuponActivo = Cupon::where('nombre', $request->nombre)->where('estado', 1)->exists();
                if ($existeCuponActivo) {
                    return redirect('admin/cupon')->with('error', 'Ya existe un cupón activo de este registro a modificar.');
                } else {
                    Cupon::findOrFail($id)->update($request->all());
                }
            } else {
                Cupon::findOrFail($id)->update($request->all());
            }
            return redirect('admin/cupon')->with('mensaje', 'Cupón actualizado exitosamente.');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function eliminar(Request $request, $id)
        {
            if ($request->ajax()) {
                if (Cupon::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            } else {
                //abort(404);
            }
        }
}
