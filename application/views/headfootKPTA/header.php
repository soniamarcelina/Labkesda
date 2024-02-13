
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" href="<?php echo base_url() ?>assets/favicon.ico">
    <!-- Custom styles for this template-->
    <?php
    $cssVersion = time(); // Using current timestamp as the version
    ?>
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.css"/> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datetimepicker.min.css"/> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/SweetAlert.all.min.css"/> 
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css?v=<?php echo $cssVersion; ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/SweetAlert.min.all.js?>"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/moment.js?>"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/moment.js?>"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dataTables.js?>"></script> -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/Datatables2/datatables.min.js?>"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/Datatables2/datatables.min.css"/> 
    

</head>
    <body id="page-top">
         <?php
        if($this->session->userdata('usergate') != null){
         if(has_alert()):  
            foreach(has_alert() as $type => $message): ?>  

                <div id="something" class="alert alert-dismissible <?php echo $type; ?> alert-check">  
                    <button type="button" class="close" data-dismiss="alert" onclick="location.reload();"><span>&times;</span></button>
                    <?php echo $message; ?>  
                </div>  
                
            <?php endforeach;  
        endif;} ?>

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon mx-4">
                        <img src="<?php echo base_url('assets/img/pepc.png')?>" class="img-thumbnail">
                    </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                 <!-- Nav Item - landing page -->
                 <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>Dashboard/landing">
                        
                        <i class="fas fa-fw fa-home"></i>
                        <span>Home</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>Approval/show">
                        
                        <i class="fas fa-fw fa-home"></i>
                        <span>Approval</span></a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>home">
                        
                        <i class="fas fa-fw fa-home"></i>
                        <span>Dashboard</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-fw fa-bezier-curve"></i>
                        <span>Magang/KPTA</span>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="<?php echo base_url()?>orgChange">Edit Data</a>
                            <a class="collapse-item" href="<?php echo base_url()?>orgChange/create">Signer</a>
                            <a class="collapse-item" href="<?php echo base_url()?>Approval/OCF">Agreement Magang</a>
                            <a class="collapse-item" href="<?php echo base_url()?>Approval/ReviewOCF">Agreement KP/TA/P</a>
                            <a class="collapse-item" href="<?php echo base_url()?>Approval/ReviewOCF">Email Kandidat</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>dashboard">
                        
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Materi Onboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-portrait"></i>
                        <span>Mentor</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo base_url()?>MRF">Data Mentor</a>
                            <a class="collapse-item" href="<?php echo base_url()?>MRF/create">Email Kepada Mentor</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-portrait"></i>
                        <span>Ketersediaan</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                             <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="<?php echo base_url()?>MRF">Anggaran</a>
                            <a class="collapse-item" href="<?php echo base_url()?>MRF/create">Hari Kerja</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>Performance/create">
                        <i class="fas fa-fw fa-chart-line"></i>
                        <span>Pembayaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>dashboard">
                        
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Evaluasi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>Performance/create">
                        <i class="fas fa-fw fa-chart-line"></i>
                        <span>Permintaan Magang </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>dashboard">
                        
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Lamaran Magang</span></a>
                </li>
                
                
                    <hr class="sidebar-divider d-none d-md-block">
              
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <h3 class="my-auto">Apprenticeship</h3>
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">                                                      

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username')?></span>
                                    <i class="fa fa-user"></i>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url().'setting/'?>">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
       
                    <div class="container-fluid">
                    <?php
                    if($this->session->userdata('username') != null){
                     if(has_alert()):  
                        foreach(has_alert() as $type => $message): ?>  
                            <div class="alert form-control pb-3 alert-dismissible bg-warning <?php echo $type; ?>">  
                                <button type="button" class="close" data-dismiss="alert" onclick="location.reload();"><span>&times;</span></button>
                                <?php echo $message; ?>  
                            </div>  
                        <?php endforeach;  
                    endif;} ?>
