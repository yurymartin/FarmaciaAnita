@extends('admin.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$ventas}}</h3>
                    <p>VENTAS</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="/ventas" class="small-box-footer">
                    Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$clientes}}</h3>
                    <p>CLIENTES</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-injured"></i>
                </div>
                <a href="/clientes" class="small-box-footer">
                    Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$compras}}</h3>
                    <p>COMPRAS</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-truck-loading"></i>
                </div>
                <a href="/compras" class="small-box-footer">
                    Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            @if (Auth::user()->tipousers->tipo == 'ADMINISTRADOR')
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$productos}}</h3>
                    <p>PRODUCTOS</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-capsules"></i>
                </div>
                <a href="/productos" class="small-box-footer">
                    Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            @endif
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$proveedores}}</h3>
                    <p>PROVEEDORES</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-people-carry"></i>
                </div>
                <a href="/proveedores" class="small-box-footer">
                    Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$recetas}}</h3>
                    <p>ASISTETENTE MEDICO</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-user-md"></i>
                </div>
                <a href="/asistente" class="small-box-footer">
                    Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            @if (Auth::user()->tipousers->tipo == 'ADMINISTRADOR')
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$empleados}}</h3>
                    <p>EMPLEADOS</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-id-badge"></i>
                </div>
                <a href="/empleados" class="small-box-footer">
                    Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            @endif
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            @if (Auth::user()->tipousers->tipo == 'ADMINISTRADOR')
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$usuarios}}</h3>
                    <p>USUARIOS</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-users-cog"></i>
                </div>
                <a href="/users" class="small-box-footer">
                    Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
            @endif
        </div>
        <div class="col-md-12">
            <!-- AREA CHART -->
            <!-- <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Grafica de Ventas</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="areaChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
@push('scripts_grafica')
<script>
    $(function () {
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        labels  : ['Enero', 'Febrero', 'Marzo', 'April', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        datasets: [
          {
            label               : 'Digital Goods',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [45, 48, 40, 19, 86, 27, 90, 48, 40, 19, 86, 15]
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      var areaChart = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })
    })
</script>
@endpush
@endsection
