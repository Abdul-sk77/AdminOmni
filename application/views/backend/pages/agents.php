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
<div class="content-wrapper" style="zoom:90%;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Agents</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="container mb-3">
        <div class="row">
            <div class="col-12 col-sm-2 col-md-2 px-1" style="text-align:center">
                <button type="button"  class="btn btn-outline-info btn-lg" style="padding: 4px 10px;">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                         style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                    </svg>
                    <span>Excel Upload</span>
                </button>
            </div>

            <div class="col-12 col-sm-2 col-md-2 px-1" style="text-align:center">
                <button type="button" class="btn btn-outline-info btn-lg" style="padding: 4px 10px;" id="add_agent_btn">
                    Add New Agent
                </button>
            </div>

            <div class="col-12 col-sm-2 col-md-2 px-1" style="text-align:center">
                <button type="button" onclick ="agentExpotExcel();" class="btn btn-outline-info btn-lg" style="padding: 4px 10px;">
                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                         style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                    </svg>
                    <span> Excel Export</span>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
           
            <div class="card-body table-responsive">
                <table id="agent_table" class="table table-striped table-bordered bg-light"
                       style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Store ID</th>
                        <th>Agent Id</th>
                        <th>Agent Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <!-- model 0n view -->
        <div class="modal fade" id="agent_modal_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Agent Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form name="agent_view_form" id="agent_view_form" method="post">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Agent Name</label>
                                <input type="hidden" class="form-control form-control-sm " id="agnt_view_id" name="agnt_view_id">
                                <input type="text" class="form-control form-control-sm " id="agent_view_name" name="agent_view_name">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Agent ID</label>
                                <input type="text" class="form-control form-control-sm" id="agent_view_id" name="agent_view_id">
                            </div>
                            <div class="form-group">
                                <label for="" style="text-align: center">Status</label>
                                <select class="form-control" name="view_status"  id="view_status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <!-- <label id="status-error" class="error" for="status"  style="display: inline-block;"></label> -->
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control form-control-sm" type="password" name="agent_view_password" id="agent_view_password">
                                    <div class="input-group-prepend"
                                        style="border: 1px solid #ced4da; border-left: none; padding: 0px 5px;">
                                        <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
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
         <!-- Add modal -->
        <div class="modal fade" id="agent_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add Agent</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="error_div" class="error_div"></div>
                        <form name="agent_form" id="agent_form" method="post">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Agent Name</label>
                                <input type="hidden" class="form-control form-control-sm " id="agnt_id" name="agnt_id">
                                <input type="text" class="form-control form-control-sm " id="agent_name" name="agent_name">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Agent ID</label>
                                <input type="text" class="form-control form-control-sm" id="agent_id" name="agent_id">
                            </div>
                            <div class="form-group">
                                <label for="" style="text-align: center">Status</label>
                                <select class="form-control" name="status"  id="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <!-- <label id="status-error" class="error" for="status"  style="display: inline-block;"></label> -->
                            </div>
                            <!-- <div class="form-group">
                                <label for="formGroupExampleInput2">Email</label>
                                <input type="text" class="form-control form-control-sm" id="email" name="email">
                            </div> -->
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control form-control-sm" type="password" name="password" id="password">
                                    <div class="input-group-prepend"
                                         style="border: 1px solid #ced4da; border-left: none; padding: 0px 5px;">
                                        <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Confirm password</label>
                                <input type="password" class="form-control form-control-sm" id="cpassword"
                                       name="cpassword">
                            </div>
                           
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <!-- start Delete  Modal -->
        <div id="deleteModalAgent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="height:220px;width:100%;margin-left: 40px;" >
                <div class="modal-header">
                    <h3>Warning</h3>
                </div>
                <div class="modal-body">
                    <p>Deleting agent will delete the related data like targets and all.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
                    <button class="btn btn-primary" style="height: 3.25rem;" id ="deleteButton">Yes</button>
                </div>
                </div>
            </div>
        </div>
        <!-- End Delete Modal -->
        <!-- start toggleOn  Modal -->
        <div id="toggleOnModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="height:220px;width:100%;margin-left: 40px;" >
                <div class="modal-header">
                    <h3>Active Agents</h3>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Deactivate this Agents?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
                    <button class="btn btn-primary" style="height: 3.25rem;" id ="toggleOnButton">Yes</button>
                </div>
                </div>
            </div>
        </div>
        <!-- End toggleOn Modal -->
        <!-- start toggleOff  Modal -->
        <div id="toggleOffModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="height:220px;width:100%;margin-left: 40px;" >
                <div class="modal-header">
                    <h3>Deactive Agents</h3>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Activate this Agents?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
                    <button class="btn btn-primary" style="height: 3.25rem;" id ="toggleOffButton">Yes</button>
                </div>
                </div>
            </div>
        </div>
        <!-- End toggleOff Modal -->
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


    var validator =$('#agent_form').validate();
    validator.resetForm();
    $(".error_div").html('');
    })
    // $("#agent_table").dataTable();
    $(document).on('click','#add_agent_btn',function (){
       $("#agent_modal").modal("show");
    });


    $(document).on('click','#update_agent',function (e){
        e.preventDefault();
        var agnt_id = $(this).data('id');

        var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
        var csrfHash = $('.csrf_token').val(); // CSRF hash

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/sm/agents/get-agent-data'); ?>"+"/"+agnt_id,
            data: { agnt_id: agnt_id, [csrfName]: csrfHash  },
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {

                var result = response; // JSON.parse(response);
                console.log(result);
                return false;
                if(result.status){
                    $(".csrf_token").val(result.token);
                    $("#category").val(result.data[0].category_name);
                    $("#description").val(result.data[0].description);
                    $("#status option[value="+result.data[0].status+"]").prop('selected', true);
                    setTimeout(function (){
                        $("#category_id").val(category_id);
                        $('.csrf_token').val(result.csrfHash);
                        $("#agent_modal").modal("show");
                    },1000)

                }else{
                    $('.error_div').html(result.errors);
                }


            }
        });
    });
    var agentTable = $("#agent_table").dataTable({
        "bLengthChange": true,
        "bPaginate": true,
        "bInfo": true,
        "autoWidth": false,
        'processing': true,
        "serverSide": true,
        "order":[[0,"desc"]],
        'language': {
                // 'loadingRecords': '&nbsp;',
                'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
            },
        ajax:{
        url:  "<?php echo base_url('index.php/admin/agents/get-agents-for-sm'); ?>",
        type: "POST",
        dataType: "JSON",
        cache: false,
        },
        aoColumns: [
            { mData: 'id',width:"5%" },
            { mData: 'store_id',width:"20%" },
            { mData: 'agent_id',width:"20%" },
            { mData: 'agent_name',width:"20%" },
            { data: 'status', width:"15%", "render" : function(data)
                    {
                        if (data == "1") {
                            return '<center> <a class="switch view_active"><input type="checkbox" checked><span class="slider round"></span></a></center>'
                        }else{
                            return '<center> <a class="switch view_deactive"><input type="checkbox" ><span class="slider round"></span></a></center>'
                        }
                    },},
            {
                orderable:false,
                width:"5%",
                data: null,
                className: "center",
                defaultContent: '<center><a href="" class="fas fa-eye  view_agents" ></a><a style="margin-left: 20%;"href="" class="fas fa-trash  view_delete" ></a></center>'
            }
        ],
	});
    $("#agent_table").on('click', 'a.view_agents', function(e) {
        e.preventDefault();
        const tableStore = $("#agent_table").DataTable();
        const tr=  $(this).parents('tr');
        const row_id = tableStore.row( tr ).data().id;
        $('#agent_modal_view').modal('show');
        $.ajax({
            url: "<?php echo base_url('index.php/admin/agents/agent-get-view-data'); ?>",
            data: "id="+row_id,
            type: "GET",
            dataType: "JSON",
            cache: false,
            success: function(response)
            {
                $('#agent_view_name').val(response.data[0].agent_name);
                $('#agent_view_id').val(response.data[0].agent_id);
                $('#agent_view_password').val(response.data[0].password);
                if(response.data[0].status == "1"){
                $('#view_status').val("1");
                }else{
                $('#view_status').val("0");
                }
                
            }
        });
    });
    $("#agent_table").on('click', 'a.view_delete', function(e) {
        e.preventDefault();
        const tableStore = $("#agent_table").DataTable();
        const tr=  $(this).parents('tr');
        const row_id = tableStore.row( tr ).data().id;
        const row_agent_status = tableStore.row( tr ).data().status;
        if(row_agent_status =="0"){
            $('#deleteModalAgent').modal('show');
            $("#deleteButton").unbind('click');
            $('#deleteButton').on('click', function(e) {
                $('#deleteModalAgent').modal('hide');
                $.ajax({
                    url:"<?php echo base_url('index.php/admin/agents/agent-delete'); ?>",
                    data:"id="+row_id,
                    type:"POST",
                    dataType:"JSON",
                    cache:false,
                    success:function(response)
                    {
                        alert("Agent Deleted Successfully.");
                        $('#agent_table').DataTable().draw();
                    }
                });
            });
        }else{
            alert("This agent can't delete, because its active agent.");
        }
        
    });
    $('#agent_table').on('click', 'a.view_active', function (e) {
        e.preventDefault();
        const tableStore = $('#agent_table').DataTable();
        const tr=  $(this).parents('tr');
        const row_id = tableStore.row( tr ).data().id;
        $('#toggleOnModal').modal('show');
        $("#toggleOnButton").unbind('click');
        $('#toggleOnButton').on('click', function(e) {
        $('#toggleOnModal').modal('hide');
        $.ajax({
            url:  "<?php echo base_url('index.php/admin/agents/agent-deactive'); ?>",
            data: "id="+row_id,
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(response)
                {
                alert("Agents Deactivated successfully.");
                $('#agent_table').DataTable().draw();
                }
            });
        });
    });
    $('#agent_table').on('click', 'a.view_deactive', function (e) {
        e.preventDefault();
        const tableStore = $('#agent_table').DataTable();
        const tr=  $(this).parents('tr');
        const row_id = tableStore.row( tr ).data().id;
        $('#toggleOffModal').modal('show');
        $("#toggleOffButton").unbind('click');
        $('#toggleOffButton').on('click', function(e) {
            $('#toggleOffModal').modal('hide');
            $.ajax({
                url:  "<?php echo base_url('index.php/admin/agents/agent-active'); ?>",
                data: "id="+row_id,
                type: "POST",
                dataType: "JSON",
                cache: false,
                success: function(response)
                {
                alert("Agent Activated successfully.");
                $('#agent_table').DataTable().draw();
                }
            });
        });
    });

    $(function (){
        jQuery.validator.addMethod("aphaonly", function (value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        }, "Please enter valid name");

        jQuery.validator.addMethod("alphanumeric", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9 ]*$/.test(value);
        }, "Please enter valid value.");

        jQuery.validator.addMethod("onlyNumber", function (value, element) {
            return this.optional(element) || /^[0-9]*$/.test(value);
        }, "Please enter valid value.");

        jQuery.validator.addMethod("passwordReg", function (value, element) {
            return this.optional(element) || /([a-zA-Z0-9!@#$%^&*()_+=:;"'<>?/.,{}]{5})/.test(value);
        }, "Please enter at least 5 digit password");
        
        $("#agent_form").validate({
            rules:{
                agent_name:{
                    required:true,
                    aphaonly:true
                },
                agent_id:{
                    required:true,
                    alphanumeric:true
                },
                // email:{
                //     required:true,
                //     email: true
                // },
                password:{
                    required:true,
                    passwordReg:true
                },
                cpassword: {
                    equalTo: "#password"
                },
                status:"required"
            },
            messages:{
                agent_name:{
                    required:"Agent Name required.",
                    aphaonly: "Enter alpha value only."
                }
            },
            submitHandler: function (form){
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/sm/agents/add-agent'); ?>",
                    data:  new FormData($('#agent_form')[0]),
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {
                        // console.log(response);
                        var result = JSON.parse(response);
                        if(result.status){
                            $('.error_div').html("<div class='alert alert-success'>Agent created successfully.</div>");
                            $("#agent_form")[0].reset();
                            setTimeout(function (){
                                $(".error_div").html("");
                                $('#agent_modal').modal("hide");
                                $('#agent_table').DataTable().draw();
                            },2500)

                        }else{
                            $('.error_div').html("<div style='color:red'>"+result.errors+"</div>");
                        }
                    }
                });
            }
        })
    });
    function agentExpotExcel(){
        var searchValue = $('.dataTables_filter input').val();
        window.location ="<?php echo base_url('index.php/sm/export-store-agent'); ?>?searchValue="+searchValue;  
    }
</script>