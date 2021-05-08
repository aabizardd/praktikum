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

                    <a class="btn btn-danger mb-2" href="<?=base_url('admin_listmodul')?>"><i
                            class="fas fa-arrow-left"></i> Back</a>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Modul
                            <strong class="text-primary"><?=$detail_modul['judul_praktikum']?></strong>
                        </h1>


                    </div>

                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>
                    <div class="flash-data-error" data-flashdata="<?=$this->session->flashdata('flash-error');?>"></div>

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

                    <?=form_error('tanggal_deadline', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                	<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button></div>');?>

                    <?=form_error('jam_deadline', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
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

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Tanggal Deadline</label>
                                                <input type="date" class="form-control" id="inputEmail4"
                                                    placeholder="Tanggal Deadline" name="tanggal_deadline"
                                                    id="tanggal_deadline"
                                                    value="<?=$detail_modul['deadline_tanggal']?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Jam</label>
                                                <input type="time" class="form-control" id="inputPassword4"
                                                    placeholder="Atur Jam Pengumpulan" name="jam_deadline"
                                                    id="jam_deadline" value="<?=$detail_modul['deadline_jam']?>">
                                            </div>
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

                                    <a href="<?=base_url('admin_tambahmodul')?>" class="btn btn-primary mb-2"><i
                                            class="fas fa-plus"></i> Tambah Data Bahan Modul
                                    </a>



                                    <?php if (empty($bahan_praktikum)): ?>
                                    <img src="<?=base_url('assets_praktikum/img_lain/no_file.png')?>" alt="" width="500"
                                        class="rounded mx-auto d-block">
                                    <?php endif;?>

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
                                                    <strong class="text-dark bg-white p-2"
                                                        style="border-radius: 20px;"><?=$br->judul_bahan?></strong>
                                                </h6>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button class="btn btn-outline-info position-absolute editbahan"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            data-judul="<?=$br->judul_bahan?>"
                                                            data-keterangan="<?=$br->keterangan_bahan?>"
                                                            data-gambar="<?=$br->foto_bahan?>"
                                                            data-idbahan="<?=$br->id_bahan?>"
                                                            style="margin-top: 70px;left: 50%;transform: translateX(-50%);"><i
                                                                class="fas fa-edit"></i>
                                                            Edit
                                                        </button>
                                                    </div>

                                                    <div class="col-6">
                                                        <a class="btn btn-outline-danger position-absolute hapusbahan"
                                                            style="margin-top: 70px;left: 50%;transform: translateX(-50%);"
                                                            href="<?=base_url('admin_listmodul/hapus_bahan/') . $br->foto_bahan . '/' . $br->id_bahan . "/" . $this->uri->segment(3)?>">
                                                            <i class="fas fa-trash"></i>
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>




                                                <img src="<?=base_url('assets_praktikum/img_bahan_modul/') . $br->foto_bahan?>"
                                                    class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">

                                                    <p class="bg-white text-dark" style="border-radius: 20px;">
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
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Bahan Praktikum</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-view">

                            <div class="row">
                                <div class="col-sm-5">

                                    <img src="<?=base_url('assets_praktikum/img_lain/no_file.png')?>" alt=""
                                        class="rounded mx-auto d-block img-preview" width="300" height="300"
                                        id="gambar">

                                </div>

                                <div class="col-sm-7 mt-2">

                                    <form method="POST" action="<?=base_url('admin_listmodul/update_bahan/')?>"
                                        enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul Bahan</label>
                                            <input type="text" class="form-control" id="judul"
                                                aria-describedby="emailHelp" name="judul_bahan" autocomplete="off">
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                email with anyone else.</small> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keteranan Bahan</label>
                                            <input type="text" class="form-control" id="keterangan"
                                                aria-describedby="emailHelp" name="keterangan_bahan" autocomplete="off">
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                email with anyone else.</small> -->
                                        </div>

                                        <input type="hidden" value="asdsa" id="id_bahan" name="id_bahan">
                                        <input type="hidden" id="foto_old" name="foto_bahan">
                                        <input type="hidden" name="id_praktikum" value="<?=$this->uri->segment(3)?>">



                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Foto Barang</label>

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="file" id="sampul"
                                                    aria-describedby="inputGroupFileAddon01" onchange="preview_img()">
                                                <label class="custom-file-label" for="inputGroupFile01">
                                                    Choose file</label>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary float-right" type="submit" name="submit">Simpan
                                            Perubahan</button>



                                    </form>

                                </div>
                            </div>


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
