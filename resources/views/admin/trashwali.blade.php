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
                    <h1 class="h3 mb-4 text-gray-800"><b>Wali Kelas</b></h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <a href="/restorewaliall" class="btn btn-primary">Kembalikan Semua</a>
                            <a href="/hapuspermanensemuawali" class="btn btn-danger">Hapus Semua</a>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-primary" role="alert">
                            {{$message}}
                        </div>
                        @endif

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Wali Kelas</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            @php

                                            $no = 1;

                                            @endphp
                                            <tr>
                                                <th class="text-center" width="300">Dihapus</th>
                                                <th class="text-center" width="120">Foto</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Kelas</th>
                                                <th class="text-center" width="100" height="10">Aksi</th>
                                            </tr>
                                        </thead>
                                        @foreach($db_smpitdu as $index => $ds)

                                        <tbody>

                                            <tr>
                                            <td align="center" scope="ds">{{ $ds->deleted_at }}</td>
                                                <td>
                                                    <img src="{{ asset('fotowalikelas/'.$ds->foto)}}" alt="" style="height: 100px;">
                                                </td>
                                                <td>{{ $ds->nama }}</td>
                                                <td  align="center">{{ $ds->kelas }}</td>
                                                <td class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">Action</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href='/restorewali/{{ $ds->id }}'>Kembalikan</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href='/hapuspermanenwali/{{ $ds->id }}'>Hapus Permanen</a>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                        @endforeach
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