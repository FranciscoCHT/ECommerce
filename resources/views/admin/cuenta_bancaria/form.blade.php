<div class="form-group">
    <label for="rut" class="col-lg-3 control-label requerido">Rut</label>
    <div class="col-lg-8">
        <input type="text" name="rut" id="rut" class="form-control rutMask" placeholder="XX.XXX.XXX-X" value="{{old('rut')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Cuenta 12B" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="tipo" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-8">
        <select class="form-control select2 required" style="width: 100%" data-error="Escoja un tipo..." data-placeholder="Seleccione tipo de cuenta..." name="tipo" id="tipo" required>
            <option value="" hidden disabled selected></option>
            <option value="Cuenta corriente" @if (old('tipo') == "Cuenta corriente") selected="selected" @endif>Cuenta corriente</option>
            <option value="Cuenta vista" @if (old('tipo') == "Cuenta vista") selected="selected" @endif>Cuenta vista</option>
            <option value="Chequera electrónica" @if (old('tipo') == "Chequera electrónica") selected="selected" @endif>Chequera electrónica</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="numero_cuenta" class="col-lg-3 control-label requerido">N° cuenta</label>
    <div class="col-lg-8">
        <input type="text" name="numero_cuenta" id="numero_cuenta" class="form-control onlyNum" maxlength="25" placeholder="Ej: 123456789012" value="{{old('numero_cuenta')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="banco" class="col-lg-3 control-label requerido">Banco</label>
    <div class="col-lg-8">
        <input type="text" name="banco" id="banco" class="form-control" placeholder="Ej: Banco de Chile, BCI" value="{{old('banco')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="correo" class="col-lg-3 control-label">Correo</label>
    <div class="col-lg-8">
        <input type="email" name="correo" id="correo" placeholder="correo@dominio.cl" class="form-control" value="{{old('correo')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label">Estado</label>
    <div class="col-lg-8">
        <select class="form-control select2 required" style="width: 100%" data-error="Escoja un estado..." data-placeholder="Seleccione estado de la cuenta..." name="estado" id="estado" required>
            <option value="" hidden disabled selected></option>
            <option value="1" @if (old('estado') == 1) selected="selected" @endif>Activa</option>
            <option value="0" @if (old('estado') == 0 && old('estado') != null) selected="selected" @endif>Inactiva</option>
        </select>
    </div>
</div>