<?php

namespace App\Http\Controllers\Admin;

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
        $listempresas = Empresa::orderBy('id')->get();
        $empresas = $listempresas->first();
        if ($listempresas->isEmpty()) {
            $id = 0;
        } else {
            $id = $empresas->id;
        }
        return view('admin.empresa.index', compact('empresas', 'id'));
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
        if ($id == 0) {
            Empresa::create($request->all());
        } else {
            Empresa::findOrFail($id)->update($request->all());
        }
        return redirect('admin/empresa')->with('mensaje', 'Datos guardados exitosamente.');
    }
}
