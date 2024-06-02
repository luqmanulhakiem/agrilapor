@extends('index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data User
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
            <form role="form" action="{{route('user.store')}}" method="POST">
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
                  <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role" id="">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
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