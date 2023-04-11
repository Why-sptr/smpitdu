<ul class ="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div>
            <img src={{ asset('../template/img/logo.png') }} class="img-fluid" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3">SMPITDU</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Isi Aplikasi
    </div>

    <!-- Nav Item - Homepage Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-home"></i>
            <span>Homepage</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Homepage:</h6>
                <a class="collapse-item" href="/profilesekolah">Profile Sekolah</a>
                <a class="collapse-item" href="/prestasi">Prestasi</a>
                <a class="collapse-item" href="/extrakulikuler">Extrakulikuler</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Event Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/dataevent" >
            <i class="fas fa-fw fa-calendar"></i>
            <span>Event</span>
        </a>
    </li>

    <!-- Nav Item - Event Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/dataform">
        <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Form</span>
        </a>
    </li>

    <!-- Nav Item - Event Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-people-arrows"></i>
            <span>Civitas</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Data:</h6>
                <a class="collapse-item" href="/datakepala">Kepala Sekolah</a>
                <a class="collapse-item" href="/datawakil">Wakil Kepala</a>
                <a class="collapse-item" href="/dataguru">Data Guru</a>
                <a class="collapse-item" href="/datakaryawan">Data Karyawan</a>
                <a class="collapse-item" href="/datawalikelas">Wali Kelas</a>
                <a class="collapse-item" href="/dataosis">Osis</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Data Kelas 7:</h6>
                <a class="collapse-item" href="/datasiswa7a">Kelas 7A</a>
                <a class="collapse-item" href="/datasiswa7b">Kelas 7B</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Data Kelas 8:</h6>
                <a class="collapse-item" href="/datasiswa8a">Kelas 8A</a>
                <a class="collapse-item" href="/datasiswa8b">Kelas 8B</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Data Kelas 9:</h6>
                <a class="collapse-item" href="/datasiswa9a">Kelas 9A</a>
                <a class="collapse-item" href="/datasiswa9b">Kelas 9B</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sistem
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan Chat</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>