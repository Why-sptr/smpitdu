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
                    <h1 class="h3 mb-4 text-gray-800"><b>Prestasi</b></h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <a href="/tambahprestasi" class="btn btn-primary">Tambah Prestasi</a>
                            <a href="/trashprestasi" class="btn btn-danger">Sampah</a>
                            <a href="/tambahjuara" class="btn btn-primary">Tambah Juara</a>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-primary" role="alert">
                            {{$message}}
                        </div>
                        @endif
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Prestasi</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="50" height="10">No.</th>
                                                <th class="text-center" width="100" height="10">Medal</th>
                                                <th class="text-center">Juara</th>
                                                <th class="text-center">Lomba</th>
                                                <th class="text-center">Tingkat</th>
                                                <th class="text-center" width="100" height="10">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($db_smpitdu as $index => $ds)
                                            <tr>
                                                <td align="center" scope="ds">{{ $index + $db_smpitdu->firstItem() }}</td>
                                                <td align="center">
                                                <img src="{{ asset('fotojuara/'.$ds->juara->medal)}}" alt="" style="max-height: 151px; max-width: 100px;">
                                                </td>
                                                <td>{{ $ds->juara->juara }}</td>
                                                <td>{{ $ds->lomba }}</td>
                                                <td>{{ $ds->tingkat }}</td>
                                                <td class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs">Action</button>
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href='/tampilkandataprestasi/{{ $ds->id }}'>Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href='/deleteprestasi/{{ $ds->id }}'>Hapus</a>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{ $db_smpitdu->links() }}
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