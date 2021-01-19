<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/sansfontpro.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/fontsanscss.css">
    <!-- Font Awesome -->
    <!-- jsGrid -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/plugins/jsgrid/jsgrid-theme.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/theme.css">
    <!-- jQuery library -->
    <script src="<?php echo base_url(); ?>/public/assets/jquery-3.3.1.min.js"></script>
    <!-- Popper JS -->
    <script src="<?php echo base_url(); ?>/public/assets/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="<?php echo base_url(); ?>/public/assets/bootstrap.min.js"></script>
    <script src='<?php echo base_url(); ?>/public/assets/a076d05399.js'></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/bootstrap-select.css"/>
    <script src="<?php echo base_url(); ?>/public/assets/jquery2.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/assets/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/assets/bootstrap-select.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>/public/assets/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/assets/dataTables.bootstrap4.min.js"></script> -->
    <script src="<?php echo base_url(); ?>/public/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/assets/js/additional-methods.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/assets/js/jquery.steps.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/jquery.steps.css">
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>
    <script>
        // $(function () {
        //     $('.btn-Next').click(function () {
        //         $('.nav-pills > .nav-item > .active').parent().next('li').find('a').trigger('click');
        //     });
        //
        //     $('.btn-Previous').click(function () {
        //         $('.nav-pills > .nav-item > .active').parent().prev('li').find('a').trigger('click');
        //     });
        // });
    </script>
    <!-- multiselect picker -->
    <!-- browse file -->
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<input type="hidden"  class="csrf_token"   />
<div class="wrapper">
    <!-- Navbar -->
        
    <!-- /.navbar -->

    <!--  SIDEBAR   -->

    <?php
   
        if($this->session->has_userdata('role_type')){

            if($this->session->userdata('role_type') == 1){
                 $this->load->view('backend/sidebar-admin');
            }else{
                $this->load->view('backend/sidebar');
            }
        }
    ?>
  
</div>
</section>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar  close-->
<!-- Content Wrapper end. Contains page content -->
</div>
<!-- ./wrapper end -->
</div>
<script>
    $('.mydatatable').dataTable({
        searching: false,
        ordering: false,
        sorting:false,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        createdRow: function (row, data, index) {

        }
    });

</script>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/public/assets/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>/public/assets/js/demo.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/chart.js/Chart.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url(); ?>/public/assets/js/pages/dashboard2.js"></script>

<script src="<?php echo base_url(); ?>/public/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/js/additional-methods.min.js"></script>


</body>

</html>