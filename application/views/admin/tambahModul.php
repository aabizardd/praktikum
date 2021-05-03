<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "sidebar.php";?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "topbar.php";?>

                <!-- Begin Page Content -->
                <div class="container-fluid mb-5">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Modul Praktikum</h1>

                    </div>

                    <div class="row mt-0">
                        <div class=" col-lg-6 mt-2">

                            <?=$this->session->flashdata('alert')?>

                            <?=form_error('judul_praktikum', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                	<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button></div>');?>

                            <?=form_error('praktikum_ke', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                	<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button></div>');?>

                            <?=form_error('tujuan_praktikum', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                	<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button></div>');?>

                            <?=form_error('materi_praktikum', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                	<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button></div>');?>

                            <div class="card">
                                <div class="card-header">
                                    Form Tambah Modul Praktikum
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="judul_praktikum">Judul Praktikum</label>
                                            <input type="text" class="form-control" id="judul_praktikum"
                                                placeholder="Judul Praktikum" name="judul_praktikum">
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone else.</small> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="praktikum_ke">Praktikum Ke</label>
                                            <input type="number" class="form-control" id="praktikum_ke"
                                                placeholder="Contoh: 2" name="praktikum_ke">
                                            <small id="emailHelp" class="form-text text-muted">Inputan harus berupa
                                                angka</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="tujuan_praktikum">Tujuan Praktikum</label>
                                            <input type="text" class="form-control" id="tujuan_praktikum"
                                                placeholder="Tujuan Praktikum" name="tujuan_praktikum">
                                        </div>

                                        <div class="form-group">
                                            <label for="materi_praktikum">Materi Praktikum</label>
                                            <textarea class="form-control" id="materi_praktikum" rows="15"
                                                name="materi_praktikum"></textarea>
                                        </div>



                                        <button type="submit" class="btn btn-primary">Tambah Modul Praktikum</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    Form Tambah Bahan Praktikum
                                </div>
                                <div class="card-body">

                                    <form action="<?=base_url('admin_home/tambahDataBahan')?>" method="POST"
                                        class="insert-from" id="insert_form" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pilih Modul Praktikum</label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="inputGroupSelect02"
                                                    name="id_praktikum" required>
                                                    <option value="" selected>Pilih...</option>
                                                    <?php foreach ($modul_praktikum as $item): ?>
                                                    <option value="<?=$item->id_praktikum?>">
                                                        <?="Praktikum " . $item->id_praktikum . " (" . $item->judul_praktikum . ")"?>
                                                    </option>
                                                    <?php endforeach;?>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="input-field">

                                            <table class="table table-bordered" id="table_field">

                                                <tr>
                                                    <th>Judul Bahan</th>
                                                    <th>Keterangan Bahan</th>
                                                    <th>Foto Bahan</th>
                                                    <th>Tambah atau Hapus</th>
                                                </tr>
                                                <tr>
                                                    <td><input class="form-control" type="text" name="judul_bahan[]"
                                                            required=""></td>
                                                    <td><input class="form-control" type="text"
                                                            name="keterangan_bahan[]" required=""></td>
                                                    <td><input class="form-control-file" type="file" name="foto_bahan[]"
                                                            required="">
                                                    </td>
                                                    <td><input type="button" name="addd" id="add" value="Tambah"
                                                            class="btn btn-warning"></td>
                                                </tr>

                                            </table>

                                            <input class="btn btn-success" type="submit" name="save" id="save"
                                                value="Simpan Data Bahan">

                                        </div>
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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
                    <a class="btn btn-primary" href="<?=base_url('admin_home/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>



</body>