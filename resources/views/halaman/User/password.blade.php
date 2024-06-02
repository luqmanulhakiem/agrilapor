@extends('index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data User Password
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
            <form role="form" action="{{route('user.update.password', ['id' => $data->id])}}" method="POST">
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
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="{{$data->username}}" readonly>
                </div>
                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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