<div class="form-group">
    <label for="rut" class="col-lg-3 control-label requerido">Rut</label>
    <div class="col-lg-8">
        <input type="text" name="rut" id="rut" class="form-control rutMask" placeholder="XX.XXX.XXX-X" value="{{old('rut')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Juan" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="apellido" class="col-lg-3 control-label requerido">Apellido</label>
    <div class="col-lg-8">
        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ej: Perez" value="{{old('apellido')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-lg-3 control-label requerido">Email</label>
    <div class="col-lg-8">
        <input type="email" name="email" id="email" placeholder="correo@dominio.cl" placeholder="correo@dominio.cl" class="form-control" value="{{old('email')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-8">
        <select class="form-control select2 required" style="width: 100%" data-error="Escoja tipo de usuario..." data-placeholder="Seleccione tipo de usuario..." name="tipo" id="tipo" required>
            <option value="" hidden disabled selected></option>
            <option value="Cliente" @if (old('tipo') == "Cliente") selected="selected" @endif>Cliente</option>
            <option value="Vendedor" @if (old('tipo') == "Vendedor") selected="selected" @endif>Vendedor</option>
        </select>
    </div>
</div>