<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionGaleria;
use App\Http\Requests\ValidacionImagen;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Galeria;
use App\Models\Admin\Imagen;
use App\Models\Admin\Producto;

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
        $input = $request->all();
        
        date_default_timezone_set('America/Santiago');
        $productoid = $request->get('producto_id');                         //Obtengo el ID del producto a crear galería
        $productname = Producto::where('id', $productoid)->pluck('nombre'); //Nombre del producto
        $galeria = Galeria::where('producto_id', $productoid)->exists();    //luego pregunto si existe galería para este producto.
        
        //$rules = array(                                                  // Validación de máximo 2mb, en caso de que Dropzone
        //    'file' => 'image|max:2000',                                  // no detecte el tamañp de la imagen y la deje pasar.
        //);
        //$files = $request->file('file');
        //foreach ($files as $file) {
        //    $validation = Validator::make($input, $rules);
        //    if ($validation->fails()) {
        //        return response()->json('errorLarge', 413);
        //    }
        //}

        if (!$galeria) {                                                    //De no existir, se crea la galería con sus datos
            $data = $request->except(['file']);                             //y se obtiene el ID del registro creado.
            $data['fecha_creacion'] = now();                                //Si ya existe, devolver mensaje de error 422.
            $galeriaid = Galeria::create($data)->id;
        } else {
            return response()->json('errorExists', 422);
        }

        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $destinationPath = public_path('imagenes\productGallery\\'.$productoid);
            //Storage::makeDirectory($destinationPath);
            foreach ($files as $file) {
                $contador = Imagen::count();
                $extension = $file->getClientOriginalExtension();
                $filename = $productname[0].'-'.$contador.'-'.date("Ymd");
                $originname = $file->getClientOriginalName();

                $dataImg['nombre'] = $filename;
                $dataImg['img'] = $filename.'.'.$extension;
                $dataImg['estado'] = 1;
                $dataImg['galeria_id'] = $galeriaid;
                $imagenid = Imagen::create($dataImg)->id;
                //$extension = $file->getClientOriginalExtension();
                //$filename = $name.".{$extension}";
                $file->move($destinationPath, $dataImg['img']);
            }
        }

        // foreach ($files as $file) {
        //     $extension = File::extension($file['name']);
        //     $directory = path('public').'uploads/'.sha1(time());
        //     $filename = sha1(time().time()).".{$extension}";
        // }
		// $rules = array(
		//      'file' => 'image|max:2000',
		// );

		// $validation = Validator::make($input, $rules);

		// if ($validation->fails())
		// {
		// 	return Response::make($validation->errors()->first(), 400);
		// }

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
        $input = $request->all();
        
        $productoid = $request->get('producto_id');                             //Obtengo el ID del producto a editar galería
        $productname = Producto::where('id', $productoid)->pluck('nombre');     //Nombre del producto
        $galeriaid = Galeria::where('producto_id', $productoid)->value('id');   //Obtengo el ID de la galería a editar
        $estadoGal = $request->get('estado');                                   //Obtengo el estado de la galería del formulario

        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $destinationPath = public_path('imagenes\productGallery\\'.$productoid);
            foreach ($files as $file) {
                $contador = Imagen::count();
                $extension = $file->getClientOriginalExtension();
                $filename = $productname[0].'-'.$contador.'-'.date("Ymd");
                $originname = $file->getClientOriginalName();

                $dataImg['nombre'] = $filename;
                $dataImg['img'] = $filename.'.'.$extension;
                $dataImg['estado'] = 1;
                $dataImg['galeria_id'] = $galeriaid;
                $imagenid = Imagen::create($dataImg)->id;
                $file->move($destinationPath, $dataImg['img']);
            }
        }

        date_default_timezone_set('America/Santiago');                              //Se actualiza la fecha de modificación
        Galeria::findOrFail($galeriaid)->update(['fecha_modificacion' => now()]);   //y el estado nuevo.
        Galeria::findOrFail($galeriaid)->update(['estado' => $estadoGal]);

        return Galeria::findOrFail($galeriaid);
 
    }

    public function getImagenes($id)
    {
        $idGaleria = Galeria::where('producto_id', $id)->orderBy('id', 'desc')->value('id');
        $imagenes = Imagen::where('galeria_id', $idGaleria)->orderBy('id', 'desc')->select('nombre','img')->get();
        if ($idGaleria != '') {
            return $imagenes;
        } else {
            abort(404, 'No existe galeria.');
        }
    }

    public function getInfoGaleria($id)
    {
        $galeria = Galeria::where('producto_id', $id)->with('productos')->first();
        if ($galeria != '') {
            return $galeria;
        } else {
            abort(404, 'No existe galeria.');
        }
        
    }

    public function eliminarImagen($name)
    {
        $id = Imagen::where('nombre', $name)->pluck('id');
        $imgname = Imagen::where('nombre', $name)->pluck('img');
        $idgaleria = Imagen::where('nombre', $name)->pluck('galeria_id');
        $idproducto = Galeria::where('id', $idgaleria)->pluck('producto_id');
        Imagen::destroy($id);
        unlink(public_path('imagenes\productGallery\\'.$idproducto[0].'\\'.$imgname[0]));
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
