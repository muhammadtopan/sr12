@extends ('backend/layouts.freelance')
@section ('title', 'Update Password')

@section ('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0">{{ $active }} freelance</h1> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('freelance') }}">Home</a></li>
                    <li class="breadcrumb-item active">Update Password</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content col-md-6 mx-auto">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-primary card-outline">
                        <div class="card-body">
                            <form action="{{route("freelance.password.update.action")}}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                @if(session('errors'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Sepertinya ada yang salah:
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-3">
                                        <img id="profile_img" src="/dokumen/{{$vendor->foto_mitra}}" style="width: 100px;height:100px" class="img-fluid img-circle">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="group-input">
                                                <label for="password_baru">Password Baru</label>
                                                <input id="password_baru" name="password_baru" type="password" class="form-control" placeholder="******">
                                            </div>
                                            <div class="group-input">
                                                <label for="confirm">Konfirmasi Password</label>
                                                <input id="confirm" name="password_baru_confirmation" type="password" class="form-control" placeholder="******">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="mt-3 ml-2 btn btn-primary ">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection
