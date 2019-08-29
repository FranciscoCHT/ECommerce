<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Accesorios perros" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label requerido">Estado</label>
    <div class="col-lg-8">
        <select class="form-control select2 required" style="width: 100%" data-error="Escoja un estado..." data-placeholder="Seleccione estado de la categoría..." name="estado" id="estado" required>
            <option value="" hidden disabled selected></option>
            <option value="1" @if (old('estado') == 1) selected="selected" @endif>Activa</option>
            <option value="0" @if (old('estado') == 0 && old('estado') != null) selected="selected" @endif>Inactiva</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="sku" class="col-lg-3 control-label requerido">SKU</label>
    <div class="col-lg-8">
        <input type="number" min="100" name="sku" id="sku" placeholder="Ej: 100, 401" class="form-control onlyNum" value="{{old('sku')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="col-lg-3 control-label">Descripción</label>
    <div class="col-lg-8">
        <textarea maxlength="200" name="descripcion" id="descripcion" class="form-control" placeholder="Describa la categoría..." autocomplete="off" style="resize: none;">{{old('descripcion')}}</textarea>
    </div>
</div>