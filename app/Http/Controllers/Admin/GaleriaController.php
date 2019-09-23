<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionGaleria;
use App\Models\Admin\Galeria;

class GaleriaController extends Controller
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
    public function guardar(ValidacionGaleria $request)
    {
        // $input = Input::all();
		// $rules = array(
		//     'file' => 'image|max:3000',
		// );

		// $validation = Validator::make($input, $rules);

		// if ($validation->fails())
		// {
		// 	return Response::make($validation->errors->first(), 400);
		// }

		// $file = Input::file('file');

        // $extension = File::extension($file['name']);
        // $directory = path('public').'uploads/'.sha1(time());
        // $filename = sha1(time().time()).".{$extension}";

        // $upload_success = Input::upload('file', $directory, $filename);

        // if( $upload_success ) {
        // 	return Response::json('success', 200);
        // } else {
        // 	return Response::json('error', 400);
        // }
        $input = $request->all();
        return $input;
 
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
    public function actualizar(ValidacionGaleria $request, $id)
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
