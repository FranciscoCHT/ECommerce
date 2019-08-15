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
    <label for="apellido" class="col-lg-3 control-label requerido">Apellido</label>
    <div class="col-lg-8">
        <input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-lg-3 control-label requerido">Email</label>
    <div class="col-lg-8">
        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label">Tipo</label>
    <div class="col-lg-8">
        <input type="text" name="tipo" id="tipo" class="form-control onlyNum" value="{{old('tipo')}}" autocomplete="off"/>
    </div>
</div>