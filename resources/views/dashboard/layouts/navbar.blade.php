<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
        action="/admin">
        @if(Request::is('admin'))
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" id="search" placeholder="Cari Sesuatu.."
                    name="search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        @endif
    </form>

    <div class="ms-auto">
        <form action="/logout" method="post">
            @csrf
            <button class="btn btn-primary"><i class="bi bi-box-arrow-right mx-1"></i>Logout</button>
        </form>
    </div>

</nav>
