@extends('index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tabur Benih
      </h1>
      <br>
      <ol class="breadcrumb">
        <a href="{{route('taburbenih.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
                    @if (count($data) > 0)
                        <?php $num = 1 ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$num++}}</td>
                                <td>{{$item->jenis}}</td>
                                <td>{{$item->rencana}}</td>
                                <td>{{$item->realisasi}}</td>
                                <td><span class="badge bg-red">{{$item->persentase}}</span></td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="text-center">
                                        @if ($item->status == 'verified')
                                            <span class="badge bg-green">{{$item->status}}</span>
                                        @else
                                            <span class="badge bg-yellow">{{$item->status}}</span>
                                        @endif
                                    </td>
                                @endif
                                <td class="text-center">
                                    @if (Auth::user()->role == 'admin')
                                        <div class="btn-group">
                                            <a href="" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            <a href="" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Approve</a>
                                        </div>
                                    @endif
                                    @if (Auth::user()->role == 'user')
                                        <span class="badge bg-yellow">{{$item->status}}</span>
                                    @endif
                                </td>
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
              {{-- <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul> --}}
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