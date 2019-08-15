<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control requerido" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label">Estado</label>
    <div class="col-lg-8">
        <input type="text" name="estado" id="estado" class="form-control onlyNum" value="{{old('estado')}}" autocomplete="off"/>
    </div>
</div>
