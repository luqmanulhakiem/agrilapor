<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="#"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Persemaian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Tabur Benih</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Over Spin</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Oper Area</a></li>
          </ul>
        </li>    
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tree"></i> <span>Tanaman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Bibit</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Acir</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Lubang Tanam</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Tanam</a></li>
          </ul>
        </li>    
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Pemeliharaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Sulaman</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Babat</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Dangir</a></li>
          </ul>
        </li>    

        {{-- Admin --}}
        <li class="header">Persemaian</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Tabur Benih</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Over Spin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Oper Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="header">Tanaman</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Bibit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Acir</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Lubang Tanam</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Tanam</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="header">Pemeliharaan</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Sulaman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Babat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Dangir</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Verifikasi</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Harian</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i> Rekap Bulanan</a></li>
          </ul>
        </li>  
        <li class="header">Data</li>
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="#"><i class="fa fa-users"></i> <span>User</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>