<style>
.table td, .table th {
    padding-top: 0.25rem;
    padding-right: 0.75rem;
    padding-bottom: 0.25rem;
    padding-left: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.container, .container-lg, .container-md, .container-sm, .container-xl {
    /* max-width: 1080px; */
}


</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="zoom:90%">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Dispatched</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-outline-info btn-lg"
                                style="padding: 0px 40px; float:right;">
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                 class="bi bi-file-earmark-spreadsheet-fill"
                                 style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                            </svg>
                            <span> Excel Export</span>
                        </button>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--selection box-->


    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 mb-3">
            <select  id = "net_store_id"  data-style="bg-whitesmoke px-3" class="selectpicker w-99" title="Select Store Id*" style="height: 30px" multiple>
                        <?php
                        if (isset($store_id) && count($store_id) > 0) {
                            foreach ($store_id as $store_id) {
                                echo "<option value='" . $store_id->store_id . "'>$store_id->store_id</option>";
                            }
                        }
                    ?>
                </select>

            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">

                <select id = "net_year_filter" data-style="bg-whitesmoke px-3" class="selectpicker w-99" title="Select FY*"
                        style="height: 30px">
                        <option selected  >Select FY*</option>
                    <option  value ="2021">2021</option>
                    <option  value ="2020">2020</option>
                    <option value ="2019">2019</option>
                    <option value ="2018">2018</option>
                    <option value ="2017">2017</option>
                </select>

            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">

                <select id="net_month_filter" multiple data-style="bg-whitesmoke px-3" class="selectpicker w-99" title="Select Month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>

            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <button type="button" class="btn btn-outline-info btn-lg" onclick="submitFilter()"
                        style="text-align: center; font-size:18px; padding: 3px 84px">Submit
                </button>
            </div>
        </div>

        <!--selection box end-->


        <!--table-->
        <div class="container">


            <div class="card-body table-responsive">

                <!-- Info boxes -->
                <div class="row">

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-5">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-graph-up" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h1v16H0V0zm1 15h15v1H1v-1z"/>
                                <path fill-rule="evenodd"
                                d="M14.39 4.312L10.041 9.75 7 6.707l-3.646 3.647-.708-.708L7 5.293 9.959 8.25l3.65-4.563.781.624z"/>
                                <path fill-rule="evenodd"
                                d="M10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4h-3.5a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </span>

                        <div class="info-box-content">
                            <span id ="mtdNetSale"class="info-box-text"><br>
                            </span><br>
                            <span class="info-box-number ml-auto">MTD<br>
                            Net Sales Amount</span>
                        </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-5">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" id="lastMonthNetSale" value=""></span><br>
                                <span class="info-box-number ml-auto">Last Month<br>Net Sales Amount</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div>
        </div>
        <!-- Main content -->
    </div>
    <!-- /.content -->
</div>
<script>
$(document).ready(function (w) {
    var current_year = new Date().getFullYear();
    $('#net_year_filter').val(current_year);
    netSaleCal("",current_year,"");
});
 
function submitFilter(){
    var store_id_filter = $('#net_store_id').val();
    var year_filter = $('#net_year_filter').val();
    var month_filter = $('#net_month_filter').val();
    if(store_id_filter == ""){
        alert("Please Select at least one store id, it is mandatory!");
    }else{
        if(year_filter == "Select FY*"){
            alert("Please Select financial year , it is mandatory!");
        }
    }
    if(store_id_filter != "" && year_filter != "Select FY*"){
        netSaleCal(store_id_filter,year_filter,month_filter);
    }
    
}
function netSaleCal(store_id_filter,year_filter,month_filter){
    $.ajax({
        url:"<?php echo base_url('index.php/admin/sales/get-sale-net-sale-caldata'); ?>",
        data: { 
            store_id_filter:store_id_filter,
            year_filter:year_filter,
            month_filter:month_filter,
        },
        type: "POST",
        dataType: "JSON",
        cache: false,
        success: function(response)
        {
            $('#lastMonthNetSale').text("₹"+response.lastMonthNetSale);
            $('#mtdNetSale').text("₹"+response.mtdNetSaleValue);
        }
    });
}
</script>