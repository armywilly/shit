<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Sistem Administrasi - MR &amp;&nbsp; Partners</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/sim/assets/plugins/morris/morris.css">

        <link href="<?php echo base_url() ?>assets/sim/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- form Uploads -->
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />

        <!-- Plugins css-->
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />

        <!-- DataTables -->
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/sim/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url() ?>assets/sim/assets/js/modernizr.min.js"></script>



    </head>


    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="#" class="logo"><span>Dashboard<span>SIM</span></span></a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li>
                                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                     <input type="text" placeholder="Search..." class="form-control">
                                     <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                            <li>
                                <!-- Notification -->
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <a href="javascript:void(0);" class="right-bar-toggle">
                                                <i class="zmdi zmdi-notifications-none"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Notification bar -->
                            </li>

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url() ?>assets/sim/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                    <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <!-- Menu Dashboard -->
                            <li>
                                <a href="<?php echo base_url('sim/dashboard') ?>"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>
                            <!-- Menu karyawan -->
                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-collection-text"></i> <span>Karyawan </span> </a>
                                <ul class="submenu">
                                    <li>
                                        <ul>
                                            <li><a href="<?php echo base_url('sim/karyawan') ?>">List Karyawan</a></li>
                                            <li><a href="<?php echo base_url('sim/karyawan/create') ?>">Tambah Data</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            
                            <!-- Menu master Data -->
                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-view-list"></i> <span> Master Data </span> </a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('sim/master_jabatan') ?>">Master Jabatan</a></li>
                                    <li><a href="<?php echo base_url('sim/master_client') ?>">Master Client</a></li>
                                    <li><a href="<?php echo base_url('sim/master_kontrak_kerja') ?>">Master Kontrak Kerja Sama</a></li>
                                    <li><a href="#">Master Gaji</a></li>
                                </ul>
                            </li>
                            <!-- Menu Laporan -->
                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-chart"></i><span> Laporan Data </span> </a>
                                <ul class="submenu">
                                    <li><a href="#">Laporan Data Karyawan</a></li>
                                    <li><a href="#">Laporan Kerja Sama Jasa Hukum</a></li>
                                    <li><a href="#">Laporan Slip Gaji Karyawan</a></li>
                                    <li><a href="#">Laporan Keaktifan Karyawan</a></li>
                                </ul>
                            </li>

                        </ul>
                        <!-- End navigation menu  -->
                    </div>
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->