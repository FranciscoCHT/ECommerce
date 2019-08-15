<div class="form-group">
    <label for="rut" class="col-lg-3 control-label requerido">Rut</label>
    <div class="col-lg-8">
        <input type="text" name="rut" id="rut" class="form-control validaRut" value="{{old('rut')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="razon_social" class="col-lg-3 control-label">Razón social</label>
    <div class="col-lg-8">
        <input type="text" name="razon_social" id="razon_social" class="form-control" value="{{old('razon_social')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="telefono" class="col-lg-3 control-label requerido">Teléfono</label>
    <div class="col-lg-8">
        <input type="text" name="telefono" id="telefono" class="form-control onlyNum" value="{{old('telefono')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="direccion" class="col-lg-3 control-label">Direccion</label>
    <div class="col-lg-8">
        <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label">Tipo</label>
    <div class="col-lg-8">
        <input type="text" name="tipo" id="tipo" class="form-control" value="{{old('tipo')}}" autocomplete="off"/>
    </div>
</div>