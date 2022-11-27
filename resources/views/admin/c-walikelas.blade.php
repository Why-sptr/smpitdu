
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                Tambah Wali Kelas
                            </button>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Wali Kelas</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th width="50" height="10">No.</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th width="200" height="10">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td align="center">1</td>
                                                <td><img src={{ asset('../template/img/muka.png') }} width="70" height="70"></td>
                                                <td>Sri Ningsih, S.Pd.</td>
                                                <td>7A</td>
                                                <td align="center">
                                                    <button class="btn btn-info btn-xs">Edit</button>
                                                    <button class="btn btn-danger btn-xs">Delete</button>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center">2</td>
                                                <td><img src={{ asset('../template/img/muka.png') }} width="70" height="70"></td>
                                                <td>Aminatul Fathonah, M.Pd</td>
                                                <td>7B</td>
                                                <td align="center">
                                                    <button class="btn btn-info btn-xs">Edit</button>
                                                    <button class="btn btn-danger btn-xs">Delete</button>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center">3</td>
                                                <td><img src={{ asset('../template/img/muka.png') }} width="70" height="70"></td>
                                                <td>Eni Setiyowati,S.Pd</td>
                                                <td>7C</td>
                                                <td align="center">
                                                    <button class="btn btn-info btn-xs">Edit</button>
                                                    <button class="btn btn-danger btn-xs">Delete</button>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center">4</td>
                                                <td><img src={{ asset('../template/img/muka.png') }} width="70" height="70"></td>
                                                <td>Suatmadi, S.Pd.I</td>
                                                <td>8A</td>
                                                <td align="center">
                                                    <button class="btn btn-info btn-xs">Edit</button>
                                                    <button class="btn btn-danger btn-xs">Delete</button>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center">5</td>
                                                <td><img src={{ asset('../template/img/muka.png') }} width="70" height="70"></td>
                                                <td>Muhamad Anis, S.Pd.I., M.Si</td>
                                                <td>8B</td>
                                                <td align="center">
                                                    <button class="btn btn-info btn-xs">Edit</button>
                                                    <button class="btn btn-danger btn-xs">Delete</button>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

   
    @include('template.script')

</body>

</html>