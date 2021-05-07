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

                    <a class="btn btn-danger mb-2" href="<?=base_url('praktikan_listmodul')?>"><i
                            class="fas fa-arrow-left"></i> Back</a>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Modul
                            <strong class="text-primary"></strong>
                        </h1>


                    </div>

                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>
                    <div class="flash-data-error" data-flashdata="<?=$this->session->flashdata('flash-error');?>"></div>
                    <div class="flash-data-alert" data-flashdata="<?=$this->session->flashdata('flash-alert');?>"></div>



                    <!-- Content Row -->

                    <div class="row">



                        <!-- Area Chart -->
                        <div class="col-xl-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Modul
                                        <?php if ($is_assign): ?>

                                        <span style="color: #45d127;" class="ml-2"><i class="fas fa-check-circle"></i>
                                            Sudah mengumpulkan
                                        </span>

                                        <?php else: ?>

                                        <span style="color: #d83041;" class="ml-2"><i class="fas fa-times-circle"></i>
                                            Belum mengumpulkan
                                        </span>

                                        <?php endif;?>

                                    </h6>


                                    <button class="btn btn-primary" data-target="#staticBackdrop" type="button"
                                        data-toggle="modal"><i class="fas fa-plus"></i> Input Tugas</button>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card">

                                                <?php if (empty($bahan_praktikum)): ?>
                                                <img src="<?=base_url('assets_praktikum/img_lain/no_file.png')?>" alt=""
                                                    width="500" class="rounded mx-auto d-block">
                                                <?php endif;?>

                                                <div id="carouselExampleCaptions" class="carousel slide"
                                                    data-ride="carousel">
                                                    <ol class="carousel-indicators">

                                                        <?php $no = 0;foreach ($bahan_praktikum as $bp): ?>

                                                        <?php if ($no == 0): ?>

                                                        <li data-target="#carouselExampleCaptions"
                                                            data-slide-to="<?=$no++;?>" class="active">
                                                        </li>
                                                        <?php else: ?>
                                                        <li data-target="#carouselExampleCaptions"
                                                            data-slide-to="<?=$no++;?>">
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
                                                                <strong class="text-dark bg-white p-2"
                                                                    style="border-radius: 20px;"><?=$br->judul_bahan?></strong>
                                                            </h6>





                                                            <img src="<?=base_url('assets_praktikum/img_bahan_modul/') . $br->foto_bahan?>"
                                                                class="d-block w-100" alt="...">
                                                            <div class="carousel-caption d-none d-md-block">

                                                                <p class="bg-white text-dark"
                                                                    style="border-radius: 20px;">
                                                                    <?=$br->keterangan_bahan?></p>
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


                                                    <a class="carousel-control-prev" href="#carouselExampleCaptions"
                                                        role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleCaptions"
                                                        role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>


                                                <div class="card-body">
                                                    <h5 class="card-title"><strong>
                                                            <?=$modul['judul_praktikum']?> (Praktikum ke
                                                            <?=$modul['praktikum_ke']?>)</strong>
                                                    </h5>
                                                    <p class="card-text"><?=$modul['tujuan_praktikum']?></p>

                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Materi Modul</h6>
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


                                    <textarea class="form-control bg-white" rows="20"
                                        style="border: none;height: fit-content;" readonly><?=$modul['materi_praktikum']?>
									</textarea>




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
                            <a class="btn btn-primary" href="<?=base_url('praktikan_home/logout')?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Kumpulkan Tugas Mu!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?=base_url('praktikan_listmodul/upload_tugas')?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="modal-body">


                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Perhatian!</strong> Kumpulkan seluruh gambar didalam satu file (PDF).
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Masukkan Tugas</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                        name="file">
                                </div>

                                <input type="hidden" value="<?=$this->uri->segment(3)?>" name="id_praktikum">


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
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

            <script>
            function preview_img() {

                const sampul = document.querySelector('#sampul');
                const sampulLabel = document.querySelector('.custom-file-label');
                const imgPreview = document.querySelector('.img-preview');

                sampulLabel.textContent = sampul.files[0].name;

                const fileSampul = new FileReader();
                fileSampul.readAsDataURL(sampul.files[0]);

                fileSampul.onload = function(e) {
                    imgPreview.src = e.target.result;
                }

            }
            </script>


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