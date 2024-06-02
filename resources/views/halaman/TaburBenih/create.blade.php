@extends('index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Tabur Benih
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" class="form-control" placeholder="Masukkan jenis">
                </div>
                <div class="form-group">
                  <label>Rencana</label>
                  <input type="text" class="form-control" placeholder="Masukkan Rencana">
                </div>
                <div class="form-group">
                  <label>Realisasi</label>
                  <input type="text" class="form-control" placeholder="Masukkan Realisasi">
                </div>
                <div class="form-group">
                  <label>Persentase</label>
                  <input type="text" class="form-control" placeholder="Masukkan Persentase">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection