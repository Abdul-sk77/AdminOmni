<style>
table.dataTable tbody th, table.dataTable tbody td {
    padding: 2px 7px;
}
table.dataTable thead th, table.dataTable thead td {
    padding: 5px 7px;
}
.table-bordered td, .table-bordered th {
    border-left: 1px solid #dee2e6;
    border-right: 0px solid #dee2e6;
    border-top: 0px solid #dee2e6;
}
.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0,0,0,.01);
}
.container, .container-lg, .container-md, .container-sm, .container-xl {
    /* max-width: 1450px; */
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="zoom:90%;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sales</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" onclick="smSaleExpotExcel();" class="btn btn-outline-info btn-lg" style="padding: 0px 70px; float:right;">

                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
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

                <select  id = "agent_id"  data-style="bg-whitesmoke px-3" class="selectpicker w-99" title="Select Agent Id*" style="height: 30px" multiple>
                <!-- <option selected  >Select Store Id*</option> -->
                    <?php
                        if (isset($agent_id) && count($agent_id) > 0) {
                            foreach ($agent_id as $agent_id) {
                                echo "<option value='" . $agent_id->agent_id . "'>$agent_id->agent_id</option>";
                            }
                        }
                    ?>
                </select>

            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">

                <select  id = "year_filter" data-style="bg-whitesmoke px-3" class="selectpicker w-99"  style="height: 30px">
                    <option selected  >Select FY*</option>
                    <option  value ="2021">2021</option>
                    <option  value ="2020">2020</option>
                    <option value ="2019">2019</option>
                    <option value ="2018">2018</option>
                    <option value ="2017">2017</option>
                </select>

            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">

                <select   id = "month_filter" data-style="bg-whitesmoke px-3" class="selectpicker w-99"  multiple title="Select Month">
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
                <button onclick="submitFilter()" id ="submit_button" type="button" class="btn btn-outline-info btn-lg" style="text-align: center; font-size:20px; padding: 3px 84px">Submit</button>
            </div>
           
        </div>
    </div>
    <!--selection box end-->
    <!--search box-->


    <div class="container">

        
    </div>
    <!--search end-->
    <!--table-->
    <div class="container mt-3">

        <div class="card">
            <div class="card-body table-responsive">
                <table id="order_details_table" class="table table-striped table-bordered mydatatable bg-light" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order Id</th>
                        <th>Bill Amount</th>
                        <th>Customer Email</th>
                        <th>Customer Phone No. </th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Current Order Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                   
                </table>
            </div>
        </div>
    </div>
    <!-- Main content -->



    </section>
    <div class="modal fade" id="view_order_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style= "zoom:90%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Sale</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="view_error_div" class="error_div"></div>
                    <form name="order_form" id="view_order_form" method="post" action="#" >
                        <div class="form-row">
                            <div class="col-4">
                                <label for="formGroupExampleInput">Order ID</label>
                                <input type="text" class="form-control form-control-sm " id="view_order_id" name="view_order_id">
                            </div> 
                            <div class="col-4">
                                <label for="formGroupExampleInput2">Bill Amount</label>
                                <input type="text" class="form-control form-control-sm" id="view_bill_amount" name="view_bill_amount">
                            </div>
                            <div class="col-4">
                                <label for="formGroupExampleInput2">Order Date</label>
                                <input type="text" class="form-control form-control-sm" id="view_order_date" name="view_order_date">
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label for="formGroupExampleInput2">Order status</label>
                                <input type="text" class="form-control form-control-sm" id="view_order_status" name="view_order_status">
                            </div>
                            <div class="col-4">
                                <label for="formGroupExampleInput2">Current Order Status</label>
                                <input type="text" class="form-control form-control-sm" id="view_current_order_status" name="view_current_order_status">
                            </div>
                            <div class="col-4">
                                <label for="formGroupExampleInput2">Customer Email</label>
                                <input type="text" class="form-control form-control-sm" id="view_customer_email" name="view_customer_email">
                            </div>
                            
                           
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label for="formGroupExampleInput">Customer Phone No.</label>
                                <input type="text" class="form-control form-control-sm " id="view_customer_phone" name="view_customer_phone">
                            </div> 
                            <div class="col-4">
                                <label for="formGroupExampleInput">SKU ID</label>
                                <input type="text" class="form-control form-control-sm " id="view_sku_id" name="view_sku_id">
                            </div> 
                            <div class="col-4">
                                <label for="formGroupExampleInput2">SKU Name</label>
                                <input type="text" class="form-control form-control-sm" id="view_sku_name" name="view_sku_name">
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label for="formGroupExampleInput2">quantity</label>
                                <input type="text" class="form-control form-control-sm" id="view_qty" name="view_qty">
                            </div>
                            <div class="col-4">
                                <label for="formGroupExampleInput">Line Item Status</label>
                                <input type="text" class="form-control form-control-sm " id="view_line_item_status" name="view_line_item_status">
                            </div> 
                            
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function (){
        var current_year = new Date().getFullYear();
        $('#year_filter').val(current_year);
        var orderDetailsTable = $("#order_details_table").dataTable({
            // "bLengthChange": true,
            "bPaginate": true,
            "bInfo": true,
            "autoWidth": false,
            "serverSide": true,
            'processing': true,
            "destroy": true,
            "order":[[0,"desc"]],
            'language': {
                // 'loadingRecords': '&nbsp;',
                'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
            },
            // "scrollX": true,
            ajax:{
            url:  "<?php echo base_url('index.php/admin/sales/get-sale-order-griddata'); ?>",
            type: "POST",
            data:function(data){ 
                data.agent_filter = $('#agent_id').val();
                data.year_filter = $('#year_filter').val();
                data.month_filter = $('#month_filter').val();
					}
            },

            aoColumns: [
                { mData: 'id',width:"4%" },
                { mData: 'order_id',width:"9%" },
                { mData: 'bill_amount',width:"11%", "render" : function(data)
                    {
                        return data+'/-';
                    },
                },
                { mData: 'customer_email',width:"15%" },
                { mData: 'customer_phone_no',width:"17%" },
                { mData: 'order_date',width:"12%" },
                { mData: 'order_status',width:"14%" },
                { mData: 'current_order_status',width:"17%" },
                {
                    orderable:false,
                    width:"10%",
                    data: null,
                    className: "center",
                    defaultContent: '<center><a href="" class="fas fa-eye  view_order" ></a> </center>'
                }
                
            ],
            
        });

       
    });
    $('#order_details_table').on('click', 'a.view_order', function(e) {
        e.preventDefault();
        // alert("priyanka");
        const tableStore = $('#order_details_table').DataTable();
        const tr=  $(this).parents('tr');
        const order_id = tableStore.row( tr ).data().order_id;
        $('#view_order_id').val(order_id);
        $('#view_bill_amount').val(tableStore.row( tr ).data().bill_amount);
        $('#view_customer_email').val(tableStore.row( tr ).data().customer_email);
        $('#view_customer_phone').val(tableStore.row( tr ).data().customer_phone_no);
        $('#view_order_status').val(tableStore.row( tr ).data().order_status);
        $('#view_order_date').val(tableStore.row( tr ).data().order_date);
        $('#view_current_order_status').val(tableStore.row( tr ).data().current_order_status);
        $('#view_sku_id').val(tableStore.row( tr ).data().sku_id);
        $('#view_sku_name').val(tableStore.row( tr ).data().sku_name);
        $('#view_qty').val(tableStore.row( tr ).data().qty);
        $('#view_line_item_status').val(tableStore.row( tr ).data().line_item_status);
        $('#view_order_modal').modal('show');
    });
    function submitFilter(){
        var agent_id_filter = $('#agent_id').val();
        var year_filter = $('#year_filter').val();
        if(agent_id_filter == ""){
            alert("Please Select at least one agent id, it is mandatory!");
        }else{
            if(year_filter == "Select FY*"){
                alert("Please Select financial year , it is mandatory!");
            }
        }
        if(year_filter != "" && agent_id_filter ==""){
            alert("Please Select at least one agent id, it is mandatory!");
        }
        $('#order_details_table').DataTable().ajax.reload();
    }
    function smSaleExpotExcel(){
        var searchValue = $('.dataTables_filter input').val();
        window.location ="<?php echo base_url('index.php/sm/export-sale'); ?>?searchValue="+searchValue;  
    }
</script>