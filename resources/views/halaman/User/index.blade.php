@extends('index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
      </h1>
      <br>
      <ol class="breadcrumb">
        <a href="{{route('user.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>username</th>
                      <th>role</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) > 0)
                        <?php $num = 1 ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$num++}}</td>
                                <td>{{$item->username}}</td>
                                <td><span class="badge {{$item->role == 'admin' ? 'bg-red' : 'bg-green'}}">{{$item->role}}</span></td>
                                <td class="text-center">
                                  <div class="btn-group">
                                      <a href="{{route('user.edit', ["id" => $item->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                      <a href="{{route('user.edit.password', ["id" => $item->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-lock"></i> Edit Password</a>
                                      <a href="{{route('user.destroy', ["id" => $item->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                  </div>
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