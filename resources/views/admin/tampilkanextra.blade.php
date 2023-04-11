<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMPIT-DU</title>
    @include('template.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template.left-sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('template.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><b>Extra</b></h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal
                            <button type="button" class="btn btn-primary" id="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Tambah Wali Kelas
                            </button>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Data Extra</h6>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <form action="/updatedataextra/{{ $db_smpitdu->id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Judul</label>
                                                <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $db_smpitdu->judul }}" >
                                                @error('judul')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Cover</label>
                                                <input type="file" name="cover" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $db_smpitdu->cover }}">
                                            </div>
                                            <div>
                                                <img src="/cover/{{ $db_smpitdu->cover }}" class="img-responsive" style="max-height: 50px; max-width:100px" alt="" srcset="">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Jadwal</label>
                                                <input type="text" name="jadwal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $db_smpitdu->jadwal }}">
                                                @error('jadwal')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Jam</label>
                                                <input type="text" name="jam" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $db_smpitdu->jam }}">
                                                @error('jam')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Lokasi</label>
                                                <input type="text" name="lokasi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $db_smpitdu->lokasi }}">
                                                @error('lokasi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Tentang</label>
                                                <input type="text" name="tentang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $db_smpitdu->tentang }}">
                                                @error('tentang')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Foto Kegiatan Extra</label>
                                                <input type="file"  id="exampleInputEmail1" aria-describedby="emailHelp"  class="form-control" name="images[]" multiple>

                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </table>
                                    <!-- Modal -->
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->


            </div>

            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bersiap untuk Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda perlu memasukan ulang username dan kata sandi ketika masuk halaman, apakah anda yakin?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login">Logout</a>
                </div>
            </div>
        </div>
    </div>



    @include('template.script')

</body>

</html>