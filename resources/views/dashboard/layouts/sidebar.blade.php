<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI Legend Trend</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link " href="/dashboard">
            <i class="bi bi-columns-gap"></i>
            <span>Dashboard</span></a>
    </li>
   
    <li class="nav-item active">
        <a class="nav-link" href="/pesanan">
            <i class="bi bi-server"></i>
            <span>Pesanan</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="/profil">
            <i class="bi bi-person-circle"></i>
            <span>Profil</span></a>
    </li>



    <!-- Divider -->




    @can('admin')
        <hr class="sidebar-divider d-none d-md-block">
        <div class="mx-3">

            <h5 class="text-white">


                Adminstrator

            </h5>
        </div>

        <div>

            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="bi bi-people"></i>
                    <span>Data Distributor</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/laporan">
                    <i class="bi bi-printer-fill"></i>
                    <span>Laporan</span></a>
            </li>

        </div>
    @endcan
</ul>
