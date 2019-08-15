<div class="form-group">
    <label for="email" class="col-lg-3 control-label requerido">Email</label>
    <div class="col-lg-8">
        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <label for="empresa_id" class="col-lg-3 control-label requerido">Empresa</label>
    <div class="col-lg-8">
        <input type="text" name="empresa_id" id="empresa_id" class="form-control onlyNum" value="{{old('empresa_id')}}" autocomplete="off" required/>
    </div>
</div>