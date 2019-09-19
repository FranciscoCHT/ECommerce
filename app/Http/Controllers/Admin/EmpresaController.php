<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionEmpresa;
use App\Models\Admin\Empresa;
use Illuminate\Support\Facades\File;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*$nombre, $pass = false*/)
    {
        $listempresas = Empresa::orderBy('id', 'desc')->get();
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
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $name = 'logo'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/imagenes/empresa');
                File::delete(File::glob(public_path() . '/imagenes/empresa/logo.*'));
                $image->move($destinationPath, $name);

                $data = $request->except('logo');
                $data['logo'] = $name;
                Empresa::create($data);
            } else {
                $data = $request->except('logo');
                Empresa::create($data);
            }
        } else {
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $name = 'logo'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/imagenes/empresa');
                File::delete(File::glob(public_path() . '/imagenes/empresa/logo.*'));
                $image->move($destinationPath, $name);

                $data = $request->except('logo');
                $data['logo'] = $name;
                Empresa::findOrFail($id)->update($data);
            } else {
                $data = $request->except('logo');
                Empresa::findOrFail($id)->update($data);
            }

            // if(\File::exists(public_path('upload/bio.png'))){
            //     \File::delete(public_path('upload/bio.png'));
            // }else{
            //     dd('File does not exists.');
            // }
        }
        return redirect('admin/empresa')->with('mensaje', 'Datos guardados exitosamente.')/*->with('pathLogo', $name)*/;
    }

    public static function getLogo()
    {
        $listempresas = Empresa::orderBy('id', 'desc')->get();
        $empresas = $listempresas->first();
        if ($listempresas->isEmpty()) {
            return 'placeholder.png';
        } else {
            return $empresas->logo;
        }
    }
}
