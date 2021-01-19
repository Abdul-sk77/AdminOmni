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
    /* max-width: 1100px; */
}

</style>
<div class="content-wrapper" style="zoom:90%">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Customer</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <button type="button" onclick="expotExcelCustomer();" class="btn btn-outline-info btn-lg" style="padding: 0px 70px; float:right;">

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                        style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                    </svg>
                    <span> Excel Export</span>
                    </button>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="container mb-3">
        <div class="row">
            
            <div class="col-12 col-sm-2 col-md-2 px-1">

            </div>

            <div class="btn-group px-2 ml-auto" role="group" aria-label="forth group">
                <!-- <button type="button" class="btn btn-outline-info btn-lg" style="padding: 0px 70px; float:right;">

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                         style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                    </svg>
                    <span> Excel </span>
                </button> -->
            </div>

        </div>
    </div>
    <!--table-->
    <div class="container">
        <div class="card mt-2">

            <div class="card-body table-responsive">
                <table id="customer_table" class="table table-striped table-bordered mydatatable bg-light">
                    <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Mobile No</th>
                        <th scope="col">Customer Email</th>
                        <th scope="col">News Letter</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <!-- model 0n view -->
      
       
       
        <div class="modal fade" id="myMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="zoom:90%;">
                    <div class="modal-body">
                        <ul class="nav nav-pills nav-justified mb-3" id="myTab" role="tablist">
                            <li class="nav-item active"
                                style=" background-color: #66666687; margin-right: 5px; color: #000; border-radius:4px">
                                <a class="nav-link active" data-toggle="pill" href="#pills-customer" role="tab" id="customer"
                                   aria-selected="true" style="color:#fff;">Customer Details</a>
                            </li>
                            <li class="nav-item"
                                style=" background-color: #66666687; margin-right: 5px; color: #000; border-radius:4px">
                                <a class="nav-link" data-toggle="pill" href="#pills-order" role="tab" id="order"
                                   aria-selected="false" style="color:#fff;">Customer Order Details</a>
                            </li>
                        </ul>
                        <!-- tab table customer Details-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="pills-customer">
                                <form id="customer_form">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name">
                                        </div>

                                        <div class="col">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name">
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>

                                        <div class="col">
                                            <label for="mobile_no">Mobile No</label>
                                            <input type="tel" class="form-control" name="mobile_no" id="mobile_no">
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        
                                        <div class="col">
                                            <label for="gender">Gender</label>
                                            <input type="text" class="form-control" name="gender" id="gender">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-6">
                                            <label for="news">News Letter</label>
                                            <input type="text" class="form-control" name="news" id="news">
                                        </div>
                                      
                                    </div>

                                </form>

                                <!-- <a class="btn btn-primary btn-sm btn-Next"
                                   <!-- style="float: right; padding: 4px 40px; margin-top: 16px; color: white;">Next</a> -->
                                <a class="btn btn-secondary btn-sm" data-dismiss="modal"
                                   style=" float:right; margin-right: 5px; padding: 4px 40px;margin-top: 16px;color: white;">Close</a> 
                            </div>
                            <!-- tab table customer-->
                            <div class="tab-pane" id="pills-order">
                                <div class="card table-responsive">
                                    <table id="cust_order" class="table table-borderless  mydatatable table-image">
                                        <thead style="background-color: #f1efef;border: 1px solid #f1efef;">
                                        <tr>
                                            <th scope="col">Sr. No</th>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Agent ID</th>
                                            <th scope="col">Bill Amount</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">Current Order Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <a class="btn btn-secondary btn-sm" data-dismiss="modal"
                                   style=" float:right;padding: 4px 40px;margin-top: 16px;color: white;">Close</a>
                                <!-- <a class="btn btn-primary btn-sm btn-Previous"
                                   style="float: right; margin-right:5px; padding: 4px 40px;margin-top: 16px;color: white">Previous</a> -->
                            </div>
                            <!-- modal table customer end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

         <div class="modal fade" id="view_order_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg" >
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

    </div>


</div>
<script>
  $('[data-dismiss=modal]').on('click', function (e) {
    var $t = $(this),
        target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

$(target)
    .find("input,textarea,select,fieldset")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();

 $('#customer_form')[0].reset();
  
})
    $(document).ready(function (){
         var orderDetailsTable = $("#customer_table").dataTable({
            "bLengthChange": true,
            "bPaginate": true,
            "bInfo": true,
            "autoWidth": false,
            "serverSide": true,
            'processing': true,
            "destroy": true,
            "order": [[ 0, "desc" ]],
            // "ordering":false,
            'language': {
                // 'loadingRecords': '&nbsp;',
                'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
            },
            ajax:{
            url:  "<?php echo base_url('index.php/admin/customer/get-customer-griddata'); ?>",
            type: "POST",
            },
            aoColumns: [
                { mData: 'id',width:"8%" },
                { mData: 'fullname',width:"25%" },
                { mData: 'phone_no',width:"20%" },
                { mData: 'email',width:"25%" },
                
                { mData: 'news_letter_subscription',width:"15%" },
                {
                    orderable:false,
                    data: null,
                    className: "center",
                    defaultContent: '<center><a style="margin-left: 20%;"href="" class="fas fa-eye  view_customer" ></a></center>'
                }
            ],
        });
        $('#customer_table').on('click', 'a.view_customer', function (e) {
            $('#customer').click();
            e.preventDefault();
            const tableStore = $('#customer_table').DataTable();
            const tr = $(this).parents('tr');
            const row_id = tableStore.row( tr ).data().id;
            
            $.ajax({
                url:  "<?php echo base_url('index.php/admin/customer/getcustomer'); ?>",
                data: "id="+row_id,
                type: "GET",
                dataType: "JSON",
                cache: false,
                success: function(response)
                {
                    $('#first_name').val(response.data[0].first_name);
                    $('#last_name').val(response.data[0].last_name);
                    $('#email').val(response.data[0].email);
                    $('#mobile_no').val(response.data[0].phone_no);
                    $('#birthdate').val(response.data[0].birth_date);
                    $('#gender').val(response.data[0].gender);
                    $('#news').val(response.data[0].news_letter_subscription);
                }
            });
            $('#myMod').modal('show');
            var orderDetailsTable = $("#cust_order").dataTable({
            "bLengthChange": true,
            "bPaginate": true,
            "bInfo": true,
            "autoWidth": false,
            "serverSide": true,
            'processing': true,
            "destroy": true,
            "ordering":false,
            'language': {
                // 'loadingRecords': '&nbsp;',
                'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
            },
            ajax:{
            url:  "<?php echo base_url('index.php/admin/customer/get-order-asper-customer'); ?>",
            type: "POST",
            data:function(data){ 
                data.id = row_id;
					}
            },

            aoColumns: [
                { mData: 'id',width:"4%" },
                { mData: 'order_id',width:"8%" },
                { mData: 'agent_id',width:"17%" },
                { mData: 'bill_amount',width:"10%", "render" : function(data)
                    {
                        return data+'/-';
                    },
                },
                { mData: 'order_date',width:"10%" },
                { mData: 'order_status',width:"15%" },
                { mData: 'current_order_status',width:"15%" },
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
        $('#cust_order').on('click', 'a.view_order', function(e) {
            e.preventDefault();
            // alert("priyanka");
            const tableStore = $('#cust_order').DataTable();
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
    });
    function expotExcelCustomer(){
        var searchValue = $('.dataTables_filter input').val();
        window.location ="<?php echo base_url('index.php/admin/export-customer'); ?>?searchValue="+searchValue;  
    }
</script>