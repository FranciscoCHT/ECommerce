<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="porcentaje" class="col-lg-3 control-label requerido">Porcentaje (%)</label>
    <div class="col-lg-8">
        <input type="text" name="porcentaje" id="porcentaje" class="form-control porcentajeMask" placeholder="0 % ~ 100 %" value="{{old('porcentaje')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="fecha_inicio" class="col-lg-3 control-label">Fecha Inicio</label>
    <div class="col-lg-8 input-group date datetime" style="padding-left:15px;padding-right:15px;">
        <input type='text' class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{old('fecha_inicio')}}" autocomplete="off"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
<div class="form-group">
    <label for="fecha_termino" class="col-lg-3 control-label">Fecha Término</label>
    <div class="col-lg-8 input-group date datetime" style="padding-left:15px;padding-right:15px;">
        <input type='text' class="form-control" name="fecha_termino" id="fecha_termino" value="{{old('fecha_termino')}}" autocomplete="off"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label">Estado</label>
    <div class="col-lg-8">
        <select class="form-control" name="estado" id="estado">
            <option value="" hidden disabled selected>Seleccione estado de la oferta...</option>
            <option value="0" @if (old('estado') == 0 && old('estado') != null) selected="selected" @endif>Inactiva</option>
            <option value="1" @if (old('estado') == 1) selected="selected" @endif>Activa</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="col-lg-3 control-label">Descripción</label>
    <div class="col-lg-8">
        <textarea maxlength="200" name="descripcion" id="descripcion" class="form-control" placeholder="Describa la oferta..." autocomplete="off" style="resize: none;">{{old('descripcion')}}</textarea>
    </div>
</div>