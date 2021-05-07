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
                        <h1 class="h3 mb-0 text-gray-800">Profile Admin
                            <strong class="text-primary"><?=$info_asprak['nama_lengkap']?></strong>
                        </h1>


                    </div>

                    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>
                    <div class="flash-data-alert" data-flashdata="<?=$this->session->flashdata('flash-alert');?>"></div>
                    <div class="flash-data-error" data-flashdata="<?=$this->session->flashdata('flash-error');?>"></div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Kelola Profile</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Data
                                                Profil</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Edit
                                                Password</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">

                                            <div class="row mt-2">
                                                <div class="col-sm-4">

                                                    <img src="<?=base_url('assets_praktikum/')?>img_profile/praktikan/<?=$this->session->userdata('foto_profile')?>"
                                                        alt="" class="rounded mx-auto d-block img-preview" width="100%"
                                                        height="400" id="gambar">

                                                </div>

                                                <div class="col-sm-8 mt-2">

                                                    <?=form_error('kelas', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <?=form_error('kelompok', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <?=form_error('nama_lengkap', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <?=form_error('nim', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <?=form_error('email', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <form method="POST" action="<?=base_url('praktikan_profile/')?>"
                                                        enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="nama_lengkap"
                                                                name="nama_lengkap" autocomplete="off"
                                                                value="<?=$info_asprak['nama_lengkap']?>">

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">NIM</label>
                                                            <input type="text" class="form-control" id="nim"
                                                                aria-describedby="emailHelp" name="nim"
                                                                autocomplete="off" value="<?=$info_asprak['nim']?>">

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email</label>
                                                            <input type="text" class="form-control" id="email"
                                                                aria-describedby="emailHelp" name="email"
                                                                autocomplete="off" value="<?=$info_asprak['email']?>">

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Kelas</label>

                                                            <select class="custom-select" id="inputGroupSelect02"
                                                                name="kelas" id="kelas">
                                                                <option>Pilih...</option>

                                                                <?php foreach ($classes as $class): ?>

                                                                <option value="<?=$class->id_kelas?>"
                                                                    <?=$info_praktikan['id_kelas'] == $class->id_kelas ? "selected" : ""?>>
                                                                    <?=$class->nama_kelas?>
                                                                </option>

                                                                <?php endforeach;?>

                                                            </select>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Kelompok</label>
                                                            <input type="text" class="form-control" id="kelompok"
                                                                name="kelompok" autocomplete="off"
                                                                value="<?=$info_asprak['kelompok']?>">
                                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                email with anyone else.</small> -->
                                                        </div>


                                                        <input type="hidden" id="foto_old" name="foto_bahan"
                                                            value="<?=$info_asprak['foto_profile']?>">




                                                        <div class="form-group">

                                                            <label for="exampleInputEmail1">Foto Profil</label>

                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="file"
                                                                    id="sampul" aria-describedby="inputGroupFileAddon01"
                                                                    onchange="preview_img()">
                                                                <label class="custom-file-label" for="inputGroupFile01">
                                                                    Choose file</label>
                                                            </div>
                                                        </div>

                                                        <button class="btn btn-primary mt-2" type="submit"
                                                            name="submit">Simpan
                                                            Perubahan</button>



                                                    </form>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">

                                            <div class="row mt-2">
                                                <div class="col-sm-4">

                                                    <img src="<?=base_url('assets_praktikum/')?>img_lain/lock.png"
                                                        alt="" class="rounded mx-auto d-block img-preview" width="100%"
                                                        height="400" id="gambar">

                                                </div>

                                                <div class="col-sm-8 mt-2">

                                                    <?=form_error('nama_lengkap', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <?=form_error('nim', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <?=form_error('email', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Sorry!</strong> ', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button></div>');?>

                                                    <form method="POST"
                                                        action="<?=base_url('praktikan_profile/update_password')?>">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Passwod Lama</label>
                                                            <input type="password" class="form-control"
                                                                id="password_lama" name="password_lama"
                                                                autocomplete="off">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Password Baru</label>
                                                            <input type="password" class="form-control" id="password1"
                                                                aria-describedby="emailHelp" name="password1"
                                                                autocomplete="off">

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Ulangi Password Baru</label>
                                                            <input type="password" class="form-control" id="password2"
                                                                name="password2" autocomplete="off">

                                                        </div>

                                                        <input type="hidden" id="foto_old" name="foto_bahan"
                                                            value="<?=$info_asprak['foto_profile']?>">



                                                        <button class="btn btn-primary mt-2" type="submit"
                                                            name="submit">Simpan
                                                            Perubahan</button>



                                                    </form>

                                                </div>
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