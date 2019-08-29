<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control requerido" placeholder="Ej: Transferencia, depósito" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label">Estado</label>
    <div class="col-lg-8">
        <select class="form-control select2 required" style="width: 100%" data-error="Escoja un estado..." data-placeholder="Seleccione estado del método de pago..." name="estado" id="estado" required>
            <option value="" hidden disabled selected></option>
            <option value="1" @if (old('estado') == 1) selected="selected" @endif>Activo</option>
            <option value="0" @if (old('estado') == 0 && old('estado') != null) selected="selected" @endif>Inactivo</option>
        </select>
    </div>
</div>
