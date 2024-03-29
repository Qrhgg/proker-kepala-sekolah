<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sd Negeri 23 Sabang <sup> </sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user()->role == 'admin')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/kepalasekolah">
                <i class="fas fa-user-tie"></i>
                <span>Data Kepala Sekolah</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="/kategori">
                <i class="fas fa-th-list"></i>
                <span>Kategori Progran Kerja</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="/proker">
                <i class="fas fa-database"></i>
                <span>Data Program Kerja </span></a>
        </li>


        <li class="nav-item active">
            <a class="nav-link" href="/lapor-proker">
                <i class="fas fa-print"></i>
                <span>Laporan Program Kerja</span></a>
        </li>
    @endif


    @if (Auth::user()->role == 'kepala_sekolah')
        <li class="nav-item active">
            <a class="nav-link" href="/prokerkp">
                <i class="fas fa-database"></i>
                <span>Data Program Kerja </span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/lapor-proker-kp">
                <i class="fas fa-database"></i>
                <span>Laporan Program Kerja </span>
            </a>
        </li>
    @endif








    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Rumah Sakit</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data - Data :</h6>
                <a class="collapse-item" href="buttons.html">Pasien</a>
                <a class="collapse-item" href="cards.html">Dokter</a>
                <a class="collapse-item" href="cards.html">Poliklinik</a>
                <a class="collapse-item" href="cards.html">Obat</a>
                <a class="collapse-item" href="cards.html">Rekam Medis</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li> --}}

    <!-- Divider -->

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->

    <!-- Divider -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>
