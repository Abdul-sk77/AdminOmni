<style>
.brand-link .brand-image {
    /* float: left; */
    /* line-height: .8; */
    margin-left: 2.1rem;
    /* margin-right: .5rem; */
    margin-top: -10px;
    max-height: 40px;
    width: 60%;
    /* align-content: center; */
}
.sidebar-light-navy .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #6c757d;
    color: #fff;
}
.mt-2, .my-2 {
    margin-top: 0.5rem!important;
} 
</style>
<!-- Sidebar -->
    <aside class="main-sidebar sidebar-light-navy elevation-4" style="zoom:90%;">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('sm/dashboard'); ?>" class="brand-link ">
        <img src="<?php echo base_url(); ?>/public/assets/img/logo.png" alt="Admin Logo" class="brand-image ">
        <!--<span class="brand-text font-weight-light">Admin</span>-->
    </a>
   
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>/public/assets/dist/img/logo.jpg" class="img-circle elevation-2" alt="User Image"
                     style="opacity: .8">
            </div>
            <div class="info"><a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->
        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->
        <!-- Sidebar Menu -->
        <nav class="mt-2 nav-bg-dark">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="<?php echo base_url('index.php/sm/dashboard'); ?>" class="nav-link "> <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link"> <i class="fa fa-user-times mr-1" aria-hidden="true"></i>
                        <p>Agent <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/sm/agents'); ?>" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Agents</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/sm/agents/agent-session'); ?>" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>User Agent Session</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo base_url('index.php/sm/store-target'); ?>" class="nav-link"> <i class="fa fa-bullseye" aria-hidden="true"></i>
                        <p>Store Target</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo base_url('index.php/sm/sales'); ?>" class="nav-link"> <i class='fas fa-balance-scale'></i>
                        <p>Sales</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?php echo base_url('index.php/sm/feedback'); ?>" class="nav-link"> <i class="fa fa-thumbs-up " aria-hidden="true"></i>
                        <p>Feedback</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?php echo base_url('index.php/sm/reports'); ?>" class="nav-link"> <i class="fa fa-bug" aria-hidden="true"></i>
                        <p>Reports</p>
                    </a>
                </li>
                <br>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- End of Sidebar -->
