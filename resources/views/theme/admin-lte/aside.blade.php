<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image logoEmpresa">
          <img src="{{asset("imagenes/empresa/".(new App\Http\Controllers\Admin\EmpresaController)->getLogo())}}" class="img-circle" style="max-width:none;" alt="Logo de empresa">
        </div>
        <div class="pull-left info">
          <p>Francisco Chacón</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DE NAVEGACION</li>

        <li @if (Route::currentRouteName() == 'usuario') class="active" @endif>
          <a href="{{route('usuario')}}">
            <i class="fa fa-user"></i> <span>Usuarios</span>
          </a>
        </li>
        <li @if (Route::currentRouteName() == 'producto') class="active" @endif>
          <a href="{{route('producto')}}">
            <i class="fa fa-product-hunt"></i> <span>Productos</span>
          </a>
        </li>
        <li @if (Route::currentRouteName() == 'categoria') class="active" @endif>
            <a href="{{route('categoria')}}">
              <i class="fa fa-cubes"></i> <span>Categorías</span>
            </a>
          </li>
        <li @if (Route::currentRouteName() == 'oferta') class="active" @endif>
          <a href="{{route('oferta')}}">
            <i class="fa fa-percent"></i> <span>Ofertas</span>
          </a>
        </li>
        <li @if (Route::currentRouteName() == 'metodo_pago') class="active" @endif>
          <a href="{{route('metodo_pago')}}">
            <i class="fa fa-money"></i> <span>Métodos de pago</span>
          </a>
        </li>
        <li @if (Route::currentRouteName() == 'empresa') class="active" @endif>
          <a href="{{route('empresa')}}">
            <i class="fa fa-industry"></i> <span>Empresas</span>
          </a>
        </li>
        <li @if (Route::currentRouteName() == 'cupon') class="active" @endif>
          <a href="{{route('cupon')}}">
            <i class="fa fa-gift"></i> <span>Cupones</span>
          </a>
        </li>
        <li @if (Route::currentRouteName() == 'cuenta_bancaria') class="active" @endif>
          <a href="{{route('cuenta_bancaria')}}">
            <i class="fa fa-bank"></i> <span>Cuentas bancarias</span>
          </a>
        </li>
        <li @if (Route::currentRouteName() == 'correo') class="active" @endif>
          <a href="{{route('correo')}}">
            <i class="fa fa-envelope"></i> <span>Correos</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>