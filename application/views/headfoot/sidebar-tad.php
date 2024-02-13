            <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                 <!-- Nav Item - landing page -->
                 <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>Dashboard">
                        
                        <i class="fas fa-fw fa-home"></i>
                        <span>Home</span></a>
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="">
                        
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="">
                        
                        <i class="fas fa-fw fa-search"></i>
                        <span>Personnel Search</span></a>
                </li>
              
                <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-fw fa-list"></i>
                            <span>Form Pemeriksaan</span>
                        </a>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Exit Menu:</h6>
                                <a class="collapse-item" href="<?php echo base_url()?>TAD/Costumer/create">Add</a>
                                <a class="collapse-item" href="<?php echo base_url()?>TAD/Costumer/">Index</a>
                                <a class="collapse-item" href="<?php echo base_url()?>TAD/Costumer/edit">Update</a>
                            </div>
                        </div>
                    </li>
               
                <?php if ($this->session->userdata('level') == 'admin'){ ?>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="sidebar-heading pb-2">
                        Admin Menu
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>user">
                            <i class="fas fa-fw fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider d-none d-md-block">
                <?php } ?> 
                
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>            