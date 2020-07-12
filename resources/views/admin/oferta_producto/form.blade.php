<div class="form-group">
    <div class="col-sm-12">
        <label for="oferta" class="control-label requerido">Oferta</label>
    </div>
    <div class="col-sm-7">
        <select class="form-control required" name="oferta" id="oferta" required>
            @foreach($ofertas as $id => $oferta)
                <option value="{{$id}}" @if (old('oferta') == $id) selected="selected" @endif>{{$oferta}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <div style="padding-left:15px;">
        <label for="producto" class="control-label requerido">Producto</label>
    </div>
    <div style="display:flex;">
        <div class="col-sm-6" style="-webkit-column-count: 1;-webkit-column-width: 2000px;">
            <select class="form-control select2 required" data-error="Escoja un producto..." data-placeholder="Seleccione un producto..." name="producto" id="producto" required>
                <option value="" selected disabled hidden></option>
                @foreach($productos as $producto)
                    <option value="{{$producto->id}}" @if (old('producto') == $producto->id) selected="selected" @endif>{{$producto->nombre}} - {{str_limit($producto->descripcion, 50, '...')}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-1" style="padding-left:0px;display: inline-block;">
            <button type="button" class="btn btn-success btn-sm" style="width:100%" data-toggle="modal" data-target="#modalCrear" id="open">
                <i class="fa fa-fw fa-plus"></i>
            </button>
        </div>
    </div>
</div>