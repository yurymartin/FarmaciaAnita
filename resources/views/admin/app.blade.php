<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>SISTEMA DE LA BOTICA ANITA</title>

    <link rel="icon" href="{{ asset('img/farmacia.png') }}" type="image/png" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Toastr-->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini text-xs">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/team" class="nav-link">Empresa Desarrolladora</a>
                </li>

            </ul>

            {{--<!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <b style="text-transform: uppercase;" class="text-lg">{{ Auth::user()->name }}</b> <span
                class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('CERRAR SESSION') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </li>
            </ul>--}}
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('img/farmacia.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> SISTE. BOTICA ANITA</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/personas/'.Auth::user()->empleados->foto) }}"
                            style="width: 40px;height: 40px" class="img-circle elevation-2"
                            alt="{{Auth::user()->empleados->foto}}">
                    </div>
                    <div class="info">
                        <h5 class="text-light">{{Auth::user()->name}}
                            <a class="btn btn-danger btn-xs" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                title="cerrar session">{{ __('Cerrar Session') }}
                            </a>
                        </h5>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Inicio</p>
                            </a>
                        </li>

                        {{--<li class="nav-item">
                            <a href="{{ url('usuarios') }}"
                        class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios
                            <?php use App\User; $users_count = User::all()->count(); ?>
                            <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                        </p>
                        </a>
                        </li>--}}
                        <li class="nav-item ">
                            <a href="/ventas" class="nav-link {{ Request::path() === 'ventas' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>Ventas<span class="right badge badge-danger">@php echo(App\Venta::all()->count())
                                        @endphp</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/clientes" class="nav-link {{ Request::path() === 'clientes' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-injured"></i>
                                <p>Clientes<span class="right badge badge-danger">@php echo(App\Cliente::all()->count())
                                        @endphp</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/compras" class="nav-link {{ Request::path() === 'compras' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-truck-loading"></i>
                                <p>Compras<span class="right badge badge-danger">@php echo(App\Compra::all()->count())
                                        @endphp</span>
                                </p>
                            </a>
                        </li>
                        @if (Auth::user()->tipousers->tipo == 'ADMINISTRADOR')
                        <li class="nav-item">
                            <a href="/productos" class="nav-link {{ Request::path() === 'productos' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-capsules"></i>
                                <p>Productos<span class="right badge badge-danger">@php
                                        echo(App\Producto::all()->count()) @endphp</span>
                                </p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="/proveedores"
                                class="nav-link {{ Request::path() === 'proveedores' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-people-carry"></i>
                                <p>Proveedores<span class="right badge badge-danger">@php
                                        echo(App\Proveedor::all()->count()) @endphp</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/asistente" class="nav-link {{ Request::path() === 'asistente' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-md"></i>
                                <p>Asistente Medico<span class="right badge badge-danger">@php
                                        echo(App\Producto_has_Sintoma::all()->count()) @endphp</span>
                                </p>
                            </a>
                        </li>
                        <!--VENTAS-->
                        <li
                            class="nav-item has-treeview {{ Request::path() === 'estado_ventas' ? 'menu-open' : '' }}{{ Request::path() === 'pagos' ? 'menu-open' : '' }}{{ Request::path() === 'ventas/tipo_comprobantes' ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::path() === 'estado_ventas' ? 'active' : '' }}{{ Request::path() === 'pagos' ? 'active' : '' }}{{ Request::path() === 'ventas/tipo_comprobantes' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Mantenimiento Ventas<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/estado_ventas') }}"
                                        class="{{ Request::path() === 'estado_ventas' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Estado de Ventas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/ventas/tipo_comprobantes') }}"
                                        class="{{ Request::path() === 'ventas/tipo_comprobantes' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Tipos de Comprobantes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/pagos') }}"
                                        class="{{ Request::path() === 'pagos' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Formas de Pago</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--FIN VENTAS-->
                        <!--COMPRAS-->
                        <li
                            class="nav-item has-treeview {{ Request::path() === 'compras/tipo_comprobantes' ? 'menu-open' : '' }}{{ Request::path() === 'estado_compras' ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::path() === 'estado_compras' ? 'active' : '' }}{{ Request::path() === 'compras/tipo_comprobantes' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Mantenimiento Compras<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/compras/tipo_comprobantes') }}"
                                        class="{{ Request::path() === 'compras/tipo_comprobantes' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Tipos de Comprobantes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/estado_compras') }}"
                                        class="{{ Request::path() === 'estado_compras' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>estados de compra</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--FIN COMPRAS-->

                        <!--ASISTENTE MEDICO-->
                        <li class="nav-item has-treeview {{ Request::path() === 'sintomas' ? 'menu-open' : '' }}">
                            <a class="nav-link {{ Request::path() === 'sintomas' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Mantenimiento Asistente <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/sintomas') }}"
                                        class="{{ Request::path() === 'sintomas' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Sintomas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--FIN ASISTENTE MEDICO-->

                        @if (Auth::user()->tipousers->tipo == 'ADMINISTRADOR')
                        <!--PRODUCTOS-->
                        <li
                            class="nav-item has-treeview {{ Request::path() === 'tipoproductos' ? 'menu-open' : '' }} {{ Request::path() === 'ubicaciones' ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::path() === 'tipoproductos' ? 'active' : '' }}{{ Request::path() === 'ubicaciones' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Mantenimiento Productos<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/tipoproductos') }}"
                                        class="{{ Request::path() === 'tipoproductos' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Tipos de productos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/ubicaciones') }}"
                                        class="{{ Request::path() === 'ubicaciones' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Ubicaciones</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--FIN PRODUCTOS-->
                        @endif
                        @if (Auth::user()->tipousers->tipo == 'ADMINISTRADOR')
                        <!--EMPLEADOS-->
                        <li
                            class="nav-item has-treeview {{ Request::path() === 'empleados' ? ' menu-open' : '' }}{{ Request::path() === 'especialidades' ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::path() === 'empleados' ? ' active' : '' }}{{ Request::path() === 'especialidades' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-id-badge"></i>
                                <p>Mantenimiento Empleados<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/empleados') }}"
                                        class="{{ Request::path() === 'empleados' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Empleados</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/especialidades') }}"
                                        class="{{ Request::path() === 'especialidades' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Especialidades</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--FIN EMPLEADOS-->

                        @endif

                        @if (Auth::user()->tipousers->tipo == 'ADMINISTRADOR')
                        <!--USUARIOS-->
                        <li
                            class="nav-item has-treeview {{ Request::path() === 'users' ? ' menu-open' : '' }}{{ Request::path() === 'tipousers' ? 'menu-open' : '' }}">
                            <a
                                class="nav-link {{ Request::path() === 'users' ? ' active' : '' }}{{ Request::path() === 'tipousers' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>Usuarios<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/users') }}"
                                        class="{{ Request::path() === 'users' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/tipousers') }}"
                                        class="{{ Request::path() === 'tipousers' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon text-xs"></i>
                                        <p>Tipo Usuario</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--FIN USUARIOS-->
                        @endif


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content mt-2">
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Contactanos: 936 695 173
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="/">Sistema Farmacia Anita</a> developed by <a href="https://adminlte.io">Yury Martin</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    @stack('scripts')
    @stack('script_cliente')
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    @stack('scripts_grafica')
    <script>
        $(function () {
          $("#example1").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
          });
          /*$("#tabla_compra").DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
          });
          $("#tabla_venta").DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
          });*/
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
          bsCustomFileInput.init();
        });
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        })
    </script>
</body>

</html>
