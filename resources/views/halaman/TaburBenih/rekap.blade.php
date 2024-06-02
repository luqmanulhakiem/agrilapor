@extends('index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rekap Harian Data Tabur Benih
      </h1>
      <br>
      <ol class="breadcrumb">
        <a href="{{route('taburbenih.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Download Laporan</a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group mr-2">
                    <label for="label">Filter</label>
                        <input type="date" name="tanggal" id="tanggal" value="{{$today}}" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Lihat</label>
                        <a href="" onclick="this.href='/tabur-benih/rekap-harian/'+ document.getElementById('tanggal').value " 
                        class="btn btn-primary col-md-12">
                            Lihat
                        </a>
                    </div>

                </div>
              </div>
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Rekap Harian Data Tabur Benih</h3>
            
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
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) > 0)
                        <?php $num = 1 ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$num++}}</td>
                                <td>{{$item->jenis}}</td>
                                <td>{{$item->rencana}}</td>
                                <td>{{$item->realisasi}}</td>
                                <td><span class="badge bg-red">{{$item->persentase}}%</span></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada item</td>
                        </tr>
                    @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                {{$data->links()}}
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