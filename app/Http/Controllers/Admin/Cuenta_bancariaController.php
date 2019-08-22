<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCuenta_bancaria;
use App\Models\Admin\Cuenta_bancaria;
use App\Models\Admin\Empresa;

class Cuenta_bancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*$nombre, $pass = false*/)
        {
            $cuenta_bancarias = Cuenta_bancaria::with('empresa')->orderBy('id')->get();
            $empresas = Empresa::orderBy('id')->pluck('nombre', 'id')->toArray();
            return view('admin.cuenta_bancaria.index', compact('cuenta_bancarias', 'empresas'));
            //return view('admin.cuenta_bancaria.index', ['cuenta_bancarias' => $cuenta_bancarias]); //Se pasa un array a laravel, pero para evitar esto
            //return view('cuenta_bancarias', compact('nombre', 'pass'));            //se usa compact, el cual hace y manda el array automaticamente. 
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function crear()
        {
            return view('admin.cuenta_bancaria.crear');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function guardar(ValidacionCuenta_bancaria $request)
        {
            Cuenta_bancaria::create($request->all());
            return redirect('admin/cuenta_bancaria')->with('mensaje', 'Cuenta bancaria creada exitosamente.');
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
            $cuenta_bancarias = Cuenta_bancaria::findOrFail($id); // O utilizar find(), pero no genera el 404 si no encuentra
            return view('admin.cuenta_bancaria.editar', compact('cuenta_bancarias'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function actualizar(ValidacionCuenta_bancaria $request, $id)
        {
            Cuenta_bancaria::findOrFail($id)->update($request->all());
            return redirect('admin/cuenta_bancaria')->with('mensaje', 'Cuenta bancaria actualizada exitosamente.');
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
                if (Cuenta_bancaria::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            } else {
                //abort(404);
            }
        }
}
