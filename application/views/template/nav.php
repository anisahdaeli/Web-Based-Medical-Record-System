<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <!-- <div class="container"> -->
        <!-- Menu button for smallar screens -->
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo base_url('index.php/admin');?>" class="navbar-brand"><i class="fa-solid fa-computer"></i><span>    CI rekmed_MaDeSu.com</span></a> 
        </div>
        <!--Navigation starts-->
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <!--Links-->
            <ul class="nav navbar-nav navbar-right">
                <!-- header admin -->
                <?php if ($_SESSION["level"]=="admin"){ ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img src="" alt="" class="fas fa-user mr-3"/><span> administrator</span><b class="caret"></b>
                    </a>
                    <!--Dropdown menu-->
                    <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('index.php/adminuser');?>"><i class="fa fa-user"></i>Master User</a></li>
                    <li><a href="<?php echo base_url('index.php/login/logout'); ?>" onclick="return confirm('Apakah yakin akan Logout?');"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                    </ul>
                </li>
                <?php } ?>
                <!-- header dokter -->
                <?php if ($_SESSION["level"]=="dokter"){ ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img src="" alt="" class="fa-solid fa-user-doctor mr-3"/><span> MaaDeSu Dokter</span><b class="caret"></b>
                    </a>
                    <!--Dropdown menu-->
                    <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('index.php/adminuser/ganti_password');?>"><i class="fa fa-lock"></i>Ganti Password</a></li>
                    <li><a href="<?php echo base_url('index.php/login/logout'); ?>" onclick="return confirm('Apakah yakin akan Logout?');"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </nav>
    <!-- </div> -->
</div>
</div><!-- /#top -->

<div id="content">
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>
        <div class="sidebar-inner"
    
        !--#menu-->
        <ul class="navi" id="sidenav">
            <?php if ($_SESSION["level"]=="admin"){ ?>
            <li class="nred current"><a href="<?php echo base_url('index.php/admin');?>"><i class="fa-7x fa-solid fa-user-shield"></i></a>
            <!-- <li class="ngreen"><a href="<?php //echo base_url('index.php/admin');?>"><i class="fas fa-tachometer-alt"></i><span>    Dashboard</span></a></li> -->
            <li class="ngreen"><a href="<?php echo base_url('index.php/adminpasien'); ?>"><i class="fa-solid fa-book-medical"></i><span>    Master Pasien</span></a></li>
            <li class="ngreen"><a href="<?php echo base_url('index.php/adminpembayaran'); ?>"><i class="fa-solid fa-dollar-sign"></i><span>    Pembayaran</span></a></li>
            <li class="nav-item ngreen">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#detilinfocollapse"
                    aria-expanded="true" aria-controls="detilinfocollapse">
                    <i class="fa-solid fa-file-lines"></i>
                    <span>Laporan</span>
                </a>
                <div id="detilinfocollapse" class="collapse" aria-labelledby="detilinfocollapse" data-parent="sidenav">
                    <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="<?php echo base_url('index.php/adminpasien/laporan'); ?>"><i class="fa-regular fa-o"></i><span class="txttebal">L Data Pasien</span></a>
                                <a class="collapse-item" href="<?php echo base_url('index.php/dokterpemeriksaan/laporan'); ?>"><i class="fa-regular fa-o"></i><span class="txttebal">L Pemeriksaan</span></a>
                                <a class="collapse-item" href="<?php echo base_url('index.php/dokterresepobat/laporan'); ?>"><i class="fa-regular fa-o"></i><span class="txttebal">L Data Resep</span></a>
                                <a class="collapse-item" href="<?php echo base_url('index.php/adminpembayaran/laporan'); ?>"><i class="fa-regular fa-o"></i><span class="txttebal">L Pembayaran</span></a>
                    </div>
                </div>
            </li>
            <br>
            <li class='ngreen'><a href="<?php echo base_url('index.php/login/logout'); ?>" onclick="return confirm('Apakah yakin akan Logout?');"><i class="fa-solid fa-right-from-bracket"></i><span>   Logout</span></a></li>
            <?php } ?>

            <?php if ($_SESSION["level"]=="dokter"){ ?>
            <li class="nred current"><a href="<?php echo base_url('index.php/admin');?>"><i class="fa-7x fa-solid fa-user-doctor"></i></a>
            <!-- <li class="ngreen"><a href="<?php //echo base_url('index.php/dokter');?>"><i class="fas fa-tachometer-alt"></i><span>    Dashboard</span></a></li> -->
            <li class="ngreen"><a href="<?php echo base_url('index.php/dokterpemeriksaan');?>"><i class="fa-solid fa-head-side-mask"></i><span>    Pemeriksaan</span></a></li>
            <li class="ngreen"><a href="<?php echo base_url('index.php/dokterresepobat');?>"><i class="fa-solid fa-receipt"></i><span>    Resep Obat</span></a></li>
            <br>
            <li class='ngreen'><a href="<?php echo base_url('index.php/login/logout'); ?>" onclick="return confirm('Apakah yakin akan Logout?');"><i class="fa-solid fa-right-from-bracket"></i><span>   Logout</span></a></li>
            <?php } ?>
            </ul><!-- /#menu -->
    </div><!-- /#sidebar -->
    </div>
</div>

<div class="mainbar">
    <div id="content">
        <div class="outer" class="hidden-print">
            <div class="inner" class="hidden-print">
            <div class="col-lg-12" class="hidden-print">