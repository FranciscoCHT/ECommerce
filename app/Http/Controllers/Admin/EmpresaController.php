<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionEmpresa;
use App\Models\Admin\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*$nombre, $pass = false*/)
        {
            $empresas = Empresa::orderBy('id')->get();
            return view('admin.empresa.index', compact('empresas'));
            //return view('admin.empresa.index', ['empresas' => $empresas]); //Se pasa un array a laravel, pero para evitar esto
            //return view('empresas', compact('nombre', 'pass'));            //se usa compact, el cual hace y manda el array automaticamente. 
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function crear()
        {
            return view('admin.empresa.crear');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function guardar(ValidacionEmpresa $request)
        {
            Empresa::create($request->all());
            return redirect('admin/empresa')->with('mensaje', 'Empresa creado exitosamente.');
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
            $empresas = Empresa::findOrFail($id); // O utilizar find(), pero no genera el 404 si no encuentra
            return view('admin.empresa.editar', compact('empresas'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function actualizar(ValidacionEmpresa $request, $id)
        {
            Empresa::findOrFail($id)->update($request->all());
            return redirect('admin/empresa')->with('mensaje', 'Empresa actualizado exitosamente.');
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
                if (Empresa::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            } else {
                //abort(404);
            }
        }
}
