<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @if (Session::get("costumer_id") !== null)
            <a href="{{ route('user.profile.voucher') }}" class="nav-link btn btn-warning font-weight-bold">Point : {{ Session::get("point") }}</a>
        @else
            
        @endif
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            @if(Session::get("costumer_id") == null)
                <a class="btn btn-light btn-sm" href="{{route("gudang.logout")}}" role="button"><i class="fas fa-sign-out-alt"></i></a>
            @else
                <a class="btn btn-light btn-sm" href="{{route("user.logout")}}" role="button"><i class="fas fa-sign-out-alt"></i></a>
            @endif
        </li>
    </ul>
</nav>
