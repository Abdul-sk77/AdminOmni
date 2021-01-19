<style>

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="zoom:90%;">
    <!-- Left navbar links -->
    
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <h6 class="m-0 text-dark" style="padding-top:0.5rem">Store ID: <?php
       
         echo $this->session->userdata('store_id'); ?></h6>
      
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="<?php echo base_url('index.php/sm/logout'); ?>" role="button"> <i
                        class="fa fa-power-off " style="color:red"  ></></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->