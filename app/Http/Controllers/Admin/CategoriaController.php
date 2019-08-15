<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCategoria;
use App\Models\Admin\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*$nombre, $pass = false*/)
        {
            $categorias = Categoria::orderBy('id')->get();
            return view('admin.categoria.index', compact('categorias'));
            //return view('admin.categoria.index', ['categorias' => $categorias]); //Se pasa un array a laravel, pero para evitar esto
            //return view('categorias', compact('nombre', 'pass'));            //se usa compact, el cual hace y manda el array automaticamente. 
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function crear()
        {
            return view('admin.categoria.crear');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function guardar(ValidacionCategoria $request)
        {
            Categoria::create($request->all());
            return redirect('admin/categoria')->with('mensaje', 'Categoria creada exitosamente.');
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
            $categorias = Categoria::findOrFail($id); // O utilizar find(), pero no genera el 404 si no encuentra
            return view('admin.categoria.editar', compact('categorias'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function actualizar(ValidacionCategoria $request, $id)
        {
            Categoria::findOrFail($id)->update($request->all());
            return redirect('admin/categoria')->with('mensaje', 'Categoria actualizada exitosamente.');
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
                if (Categoria::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            } else {
                //abort(404);
            }
        }
}
