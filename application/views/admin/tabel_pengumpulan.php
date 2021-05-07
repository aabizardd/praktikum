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
                <div class="container-fluid">

                    <a class="btn btn-danger mb-2" href="<?=base_url('admin_lihattugas')?>"><i
                            class="fas fa-arrow-left"></i> Back</a>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Praktikum Modul
                            <strong><?=$praktikum['judul_praktikum']?></strong>
                        </h1>

                    </div>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true"><span
                                    style="color: springgreen;"><i class="fas fa-check-circle"></i></span> Sudah
                                Mengumpulkan
                            </a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false">
                                <span style="color: red;"><i class="fas fa-times-circle"></i></span> Belum
                                Mengumpulkan</a>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">


                            <!-- Content Row -->

                            <div class="row mt-2">

                                <!-- Area Chart -->
                                <div class="col-xl-12">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->


                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Lihat Siapa Saja Yang
                                                Mengumpulkan
                                            </h6>


                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">Dropdown Header:</div>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card Body -->

                                        <div class="card-body">



                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Praktikan</th>
                                                            <th>NIM</th>
                                                            <th>Kelas</th>
                                                            <th>Kelompok</th>
                                                            <th>Tanggal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Praktikan</th>
                                                            <th>NIM</th>
                                                            <th>Kelas</th>
                                                            <th>Kelompok</th>
                                                            <th>Tanggal Pengumpulan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>

                                                        <?php $no = 1;foreach ($assign as $item): ?>
                                                        <tr>
                                                            <th><?=$no++?></th>
                                                            <td><?=$item->nama_lengkap?></td>
                                                            <td><?=$item->nim?></td>
                                                            <td><?=$item->nama_kelas?></td>
                                                            <td><?=$item->kelompok?></td>
                                                            <td><?=$item->tanggal_pengumpulan?></td>
                                                            <td>
                                                                <a target="_blank"
                                                                    href="<?=base_url('assets_praktikum/tugas/') . $item->file?>"
                                                                    class="btn btn-primary" style="font-size: 12px;"><i
                                                                        class="fas fa-download"></i> Download Tugas</a>

                                                            </td>

                                                        </tr>
                                                        <?php endforeach;?>


                                                    </tbody>
                                                </table>
                                            </div>





                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            <div class="row mt-2">

                                <!-- Area Chart -->
                                <div class="col-xl-12">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->


                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Lihat Siapa Saja Yang
                                                Belum Mengumpulkan
                                            </h6>


                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">Dropdown Header:</div>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card Body -->

                                        <div class="card-body">



                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Praktikan</th>
                                                            <th>NIM</th>
                                                            <th>Kelas</th>
                                                            <th>Kelompok</th>
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

                                                        </tr>
                                                    </tfoot>
                                                    <tbody>

                                                        <?php $no = 1;foreach ($not_assign as $item): ?>
                                                        <tr>
                                                            <th><?=$no++?></th>
                                                            <td><?=$item->nama_lengkap?></td>
                                                            <td><?=$item->nim?></td>
                                                            <td><?=$item->nama_kelas?></td>
                                                            <td><?=$item->kelompok?></td>


                                                        </tr>
                                                        <?php endforeach;?>


                                                    </tbody>
                                                </table>
                                            </div>





                                        </div>
                                    </div>
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
    <d class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
    </d iv>








</body>