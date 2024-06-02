@extends('index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @if (Request::is('dangir/rekap-bulanan/*'))
          Rekap Bulanan Data Dangir
        @else
          Rekap Harian Data Dangir
        @endif
      </h1>
      <br>
      <ol class="breadcrumb">
        @if (Request::is('dangir/rekap-bulanan/*'))
          <a  
          onclick="this.href='/dangir/download-bulanan/' + document.getElementById('bulan').value + 
          '/' + document.getElementById('tahun').value; this.target='_blank'" 
          class="btn btn-success"><i class="fa fa-plus"></i> 
            Download Laporan
          </a>
        @else
          <a  
          onclick="this.href='/dangir/download-harian/'+ document.getElementById('tanggal').value; this.target='_blank'" 
          class="btn btn-success"><i class="fa fa-plus"></i> 
            Download Laporan
          </a>
        @endif
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="row">
                @if (Request::is('dangir/rekap-harian/*'))
                  <div class="col-md-2">
                    <div class="form-group mr-2">
                      <label for="label">Filter</label>
                          <input type="date" name="tanggal" id="tanggal" value="{{$today}}" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                          <label for="">Lihat</label>
                          <a href="" onclick="this.href='/dangir/rekap-harian/'+ document.getElementById('tanggal').value " 
                          class="btn btn-primary col-md-12">
                              Lihat
                          </a>
                      </div>
                  </div>
                @endif

                @if (Request::is('dangir/rekap-bulanan/*'))
                  <div class="col-md-2">
                    <label for="month">Bulan:</label>
                    <select class="form-control" name="bulan" id="bulan">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ old('month', $bulan) == $i ? 'selected' : '' }}>
                              {{ \Carbon\Carbon::create()->locale('id')->month($i)->translatedFormat('F') }}
                            </option>
                        @endfor
                    </select>
                  </div>
                  <div class="col-md-2">
                    <label for="year">Tahun:</label>
                    <select class="form-control" name="tahun" id="tahun">
                        @for ($i = 2020; $i <= \Carbon\Carbon::now()->year; $i++)
                            <option value="{{ $i }}" {{ old('year', $tahun) == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="">Lihat</label>
                      <a onclick="this.href='/dangir/rekap-bulanan/'+ document.getElementById('bulan').value + 
                      '/' + document.getElementById('tahun').value " 
                      class="btn btn-primary col-md-12">
                          Lihat
                      </a>
                  </div>
                  </div>
                @endif

              </div>
            </div>
            <div class="box-header with-border">
              <h3 class="box-title">
                @if (Request::is('dangir/rekap-bulanan/*'))
                  Rekap Bulanan Data Dangir
                @else
                  Rekap Harian Data Dangir
                @endif
              </h3>
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