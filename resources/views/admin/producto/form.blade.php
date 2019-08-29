<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Coca Cola 1L" value="{{old('nombre')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="precio" class="col-lg-3 control-label requerido">Precio</label>
    <div class="col-lg-8">
        <input type="text" name="precio" id="precio" class="form-control precioMask" placeholder="$" value="{{old('precio')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="precio_oferta" class="col-lg-3 control-label">Precio Oferta</label>
    <div class="col-lg-8">
        <input type="text" name="precio_oferta" id="precio_oferta" class="form-control precioMask" placeholder="$" value="{{old('precio_oferta')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label requerido">Estado</label>
    <div class="col-lg-8">
        <select class="form-control select2search required" style="width: 100%" data-error="Escoja un estado..." data-placeholder="Seleccione estado del producto..." name="estado" id="estado" required>
            <option value="" hidden disabled selected></option>
            <option value="1" @if (old('estado') == 1) selected="selected" @endif>Activo</option>
            <option value="0" @if (old('estado') == 0 && old('estado') != null) selected="selected" @endif>Inactivo</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="stock" class="col-lg-3 control-label requerido">Stock</label>
    <div class="col-lg-8">
        <input type="number" name="stock" id="stock" class="form-control onlyNum" min="0" placeholder="Ingrese el stock del producto..." value="{{old('stock')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="categoria_id" class="col-lg-3 control-label requerido">Categoria</label>
    <div class="col-lg-8">
        {{-- <input type="text" name="categoria_id" id="categoria_id" class="form-control onlyNum" value="{{old('categoria_id')}}" autocomplete="off" required/> --}}
        <select class="form-control select2 required" style="width: 100%" data-error="Escoja una categoría..." data-placeholder="Seleccione una categoría..." name="categoria_id" id="categoria_id" required>
            <option value="" selected disabled hidden></option>
            @foreach($categorias as $id => $categoria)
                <option value="{{$id}}" @if (old('categoria_id') == $id) selected="selected" @endif>{{$categoria}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="col-lg-3 control-label">Descripción</label>
    <div class="col-lg-8">
        <textarea maxlength="200" name="descripcion" id="descripcion" class="form-control" placeholder="Describa el producto..." autocomplete="off" style="resize: none;">{{old('descripcion')}}</textarea>
    </div>
</div>