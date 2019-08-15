<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="precio" class="col-lg-3 control-label requerido">Precio</label>
    <div class="col-lg-8">
        <input type="text" name="precio" id="precio" class="form-control onlyNum" value="{{old('precio')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="precio_oferta" class="col-lg-3 control-label">Precio Oferta</label>
    <div class="col-lg-8">
        <input type="text" name="precio_oferta" id="precio_oferta" class="form-control onlyNum" value="{{old('precio_oferta')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label requerido">Estado</label>
    <div class="col-lg-8">
        <input type="text" name="estado" id="estado" class="form-control onlyNum" value="{{old('estado')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="stock" class="col-lg-3 control-label requerido">Stock</label>
    <div class="col-lg-8">
        <input type="text" name="stock" id="stock" class="form-control onlyNum" value="{{old('stock')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="categoria_id" class="col-lg-3 control-label requerido">Categoria</label>
    <div class="col-lg-8">
        <input type="text" name="categoria_id" id="categoria_id" class="form-control onlyNum" value="{{old('categoria_id')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="col-lg-3 control-label">Descripción</label>
    <div class="col-lg-8">
        <textarea maxlength="200" name="descripcion" id="descripcion" class="form-control" autocomplete="off" style="resize: none;">{{old('descripcion')}}</textarea>
    </div>
</div>