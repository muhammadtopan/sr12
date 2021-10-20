<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">{{Session::get("auth")->username}}</a>
        </li> --}}
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
                <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i></button>
        </li>
    </ul>
</nav>

<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">SR12 Herbal Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Yakin ingin keluar?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a role="button" href="{{ route('freelance.logout') }}" class="btn btn-primary">Keluar</a>
            </div>
        </div>
    </div>
</div>
