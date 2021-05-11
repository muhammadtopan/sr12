<nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('backend/dashboard')}}" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            @if( Session::get('admin_level') == 'admin')
                <a class="btn btn-dark btn-sm" href="{{ route('logout') }}" role="button"><i class="fas fa-sign-out-alt"></i></a>
            @else
                <a class="btn btn-dark btn-sm" href="{{ route('vendor.logout') }}" role="button"><i class="fas fa-sign-out-alt"></i></a>
            @endif
        </li>
    </ul>
</nav>
