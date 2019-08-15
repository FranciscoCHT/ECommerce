<div class="form-group">
    <label for="descuento" class="col-lg-3 control-label requerido">Descuento</label>
    <div class="col-lg-8">
    <input type="text" name="descuento" id="descuento" class="form-control" value="{{old('descuento')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label">Estado</label>
    <div class="col-lg-8">
        <input type="text" name="estado" id="estado" class="form-control" value="{{old('estado')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="fecha_creacion" class="col-lg-3 control-label requerido">Fecha Creación</label>
    <div class="col-lg-8">
        <input type="date" min="2000-01-01" max="2099-01-01" name="fecha_creacion" id="fecha_creacion" class="form-control" value="{{old('fecha_creacion')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="fecha_termino" class="col-lg-3 control-label">Fecha Término</label>
    <div class="col-lg-8">
        <input type="datetime-local" min="2000-01-01T00:00:00" max="2099-01-01T00:00:00" name="fecha_termino" id="fecha_termino" class="form-control" value="{{old('fecha_termino')}}" autocomplete="off"/>
    </div>
</div>