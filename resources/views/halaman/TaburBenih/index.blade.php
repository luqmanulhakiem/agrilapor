@extends('index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabur Benih
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Tabur Benih</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Tabur Benih</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Jenis</th>
                      <th>Rencana</th>
                      <th>Realisasi</th>
                      <th style="width: 40px">%</th>
                      @if (Auth::user()->role == 'admin')
                      <th>Status</th>
                      @endif
                      <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-red">55%</span></td>
                      @if (Auth::user()->role == 'admin')
                        <td class="text-center">
                            <span class="badge bg-yellow">pending</span>
                        </td>
                      @endif
                      <td class="text-center">
                        <div class="btn-group">
                            <a href="" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                            <a href="" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Approve</a>
                        </div>
                        <span class="badge bg-yellow">pending</span>
                      </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada item</td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection