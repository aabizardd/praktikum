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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lihat Tugas Praktikan</h1>

                    </div>


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->


                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengumpulan Tugas Praktikan
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

                                    <div class="row">

                                        <?php if (empty($moduls)): ?>
                                        <img src="<?=base_url('assets_praktikum/img_lain/no_file.png')?>" alt=""
                                            width="500" class="rounded mx-auto d-block">
                                        <?php endif;?>

                                        <?php foreach ($moduls as $modul): ?>




                                        <div class="col-xl-3 col-lg-6 mb-3">
                                            <div class="card">
                                                <span class="ml-3 mt-3 text-white"
                                                    style="position: absolute;background-color: #004080;border-radius: 50%;width: 35px;height: 35px;text-align: center;font-size: 15px;padding-top: 7px;">
                                                    <?=++$start;?></span>
                                                <img class=" card-img-top"
                                                    src="https://ct.counseling.org/wp-content/uploads/2015/01/BooksAppleSchool.jpg"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-title">
                                                        <strong
                                                            class="text-justify"><?=$modul['judul_praktikum']?></strong>
                                                    </p>
                                                    <p style="font-size: 12px;"><?=$modul['tujuan_praktikum']?></p>

                                                    <a href="<?=base_url('admin_lihattugas/praktikan_tugas/') . $modul['id_praktikum']?>"
                                                        class="btn btn-primary mt-2"><i class="fas fa-info-circle"></i>
                                                        Lihat Pengumpulan
                                                    </a>



                                                </div>
                                            </div>
                                        </div>


                                        <?php endforeach;?>



                                    </div>

                                    <?=$this->pagination->create_links()?>



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