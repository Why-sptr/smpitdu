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
                    <h1 class="h3 mb-4 text-gray-800"><b>Event</b></h1>
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
                                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Event</h6>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <form action="/insertevent" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Foto</label>
                                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}">
                                                @error('foto')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Event</label>
                                                <input type="text" name="event" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ old('event') }}">
                                                @error('event')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Peserta</label>
                                                <input type="text" name="peserta" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ old('peserta') }}">
                                                @error('peserta')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                                <input type="date" id="exampleInputEmail1" aria-describedby="emailHelp" class="form-control" name="tanggal" id="exampleInputEmail1" value="{{ old('tanggal') }}">
                                                @error('tanggal')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Status</label>
                                               
                                                <select class="form-select" name="status" aria-label="Default select example" value="{{ old('status') }}" required>
                                                   
                                                    <option selected>Pilih Status</option>
                                                    <option value="Yang Akan Datang">Yang Akan Datang</option>
                                                    <option value="Yang Telah Berlalu">Yang Telah Berlalu</option>
                                                </select>
                                                @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                                
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Lokasi</label>
                                                <input type="text" name="lokasi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ old('lokasi') }}">
                                                @error('lokasi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Tentang</label>
                                                <input type="text" name="tentang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ old('tentang') }}">
                                                @error('tentang')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Foto Kegiatan Event</label>
                                                <input type="file"  id="exampleInputEmail1" aria-describedby="emailHelp"  class="form-control" name="images_events[]" multiple>

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