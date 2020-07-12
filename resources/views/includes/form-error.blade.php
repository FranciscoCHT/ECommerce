@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fadeopen">
        <button type="button" class="close cerrar" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> El formulario contiene errores.</h4>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>   
@endif