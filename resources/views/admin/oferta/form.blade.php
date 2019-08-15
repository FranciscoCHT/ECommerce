<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="porcentaje" class="col-lg-3 control-label requerido">Porcentaje</label>
    <div class="col-lg-8">
        <input type="number" step="0.1" name="porcentaje" id="porcentaje" class="form-control" value="{{old('porcentaje')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="fecha_inicio" class="col-lg-3 control-label">Fecha Inicio</label>
    <div class="col-lg-8">
        <input type="datetime-local" min="2000-01-01T00:00:00" max="2099-01-01T00:00:00" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{old('fecha_inicio')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="fecha_termino" class="col-lg-3 control-label">Fecha Término</label>
    <div class="col-lg-8">
        <input type="datetime-local" min="2000-01-01T00:00:00" max="2099-01-01T00:00:00" name="fecha_termino" id="fecha_termino" class="form-control" value="{{old('fecha_termino')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="col-lg-3 control-label">Descripción</label>
    <div class="col-lg-8">
        <textarea maxlength="200" name="descripcion" id="descripcion" class="form-control" autocomplete="off" style="resize: none;">{{old('descripcion')}}</textarea>
    </div>
</div>