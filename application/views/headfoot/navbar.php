<!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <h3 class="my-auto">E-Labkesda</h3>
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">               
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search Personnel By Id" aria-label="Search">
                            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                        </form>                                       

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
                    <div class="container-fluid" style="background-image: url('<?= base_url()?>assets/img/HCD-Background.png');background-repeat: no-repeat;background-position: right;background-size: 30%;background-position-y: bottom;">
       
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