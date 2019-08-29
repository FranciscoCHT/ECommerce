<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Cupon 12B" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="descuento" class="col-lg-3 control-label requerido">Descuento</label>
    <div class="col-lg-8">
    <input type="text" name="descuento" id="descuento" class="form-control precioMask" placeholder="$" value="{{old('descuento')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label">Estado</label>
    <div class="col-lg-8">
        <select class="form-control select2 required" style="width: 100%" data-error="Escoja un estado..." data-placeholder="Seleccione estado del cupón..." name="estado" id="estado" required>
            <option value="" hidden disabled selected></option>
            <option value="1" @if (old('estado') == 1) selected="selected" @endif>Activo</option>
            <option value="0" @if (old('estado') == 0 && old('estado') != null) selected="selected" @endif>Inactivo</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="fecha_inicio" class="col-lg-3 control-label">Fecha Inicio</label>
    <div class="col-lg-8 input-group date datetime" style="padding-left:15px;padding-right:15px;">
        <input type='text' class="form-control" placeholder="Seleccione fecha de inicio..." name="fecha_inicio" id="fecha_inicio" value="{{old('fecha_inicio')}}" autocomplete="off"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    {{-- <div class="col-lg-8">
        <input type="text" min="2000-01-01" max="2099-01-01" name="fecha_inicio" placeholder="Seleccione una fecha de inicio..." onfocus="(this.type='date')" onblur="(this.type='text')" id="fecha_inicio" class="form-control" value="{{old('fecha_inicio')}}" autocomplete="off" required/>
    </div> --}}
</div>
<div class="form-group">
    <label for="fecha_termino" class="col-lg-3 control-label">Fecha Término</label>
    <div class="col-lg-8 input-group date datetime" style="padding-left:15px;padding-right:15px;">
        <input type='text' class="form-control" placeholder="Seleccione fecha de término..." name="fecha_termino" id="fecha_termino" value="{{old('fecha_termino')}}" autocomplete="off"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    {{-- <div class="col-lg-8">
        <input type="text" min="2000-01-01T00:00:00" max="2099-01-01T00:00:00" placeholder="Seleccione una fecha de término..." onfocus="(this.type='datetime-local')" onblur="(this.type='text')" name="fecha_termino" id="fecha_termino" class="form-control" value="{{old('fecha_termino')}}" autocomplete="off"/>
    </div> --}}
</div>