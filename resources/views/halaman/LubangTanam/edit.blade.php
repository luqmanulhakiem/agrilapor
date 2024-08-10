@extends('index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Lubang Tanam
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
              <h3 class="box-title">Edit Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('lubangtanam.update', ['id' => $data->id])}}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="pt-4 pb-2">
                    @foreach ($errors->all() as $error)
                        <p class="text-center small">{{ $error }}</p>
                    @endforeach
                    </div>
                @endif
              <div class="box-body">
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" class="form-control" name="jenis" placeholder="Masukkan jenis" value="{{$data->jenis}}" required>
                </div>
                <div class="form-group">
                  <label>Rencana</label>
                  <input type="text" class="form-control" name="rencana" placeholder="Masukkan Rencana" value="{{$data->rencana}}" required>
                </div>
                <div class="form-group">
                  <label>Realisasi</label>
                  <input type="text" class="form-control" name="realisasi" placeholder="Masukkan Realisasi" value="{{$data->realisasi}}" required>
                </div>
                {{-- <div class="form-group">
                  <label>Persentase</label>
                  <input type="number" class="form-control" name="persentase" placeholder="Masukkan Persentase" value="{{$data->persentase}}" required>
                </div> --}}
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