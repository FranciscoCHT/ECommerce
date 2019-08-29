<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCorreo;
use App\Models\Admin\Correo;
use App\Models\Admin\Empresa;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*$nombre, $pass = false*/)
        {
            $correos = Correo::with('empresa')->orderBy('id', 'desc')->get();
            $empresas = Empresa::orderBy('id')->pluck('nombre', 'id')->toArray();
            return view('admin.correo.index', compact('correos', 'empresas'));
            //return view('admin.correo.index', ['correos' => $correos]); //Se pasa un array a laravel, pero para evitar esto
            //return view('correos', compact('nombre', 'pass'));            //se usa compact, el cual hace y manda el array automaticamente. 
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function crear()
        {
            return view('admin.correo.crear');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function guardar(ValidacionCorreo $request)
        {
            $listempresas = Empresa::orderBy('id')->get();
            $empresas = $listempresas->first();
            if ($listempresas->isEmpty()) {
                $request->flash();
                return redirect('admin/correo')->with('error', 'Los datos de la empresa no han sido configurados. Debe commpletarlos para la creación de correos.');
            } else {
                $data = request()->all();  
                $data['empresa_id'] = $empresas->id;
                Correo::create($data);
            }
            return redirect('admin/correo')->with('mensaje', 'Cuenta bancaria creada exitosamente.');
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
            $correos = Correo::findOrFail($id); // O utilizar find(), pero no genera el 404 si no encuentra
            return view('admin.correo.editar', compact('correos'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function actualizar(ValidacionCorreo $request, $id)
        {
            Correo::findOrFail($id)->update($request->all());
            return redirect('admin/correo')->with('mensaje', 'Correo actualizado exitosamente.');
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
                if (Correo::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            } else {
                //abort(404);
            }
        }
}
