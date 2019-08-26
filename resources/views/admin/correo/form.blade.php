<div class="form-group">
    <label for="email" class="col-lg-3 control-label requerido">Email</label>
    <div class="col-lg-8">
        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="empresa_id" class="col-lg-3 control-label requerido">Empresa</label>
    <div class="col-lg-8">
        {{-- <input type="text" name="empresa_id" id="empresa_id" class="form-control onlyNum" value="{{old('empresa_id')}}" autocomplete="off" required/> --}}
        <select class="form-control select2 required" style="width: 100%" data-error="Escoja una empresa..." data-placeholder="Seleccione una empresa..." name="empresa_id" id="empresa_id" required>
            <option value="" selected disabled hidden></option>
            @foreach($empresas as $id => $empresa)
                <option value="{{$id}}" @if (old('empresa_id') == $id) selected="selected" @endif>{{$empresa}}</option>
            @endforeach
        </select>
    </div>
</div>