<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('admin_home')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-pen-square"></i>
            <span>Kelola Praktikum</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Praktikum:</h6>
                <a class="collapse-item" href="<?=base_url('admin_tambahmodul/')?>">Tambah Modul
                    Praktikum</a>
                <a class="collapse-item" href="<?=base_url('admin_listmodul/')?>">Lihat Modul Praktikum</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-user-alt"></i>
            <span>Kelola Data Praktikan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Praktikan:</h6>
                <!-- <a class="collapse-item" href="utilities-color.html">Lihat Data Praktikan</a> -->
                <a class="collapse-item" href="<?=base_url('Admin_kelolakelas')?>">Kelola Data Praktikan dan <br>
                    Kelas</a>

            </div>
        </div>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kelolaAdmin" aria-expanded="true"
            aria-controls="kelolaAdmin">
            <i class="fas fa-users-cog"></i>
            <span>Kelola Data Admin</span>
        </a>
        <div id="kelolaAdmin" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Admin:</h6>
                <!-- <a class="collapse-item" href="utilities-color.html">Lihat Data Praktikan</a> -->
                <a class="collapse-item" href="<?=base_url('Admin_kelolaadmin')?>">Tambah Data Admin</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lihat_tugas" aria-expanded="true"
            aria-controls="lihat_tugas">
            <i class="fas fa-book"></i>
            <span>Lihat Tugas</span>
        </a>
        <div id="lihat_tugas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Admin:</h6>
                <!-- <a class="collapse-item" href="utilities-color.html">Lihat Data Praktikan</a> -->
                <a class="collapse-item" href="<?=base_url('Admin_lihattugas')?>">Lihat Tugas Praktikan</a>

            </div>
        </div>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->