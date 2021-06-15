@extends ('backend/layouts.freelance')
@section ('title', 'Data Diri')

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
                    <li class="breadcrumb-item active">Data Diri</li>
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
                           <form action="{{route("vendor.update.photo.profile")}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                               <div class="row">
                                   <div class="col-md-3">
                                       <img id="profile_img" src="/dokumen/{{$vendor->foto_mitra}}" style="width: 100px;height:100px" class="img-fluid img-circle">
                                   </div>
                                   <div class="row">
                                       <div class="col-md-12">
                                           <input onchange="showFile(this)" type="file" name="foto_mitra" class="form-control">
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

    <script>
        function showFile(e) {
            let img = document.getElementById("profile_img")
            let reader = new FileReader()
            reader.onload = function(e) {
                img.src = e.target.result
            }
            reader.readAsDataURL(e.files[0])
        }
    </script>

@endsection
