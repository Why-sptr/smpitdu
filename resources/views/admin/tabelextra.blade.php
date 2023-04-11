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
                    <h1 class="h3 mb-4 text-gray-800"><b>Detail Extra</b></h1>
                    <div class="card mb-4">
                        <div class="card-header">

                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-primary" role="alert">
                            {{$message}}
                        </div>
                        @endif
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Detail Extra</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th width="200">Nama</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <tbody>
                                        <tbody>
                                            <tr>
                                                <td>Foto</td>
                                                <td><img src="{{asset('cover/'.$db_smpitdu->cover) }}" alt="" style="height: 100px;"></td>
                                            </tr>
                                            <tr>
                                                <td>Extra</td>
                                                <td>{{ $db_smpitdu->judul }}</td>
                                            </tr>
                                            <tr>
                                                <td>Peserta</td>
                                                <td>{{ $db_smpitdu->jadwal }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jam</td>
                                                <td>{{ $db_smpitdu->jam }}</td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td>{{ $db_smpitdu->lokasi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tentang</td>
                                                <td>{{ $db_smpitdu->tentang }}</td>
                                            </tr>
                                            <tr>
                                                <td>Foto</td>

                                                <td>
                                                    @foreach($db_smpitdu->images as $index)
                                                    <img src="{{asset('images/'.$index->image) }}" alt="" style="height: 100px;">
                                                    @endforeach
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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