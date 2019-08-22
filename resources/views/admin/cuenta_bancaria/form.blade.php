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
    <label for="tipo" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-8">
        <input type="text" name="tipo" id="tipo" class="form-control" value="{{old('tipo')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="numero_cuenta" class="col-lg-3 control-label requerido">N° cuenta</label>
    <div class="col-lg-8">
        <input type="text" name="numero_cuenta" id="numero_cuenta" class="form-control" value="{{old('numero_cuenta')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="banco" class="col-lg-3 control-label requerido">Banco</label>
    <div class="col-lg-8">
        <input type="text" name="banco" id="banco" class="form-control" value="{{old('banco')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="correo" class="col-lg-3 control-label">Correo</label>
    <div class="col-lg-8">
        <input type="email" name="correo" id="correo" class="form-control" value="{{old('correo')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label">Estado</label>
    <div class="col-lg-8">
        <input type="text" name="estado" id="estado" class="form-control" value="{{old('estado')}}" autocomplete="off"/>
    </div>
</div>
<div class="form-group">
    <label for="empresa_id" class="col-lg-3 control-label requerido">Empresa</label>
    <div class="col-lg-8">
        {{-- <input type="text" name="empresa_id" id="empresa_id" class="form-control onlyNum" value="{{old('empresa_id')}}" autocomplete="off" required/> --}}
        <select class="form-control required" name="empresa_id" id="empresa_id" required>
            @foreach($empresas as $id => $empresa)
                <option value="{{$id}}" @if (old('empresa_id') == $id) selected="selected" @endif>{{$empresa}}</option>
            @endforeach
        </select>
    </div>
</div>