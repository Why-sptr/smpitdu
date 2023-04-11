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
                    <h1 class="h3 mb-4 text-gray-800"><b>Semua Siswa</b></h1>
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
                                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Siswa</h6>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <form action="/insertsiswa7b" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">NIS</label>
                                                <input type="text" name="id" class="form-control">

                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Foto</label>
                                                <input type="file" name="foto" class="form-control">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                                <input type="text" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Kelas</label>
                                                <select class="form-select" name="kelas" aria-label="Default select example">
                                                    <option selected>Pilih Kelas</option>
                                                    <option value="7A">7A</option>
                                                    <option value="7B">7B</option>
                                                    <option value="8A">8A</option>
                                                    <option value="8B">8B</option>
                                                    <option value="9A">9A</option>
                                                    <option value="9B">9B</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <td>
                                                        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                                        <input type="date" id="exampleInputEmail1" aria-describedby="emailHelp" class="form-control" name="tanggal_tagihan" id="exampleInputEmail1">
                                                    </td>
                                                    <td>
                                                        <label for="exampleInputEmail1" class="form-label">Tahun Ajaran</label>
                                                        <input type="text" name="tahun_ajaran" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </td>
                                                    <td>
                                                        <label for="exampleInputEmail1" class="form-label">Tagihan</label>
                                                        <input type="text" name="tagihan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </td>
                                                    <td>
                                                        <label for="exampleInputEmail1" class="form-label d-inline-flex p-2 mt-3">Status</label>
                                                        <select class="form-select d-inline-flex p-2" name="status" aria-label="Default select example">
                                                            <option selected>Pilih Status Pembayaran</option>
                                                            <option value="Lunas">Lunas</option>
                                                            <option value="Belum Lunas">Belum Lunas</option>
                                                        </select>
                                                    </td>
                                                    <td align="center"><button class="btn btn-outline-secondary mt-3 " id="add_spp" type="button">Tambah</button></td>

                                            </div>
                                    </table>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#add_spp').on('click', function() {
            var html = '';
            html += '<tr>'
            html += '<td><input type="date" id="exampleInputEmail1" aria-describedby="emailHelp" class="form-control" name="tanggal_tagihan[]" id="exampleInputEmail1"></td>'
            html += '<td><input type="text" name="tahun_ajaran[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></td>'
            html += '<td><input type="text" name="tagihan[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></td>'
            html += '<td><select class="form-select d-inline-flex p-2" name="status" aria-label="Default select example"><option selected>Pilih Status Pembayaran</option><option value="Lunas">Lunas</option><option value="Belum Lunas">Belum Lunas</option></select></td>'
            html += '<td align="center"><button class="btn btn-outline-danger mt-3 " id="remove_spp" type="button">Hapus</button></td>'
            html += '</tr>'
            $('tbody').append(html);
        })
    });

    $(document).on('click', '#remove_spp', function() {
        $(this).closest('tr').remove()
    })
</script>