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
            $cupons = Cupon::orderBy('id')->get();
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
            Cupon::create($request->all());
            return redirect('admin/cupon')->with('mensaje', 'Cupon creado exitosamente.');
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
            Cupon::findOrFail($id)->update($request->all());
            return redirect('admin/cupon')->with('mensaje', 'Cupon actualizado exitosamente.');
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
