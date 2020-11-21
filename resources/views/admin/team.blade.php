@extends('admin.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">EQUIPO DESARROLLADOR:&nbsp;&nbsp;<b style="font-family: cursive">CLOUDATA</b></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr><th style="width: 5%"> #</th>
                            <th style="width: 20%">Nombre del Proyecto</th>
                            <th style="width: 25%">Miembros del Equipo</th>
                            <th style="width: 20">Progreso del Proyecto</th>
                            <th style="width: 10%" class="text-center">Estado</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#</td>
                            <td><a>Sistema Ventas</a><br /><small>Created 01.01.2019</small></td>
                            <td><ul class="list-inline">
                                    <li class="list-inline-item"><img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png"></li>
                                    <li class="list-inline-item"><img alt="Avatar" class="table-avatar" src="../../dist/img/avatar04.png"></li>
                                    <ul>
                                        <li class="list-inline-item"><p>YURY MARTIN</p></li>
                                    <li class="list-inline-item"><p>DAYVID PACHAS</p></li>
                                    </ul>
                                </ul>
                            </td>
                            <td class="project_progress">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57"
                                        aria-volumemin="0" aria-volumemax="100" style="width: 10%">
                                    </div>
                                </div><small>90% Complete</small>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">exitosamente</span>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-info btn-sm" href="#"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
