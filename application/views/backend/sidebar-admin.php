<style>
<!-- .brand-link .brand-image {
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
    <aside class="main-sidebar sidebar-light-navy elevation-4" style="zoom:90%">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('index.php/admin/dashboard'); ?>" class="brand-link ">
        <img src="<?php echo base_url(); ?>/public/assets/img/logo.png" alt="Admin Logo" class="brand-image ">
        <!--<span class="brand-text font-weight-light">Admin</span>-->
    </a>
    <!-- Sidebar -->
    <div class="sidebar" >
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>/public/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"
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
                <li class="nav-item  has-treeview ">
                    <a href="<?php echo base_url('index.php/admin/dashboard'); ?>" class="nav-link dashboard"> <i class="fas fa-tachometer-alt "></i>
                        <p >Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link user"> <i class="fa fa-user-times mr-1" aria-hidden="true"></i>
                        <p>Users <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="<?php echo base_url('index.php/admin/store-manager'); ?>" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Store Manager</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/users/agent-session'); ?>" class="nav-link agent-session"> <i class="far fa-circle nav-icon"></i>
                                <p>User Agent Session</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo base_url('index.php/admin/store-target-setting'); ?>" class="nav-link store-target-setting"> <i class="fa fa-bullseye" aria-hidden="true"></i>
                        <p>Store Target Setting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript::void(0)" class="nav-link masters">
                        <i class="fa fa-database mr-1" aria-hidden="true"></i>
                        <p>Masters</p>
                        <i class="fas fa-angle-left right" aria-hidden="true"></i></a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/category'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/sub-category'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>Sub Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/product-line'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>Product Line</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link product">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <p>Products</p>
                        <i class="fas fa-angle-left right" aria-hidden="true"></i>
                    </a>

                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/products'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/products/update-mrp'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>UpdateMRP</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item ">
                    <a href="<?php echo base_url('index.php/admin/catalogue-upload'); ?>" class="nav-link catalogue-upload">
                        <i class="fa fa-upload" aria-hidden="true"></i>
                        <p>
                            Catalogue Upload
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="<?php echo base_url("index.php/admin/inventory"); ?>" class="nav-link inventory">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <p>
                            Inventory
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?php echo base_url('index.php/admin/featured-category'); ?>" class="nav-link featured-category">
                        <i class="fa fa-th-large" aria-hidden="true"></i>
                        <p>
                            Featured Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="<?php echo base_url('index.php/admin/customers'); ?>" class="nav-link customers">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>
                            Customers
                        </p>
                    </a>

                </li>

                <li class="nav-item ">
                    <a href="#" class="nav-link sales">
                        <i class="fas fa-balance-scale" aria-hidden="true"></i>
                        <p>
                            Sales
                            <i class="fas fa-angle-left right" aria-hidden="true"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/sales'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>Sales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('index.php/admin/sales/net-sale'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                                <p>Dispatched</p>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item ">
                    <a href="<?php echo base_url("index.php/admin/home-banner"); ?>" class="nav-link home-banner">
                        <i class="fab fa-accusoft" aria-hidden="true"></i>
                        <p>
                            Home Banner
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="<?php echo base_url('index.php/admin/feedback'); ?>" class="nav-link feedback"> <i class="fa fa-thumbs-up " aria-hidden="true"></i>
                        <p>Feedback</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?php echo base_url('index.php/admin/reports'); ?>" class="nav-link reports"> <i class="fa fa-bug" aria-hidden="true"></i>
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
<script>
$(document).ready(function (w) {
    // <!-- var string = document.URL;
   
    // string = string.split("/"); 
    // last_header = string[string.length - 1];
    // if(last_header == "featured-category"){
    //    $('.featured-category').addClass('active');
    // }else if(last_header == "dashboard"){
    //     $('.dashboard').addClass('active');
    // }else if(last_header == "catalogue-upload"){
    //     $('.catalogue-upload').addClass('active');
    // }else if(last_header == "inventory"){
    //     $('.inventory').addClass('active');
    // }else if(last_header == "customers"){
    //     $('.customers').addClass('active');
    // }else if(last_header == "home-banner"){
    //     $('.home-banner').addClass('active');
    // }else if(last_header == "feedback"){
    //      $('.feedback').addClass('active');
    // }else if(last_header == "store-target-setting"){
    //      $('.store-target-setting').addClass('active');
    // }else if((last_header == "store-manager") || (last_header == "agent-session")){
    //     $('.user').addClass('active');
    // }else if((last_header == "category") || (last_header == "sub-category") | (last_header == "product-line")){
    //     $('.masters').addClass('active');
    // }else if((last_header == "products") || (last_header == "update-mrp")){
    //     $('.product').addClass('active');
    // }else if((last_header == "sales") || (last_header == "net-sale")){
    //     $('.sales').addClass('active');
    // }
    
    // $('.nav li a').click(function(e) {
    //     $('.nav li a.active').removeClass('active');
    //    var $parent = $(this).parent();
    //     $(this).addClass('active');
    // }); 
  
}); 
</script>