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
                        <h1 class="h3 mb-0 text-gray-800">List Kelas Praktikan</h1>


                        <form action="<?=base_url('Admin_kelolakelas');?>" method="post">
                            <div class="row mt-2">
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="Keyword..." autocomplete="off"
                                        autofocus name="keyword" value="">
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-primary" name="submit" type="submit" value="Cari">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>



                    </div>

                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>
                    <div class="flash-data-error" data-flashdata="<?=$this->session->flashdata('flash-error');?>"></div>

                    <div class="card">

                        <div class="card-body">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target="#exampleModal"><i class="fas fa-plus"></i>
                                Tambah Data Kelas
                            </button>

                            <div class="row">

                                <?php if (empty($classes)): ?>
                                <img src="<?=base_url('assets_praktikum/img_lain/no_file.png')?>" alt="" width="500"
                                    class="rounded mx-auto d-block">
                                <?php endif;?>

                                <?php foreach ($classes as $class): ?>




                                <div class="col-xl-3 col-lg-6 col-6 mb-3">
                                    <div class="card">
                                        <span class="ml-3 mt-3 text-white"
                                            style="position: absolute;background-color: #004080;border-radius: 50%;width: 35px;height: 35px;text-align: center;font-size: 15px;padding-top: 7px;">
                                            <?=++$start;?></span>

                                        <div class="dropdown no-arrow position-absolute bg-white mt-3 mr-3"
                                            style="border-radius: 50%;width: 35px;height: 35px;text-align: center;font-size: 15px;padding-top: 7px; margin-right: 0;right: 0;">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>

                                                <a href="" class="btn btn-info mt-2 dropdown-item edit-kelas"
                                                    data-toggle="modal" data-target="#modalEdit"
                                                    data-idkelas="<?=$class['id_kelas']?>"
                                                    data-namakelas="<?=$class['nama_kelas']?>" id="edit_kelas"><span
                                                        style="color: #0ef18b;"><i class="fas fa-edit"></i></span>
                                                    Edit</a>

                                                <a class="btn btn-danger dropdown-item tombol-hapus mt-2"
                                                    id="tombol-hapus" type="button"
                                                    href="<?=base_url('admin_kelolakelas/hapus_kelas/') . $class['id_kelas']?>"><span
                                                        style="color: red;"><i class="fas fa-trash"></i></span>
                                                    Hapus
                                                </a>

                                            </div>

                                        </div>

                                        <img class=" card-img-top"
                                            src="<?=base_url('assets_praktikum/img_lain/class.jpg')?>"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-title">
                                                <strong class="text-justify"><?=$class['nama_kelas']?></strong>
                                            </p>

                                            <p class="card-title">
                                                Jumlah Praktikan : <strong
                                                    class="text-primray"><?=$class['jml_praktikan']?>
                                                    Praktikan</strong>
                                            </p>

                                            <p>
                                                <a class="btn btn-info"
                                                    href="<?=base_url('admin_kelolakelas/show_praktikan_by_kelas/') . $class['id_kelas']?>"><i
                                                        class="fas fa-info-circle"></i> Lihat
                                                    Praktikan</a>
                                            </p>




                                        </div>
                                    </div>
                                </div>


                                <?php endforeach;?>



                            </div>

                            <?=$this->pagination->create_links()?>



                        </div>

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mt-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Praktikan Keseluruhan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Praktikan</th>
                                            <th>NIM</th>
                                            <th>Kelas</th>
                                            <th>Kelompok</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            <!-- <th>Salary</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Praktikan</th>
                                            <th>NIM</th>
                                            <th>Kelas</th>
                                            <th>Kelompok</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1;foreach ($praktikans as $praktikan): ?>
                                        <tr>
                                            <th><?=$no++?></th>
                                            <td><?=$praktikan->nama_lengkap?></td>
                                            <td><?=$praktikan->nim?></td>
                                            <td><?=$praktikan->nama_kelas?></td>
                                            <td><?=$praktikan->kelompok?></td>
                                            <td>
                                                <?php if ($praktikan->status_active == 1): ?>

                                                <p class="badge badge-primary"><i class="fas fa-check"></i> Status
                                                    Aktif</p>

                                                <?php elseif ($praktikan->status_active == 0): ?>
                                                <p class="badge badge-danger"><i class="fas fa-times-circle"></i>
                                                    Status
                                                    Belum Aktif</p>
                                                <?php else: ?>

                                                <p class="badge badge-danger"><i class="fas fa-ban"></i> Block</p>

                                                <?php endif;?>

                                            </td>
                                            <td>

                                                <?php if ($praktikan->status_active == 1): ?>

                                                <a href="<?=base_url('admin_kelolakelas/change_status/nonaktif/') . $praktikan->id_user?>"
                                                    class="badge badge-warning tombol-nonaktif"><i
                                                        class="fas fa-ban"></i>
                                                    Nonaktifkan</a>

                                                <?php else: ?>

                                                <a href="<?=base_url('admin_kelolakelas/change_status/aktif/') . $praktikan->id_user?>"
                                                    class="badge badge-warning tombol-aktif"><i
                                                        class="fas fa-check"></i>
                                                    Aktifkan</a>

                                                <?php endif;?>

                                                <a href="" class="badge badge-primary"><i class="fas fa-edit"></i>
                                                    Edit</a>

                                                <a href="<?=base_url('admin_kelolakelas/hapus_data_praktikan/') . $praktikan->id_user?>"
                                                    class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i>
                                                    Hapus</a>
                                            </td>

                                        </tr>
                                        <?php endforeach;?>


                                    </tbody>
                                </table>
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


    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('admin_kelolakelas/tambah_kelas')?>" method="POST">
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('admin_kelolakelas/edit_kelas')?>" method="POST">
                    <div class="modal-body" id="modal-view">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas">
                        </div>

                        <input type="hidden" id="id_kelas" name="id_kelas">



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>




































































</body>
