@if (session("mensaje"))
    <div class="alert alert-success alert-dismissible fadeopen fadeclose cerrar" data-auto-dismiss="3000">
        <button type="button" class="close" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Mensaje del sistema</h4>
        <ul>
            <li>{{ session("mensaje") }}</li>
        </ul>
    </div>   
@endif