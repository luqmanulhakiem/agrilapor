<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{route('dashboard')}}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

        @if (Auth::user()->role == 'user')
          <li class="{{ Request::is(['tabur-benih/*', 'over-spin/*', 'oper-area/*']) ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Persemaian</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['tabur-benih/index', 'tabur-benih/create']) ? 'active' : '' }}"><a href="{{route('taburbenih.index')}}"><i class="fa fa-circle-o"></i> Tabur Benih</a></li>
              <li class="{{ Request::is(['over-spin/index', 'over-spin/create']) ? 'active' : '' }}"><a href="{{route('overspin.index')}}"><i class="fa fa-circle-o"></i> Over Spin</a></li>
              <li class="{{ Request::is(['oper-area/index', 'oper-area/create']) ? 'active' : '' }}"><a href="{{route('operarea.index')}}"><i class="fa fa-circle-o"></i> Oper Area</a></li>
            </ul>
          </li>    
          <li class="{{ Request::is(['bibit/*', 'acir/*', 'lubang-tanam/*', 'tanam/*']) ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-tree"></i> <span>Tanaman</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['bibit/index', 'bibit/create']) ? 'active' : '' }}"><a href="{{route('bibit.index')}}"><i class="fa fa-circle-o"></i> Bibit</a></li>
              <li class="{{ Request::is(['acir/index', 'acir/create']) ? 'active' : '' }}"><a href="{{route('acir.index')}}"><i class="fa fa-circle-o"></i> Acir</a></li>
              <li class="{{ Request::is(['lubang-tanam/index', 'lubang-tanam/create']) ? 'active' : '' }}"><a href="{{route('lubangtanam.index')}}"><i class="fa fa-circle-o"></i> Lubang Tanam</a></li>
              <li class="{{ Request::is(['tanam/index', 'tanam/create']) ? 'active' : '' }}"><a href="{{route('tanam.index')}}"><i class="fa fa-circle-o"></i> Tanam</a></li>
            </ul>
          </li>    
          <li class="{{ Request::is(['sulaman/*', 'babat/*', 'dangir/*']) ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-wrench"></i> <span>Pemeliharaan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['sulaman/index', 'sulaman/create']) ? 'active' : '' }}"><a href="{{route('sulaman.index')}}"><i class="fa fa-circle-o"></i> Sulaman</a></li>
              <li class="{{ Request::is(['babat/index', 'babat/create']) ? 'active' : '' }}"><a href="{{route('babat.index')}}"><i class="fa fa-circle-o"></i> Babat</a></li>
              <li class="{{ Request::is(['dangir/index', 'dangir/create']) ? 'active' : '' }}"><a href="{{route('dangir.index')}}"><i class="fa fa-circle-o"></i> Dangir</a></li>
            </ul>
          </li>    
        @endif

        {{-- Admin --}}
        @if (Auth::user()->role == 'admin')
          <li class="header">Persemaian</li>
          <?php 
            $carbon = \Illuminate\Support\Carbon::now(); 
            $today = $carbon->format('Y-m-d');
            $month = $carbon->format('m');
            $year = $carbon->format('Y');
          ?>
          <li class="{{ Request::is('tabur-benih/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Tabur Benih</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['tabur-benih/verifikasi', 'tabur-benih/create', 'tabur-benih/edit/*']) ? 'active' : '' }}"><a href="{{route('taburbenih.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('tabur-benih/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('taburbenih.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('tabur-benih/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('taburbenih.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="{{ Request::is('over-spin/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Over Spin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['over-spin/verifikasi', 'over-spin/create', 'over-spin/edit/*']) ? 'active' : '' }}"><a href="{{route('overspin.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('over-spin/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('overspin.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('over-spin/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('overspin.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="{{ Request::is('oper-area/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Oper Area</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['oper-area/verifikasi', 'oper-area/create', 'oper-area/edit/*']) ? 'active' : '' }}"><a href="{{route('operarea.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('oper-area/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('operarea.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('oper-area/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('operarea.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="header">Tanaman</li>
          <li class="{{ Request::is('bibit/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Bibit</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['bibit/verifikasi', 'bibit/create', 'bibit/edit/*']) ? 'active' : '' }}"><a href="{{route('bibit.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('bibit/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('bibit.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('bibit/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('bibit.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="{{ Request::is('acir/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Acir</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['acir/verifikasi', 'acir/create', 'acir/edit/*']) ? 'active' : '' }}"><a href="{{route('acir.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('acir/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('acir.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('acir/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('acir.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="{{ Request::is('lubang-tanam/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Lubang Tanam</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['lubang-tanam/verifikasi', 'lubang-tanam/create', 'lubang-tanam/edit/*']) ? 'active' : '' }}"><a href="{{route('lubangtanam.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('lubang-tanam/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('lubangtanam.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('lubang-tanam/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('lubangtanam.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="{{ Request::is('tanam/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Tanam</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['tanam/verifikasi', 'tanam/create', 'tanam/edit/*']) ? 'active' : '' }}"><a href="{{route('tanam.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('tanam/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('tanam.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('tanam/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('tanam.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="header">Pemeliharaan</li>
          <li class="{{ Request::is('sulaman/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Sulaman</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['sulaman/verifikasi', 'sulaman/create', 'sulaman/edit/*']) ? 'active' : '' }}"><a href="{{route('sulaman.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('sulaman/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('sulaman.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('sulaman/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('sulaman.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="{{ Request::is('babat/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Babat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['babat/verifikasi', 'babat/create', 'babat/edit/*']) ? 'active' : '' }}"><a href="{{route('babat.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('babat/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('babat.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('babat/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('babat.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="{{ Request::is('dangir/*') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Dangir</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is(['dangir/verifikasi', 'dangir/create', 'dangir/edit/*']) ? 'active' : '' }}"><a href="{{route('dangir.verifikasi')}}"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
              <li class="{{ Request::is('dangir/rekap-harian/*') ? 'active' : '' }}"><a href="{{route('dangir.harian', ["tanggal" => $today])}}"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
              <li class="{{ Request::is('dangir/rekap-bulanan/*') ? 'active' : '' }}"><a href="{{route('dangir.bulanan', ["bulan" => $month, 'tahun' => $year])}}"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
            </ul>
          </li>  
          <li class="header">Data</li>
          <li class="{{ Request::is(['data-user/*']) ? 'active' : '' }}"><a href="{{route('user.index')}}"><i class="fa fa-users"></i> <span>User</span></a></li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>