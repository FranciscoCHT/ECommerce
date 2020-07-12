@if (session("mensaje"))
    <div class="alert alert-success alert-dismissible fadeopen fadeclose cerrar" data-auto-dismiss="3000">
        <button type="button" class="close" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Acción exitosa</h4>
        <ul>
            <li>{{ session("mensaje") }}</li>
        </ul>
    </div>   
@endif

@if (session("error"))
    <div class="alert alert-error alert-dismissible fadeopen fadeclose cerrar" data-auto-dismiss="10000">
        <button type="button" class="close" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> No se pudo completar operación</h4>
        <ul>
            <li>{{ session("error") }}</li>
        </ul>
    </div>   
@endif