@extends ('backend/layouts.app')
@section ('title', 'Viewer Syarat')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Viewer Syarat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Viewer Syarat</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark card-outline">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <strong>{{ session()->get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero-config" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nomor HP</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($viewer as $no => $view)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $view->name_viewer }}</td>
                                            <td>{{ $view->phone }}</td>
                                            <td>{{ $view->view }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
