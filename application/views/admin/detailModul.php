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
                        <h1 class="h3 mb-0 text-gray-800">Detail Modul
                            <strong class="text-primary"><?=$detail_modul['judul_praktikum']?></strong>
                        </h1>


                    </div>

                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>

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

                    <!-- Content Row -->

                    <div class="row">



                        <!-- Area Chart -->
                        <div class="col-xl-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Modul</h6>
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

                                    <form method="POST"
                                        action="<?=base_url('admin_listmodul/detail_modul/') . $this->uri->segment(3)?>">
                                        <div class="form-group">
                                            <label for="judul_praktikum">Judul Praktikum</label>
                                            <input type="text" class="form-control" id="judul_praktikum"
                                                placeholder="Judul Praktikum" name="judul_praktikum" autocomplete="off"
                                                value="<?=$detail_modul['judul_praktikum']?>">
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone else.</small> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="praktikum_ke">Praktikum Ke</label>
                                            <input type="number" class="form-control" id="praktikum_ke"
                                                placeholder="Contoh: 2" name="praktikum_ke"
                                                value="<?=$detail_modul['praktikum_ke']?>">
                                            <small id="emailHelp" class="form-text text-muted">Inputan harus berupa
                                                angka</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="tujuan_praktikum">Tujuan Praktikum</label>
                                            <input type="text" class="form-control" id="tujuan_praktikum"
                                                placeholder="Tujuan Praktikum" name="tujuan_praktikum"
                                                autocomplete="off" value="<?=$detail_modul['tujuan_praktikum']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="materi_praktikum">Materi Praktikum</label>
                                            <textarea class="form-control" id="materi_praktikum" rows="15"
                                                name="materi_praktikum"
                                                autocomplete="off"><?=$detail_modul['materi_praktikum']?></textarea>
                                        </div>



                                        <button type="submit" class="btn btn-primary">Edit Data Praktikum</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Bahan Modul</h6>
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


                                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">

                                            <?php $no = 0;foreach ($bahan_praktikum as $bp): ?>

                                            <?php if ($no == 0): ?>

                                            <li data-target="#carouselExampleCaptions" data-slide-to="<?=$no++;?>"
                                                class="active">
                                            </li>
                                            <?php else: ?>
                                            <li data-target="#carouselExampleCaptions" data-slide-to="<?=$no++;?>">
                                            </li>
                                            <?php endif;?>


                                            <?php endforeach;?>

                                        </ol>
                                        <div class="carousel-inner">

                                            <?php $nomor = -1;foreach ($bahan_praktikum as $br): ?>

                                            <?php $nomor++;?>

                                            <div class="carousel-item <?=$nomor == 0 ? 'active' : '';?>">

                                                <h6 class="position-absolute text-white mt-4"
                                                    style="left: 50%;transform: translateX(-50%);">
                                                    <strong
                                                        class="text-white bg-dark p-2 "><?=$br->judul_bahan?></strong>
                                                </h6>
                                                <button class="btn btn-outline-info position-absolute"
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    style="margin-top: 70px;left: 50%;transform: translateX(-50%);"><i
                                                        class="fas fa-edit"></i>
                                                    Edit</button>



                                                <img src="<?=base_url('assets_praktikum/img_bahan_modul/') . $br->foto_bahan?>"
                                                    class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">

                                                    <p><?=$br->keterangan_bahan?></p>
                                                    <!-- <p><button class="btn btn-primary">Edit</button></p> -->
                                                </div>
                                            </div>

                                            <?php endforeach;?>
                                            <!--
                                            <div class="carousel-item">
                                                <img src="https://mmc.tirto.id/image/2021/01/19/istock-1038359766_ratio-16x9.jpg"
                                                    class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Second slide label</h5>
                                                    <p>Some representative placeholder content for the second slide.</p>
                                                </div>
                                            </div> -->


                                        </div>


                                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


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
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?=base_url('admin_home/logout')?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


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












</body>
