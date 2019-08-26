<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionOferta;
use App\Models\Admin\Oferta;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*$nombre, $pass = false*/)
        {
            $ofertas = Oferta::orderBy('id')->get();
            return view('admin.oferta.index', compact('ofertas'));
            //return view('admin.oferta.index', ['ofertas' => $ofertas]); //Se pasa un array a laravel, pero para evitar esto
            //return view('ofertas', compact('nombre', 'pass'));            //se usa compact, el cual hace y manda el array automaticamente. 
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function crear()
        {
            return view('admin.oferta.crear');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function guardar(ValidacionOferta $request)
        {
            Oferta::create($request->all());
            return redirect('admin/oferta')->with('mensaje', 'Oferta creado exitosamente.');
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
            $ofertas = Oferta::findOrFail($id); // O utilizar find(), pero no genera el 404 si no encuentra
            return view('admin.oferta.editar', compact('ofertas'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function actualizar(ValidacionOferta $request, $id)
        {
            Oferta::findOrFail($id)->update($request->all());
            return redirect('admin/oferta')->with('mensaje', 'Oferta actualizado exitosamente.');
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
                if (Oferta::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            } else {
                //abort(404);
            }
        }
}
