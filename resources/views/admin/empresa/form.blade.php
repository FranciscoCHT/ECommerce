<div class="col-lg-4">
    <span style="color: #6a828e;font-size:16px;"><b>Datos de la empresa</b></span>
    <div style="-webkit-column-count: 1;-webkit-column-width: 300px;-webkit-column-gap: 2em;border-top: 1px solid #7eb2be;padding-bottom: 16px;padding-top: 12px; margin-bottom: 0px;">
        <div class="form-group" style="margin-bottom:10px;">
            <label for="rut" class="control-label requerido">Rut</label>
            <div>
                <input type="text" name="rut" id="rut" class="form-control rutMask" placeholder="XX.XXX.XXX-X" value="{{old('rut', $empresas->rut ?? '')}}" autocomplete="off" required/>
            </div>
        </div>
        <div class="form-group" style="margin-bottom:10px;">
            <label for="nombre" class="control-label requerido">Nombre</label>
            <div>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Waliex" value="{{old('nombre', $empresas->nombre ?? '')}}" autocomplete="off" required/>
            </div>
        </div>
        <div class="form-group" style="margin-bottom:10px;">
            <label for="razon_social" class="control-label">Razón social</label>
            <div>
                <input type="text" name="razon_social" id="razon_social" class="form-control" placeholder="Ej: Waliex, E.I.R.L." value="{{old('razon_social', $empresas->razon_social ?? '')}}" autocomplete="off"/>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <span style="color: #6a828e;font-size:16px;"><b>Datos de contacto</b></span>
    <div style="-webkit-column-count: 1;-webkit-column-width: 300px;-webkit-column-gap: 2em;border-top: 1px solid #7eb2be;padding-bottom: 16px;padding-top: 12px; margin-bottom: 0px;">
        <div class="form-group" style="margin-bottom:10px;">
            <label for="telefono" class="control-label requerido">Teléfono</label>
            <div>
                <input type="text" name="telefono" id="telefono" class="form-control onlyNum" placeholder="Ej: 999999999" value="{{old('telefono', $empresas->telefono ?? '')}}" autocomplete="off" required/>
            </div>
        </div>
        <div class="form-group" style="margin-bottom:10px;">
            <label for="direccion" class="control-label">Dirección</label>
            <div>
                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ej: Las Brisas #2542" value="{{old('direccion', $empresas->direccion ?? '')}}" autocomplete="off"/>
            </div>
        </div>
        <div class="form-group" style="margin-bottom:10px;">
            <label for="tipo" class="control-label">Tipo</label>
            <div>
                <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Ej: Accesorios, abarrotes" value="{{old('tipo', $empresas->tipo ?? '')}}" autocomplete="off"/>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <span style="color: #6a828e;font-size:16px;"><b>Logo</b></span>
    <div style="-webkit-column-count: 1;-webkit-column-width: 300px;-webkit-column-gap: 2em;border-top: 1px solid #7eb2be;padding-bottom: 16px;padding-top: 12px; margin-bottom: 0px;">
        <div class="form-group" style="margin-bottom:10px;">
            <label for="logo" class="control-label">Imagen de logo</label>
            <div>
                <input type="file" name="logo" id="logo" class="" value="{{old('logo', $empresas->logo ?? '')}}"/>
            </div>
        </div>
        <div class="form-group" style="margin-bottom:10px;">
            <img style="max-width:100%;max-height:100%;" src="/imagenes/empresa/{{ $empresas->logo }}"/>
        </div>
    </div>
</div>