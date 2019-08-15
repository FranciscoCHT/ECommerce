<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label requerido">Estado</label>
    <div class="col-lg-8">
        <input type="text" name="estado" id="estado" class="form-control onlyNum" value="{{old('estado')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="sku" class="col-lg-3 control-label requerido">SKU</label>
    <div class="col-lg-8">
        <input type="text" name="sku" id="sku" class="form-control onlyNum" value="{{old('sku')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="col-lg-3 control-label">Descripción</label>
    <div class="col-lg-8">
        <textarea maxlength="200" name="descripcion" id="descripcion" class="form-control" autocomplete="off" style="resize: none;">{{old('descripcion')}}</textarea>
    </div>
</div>