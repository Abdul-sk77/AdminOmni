<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/dist/sansfontpro.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/dist/fontsanscss.css">
    <!-- Font Awesome -->

    <!-- jsGrid -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/plugins/jsgrid/jsgrid-theme.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/dist/css/adminlte.min.css">




    <!-- jQuery library -->
    <script src="<?php echo base_url(); ?>/public/assets/dist/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="<?php echo base_url(); ?>/public/assets/dist/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?php echo base_url(); ?>/public/assets/dist/bootstrap.min.js"></script>

    <script src='<?php echo base_url(); ?>/public/assets/dist/a076d05399.js'></script>




    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/dist/bootstrap-select.css"/>
    <script src="<?php echo base_url(); ?>/public/assets/dist/jquery2.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/assets/dist/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/assets/dist/bootstrap-select.min.js"></script>

    <script src="<?php echo base_url(); ?>/public/assets/dist/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/assets/dist/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/assets/dist/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>

    <script>
        $(function(){
            $('.btn-Next').click(function(){
                $('.nav-pills > .nav-item > .active').parent().next('li').find('a').trigger('click');
            });

            $('.btn-Previous').click(function(){
                $('.nav-pills > .nav-item > .active').parent().prev('li').find('a').trigger('click');
            });
        });

    </script>

    <!-- multiselect picker -->


    <!-- browse file -->
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>


    <style>
        .bootstrap-select > .dropdown-toggle {
            height: 35px;
            border: 1px solid #17a2b8;
            border-radius: 5px;
        }.filter-option-inner{
            margin-top:-3px;
            color: #1797EA ;
        }.table-image thead {
            border: 1px solid #ced4da;
            background-color: white;
        }#example_paginate{
            float:right;
        }#example_length{
            display:none;
        }
        /*  toggle button*/
    </style>
</head>

<body id="page-top" class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<!-- Page Wrapper -->
<div id="wrapper">

    <!--  SIDEBAR   -->
        <?php echo view('backend/sidebar'); ?>
    <!--  SIDEBAR   -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
                <?php echo view('backend/header'); ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
                <?php echo $load_view; ?>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php echo view('backend/footer'); ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<script>

    $('.mydatatable').dataTable( {
        searching: false,
        ordering: false,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ] ,
        createdRow: function( row, data,index ){

        }
    } );


</script>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/public/assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>/public/assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url(); ?>/public/assets/dist/js/pages/dashboard2.js"></script>

</body>

</html>
