<div class="content-wrapper" style="zoom:90%">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Store Manager</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.content-header button group -->
<style>

.number{
    visibility:hidden
}
.wizard > .steps {
    position: relative;
    display: block;
    width: 71rem;
}
.dataTables_filter {
    position: relative;
    text-align: left;
}
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

.wizard > .content {
    background: #eee;
    display: block;
    margin: 0.5em;
    min-height: 29em;
    overflow: hidden;
    position: relative;
    width: auto;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}
.container, .container-lg, .container-md, .container-sm, .container-xl {
    /* max-width: 1450px; */
}
/*  toggle button*/
                  
                  .switch  {
                      margin-left: 0px;
                      position: relative;
                      display: inline-block;
                      width: 50px;
                      height: 27px;
                    }
        
      
                  .switch input { 
                    opacity: 0;
                    width: 0;
                    height: 0;
                  }
      
                  .slider {
                    position: absolute;
                    cursor: pointer;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background-color: #ccc;
                    -webkit-transition: .4s;
                    transition: .4s;
                  }
      
                  .slider:before {
                      position: absolute;
                      content: "";
                      height: 20px;
                      width: 20px;
                      left: 4px;
                      bottom: 4px;
                      background-color: white;
                      -webkit-transition: .4s;
                      transition: .4s;
                    }
      
                  input:checked + .slider {
                    background-color: #2196F3;
                  }
      
                  input:focus + .slider {
                    box-shadow: 0 0 1px #2196F3;
                  }
      
                  input:checked + .slider:before {
                    -webkit-transform: translateX(24px);
                    -ms-transform: translateX(24px);
                    transform: translateX(24px);
                  }
      
      /* Rounded sliders */
                  .slider.round {
                    border-radius: 34px;
                  }
      
                  .slider.round:before {
                    border-radius: 50%;
                  }
      
              
      
</style>
</html>
    <section class="content">
        <div class="container mb-2">
       
            <div class="row ">



                <div class="btn-group ml-3" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-info ">Add/Update Agent Ids</button>

                </div>
                <div class="btn-group ml-3 " role="group" aria-label="Second group"> 
                <form method="POST" action="#" name="excel_form" id="excel_form" enctype="multipart/form-data">
              
                     <label for="file"><i  class="fa fa-file-excel" aria-hidden="true"></i></label>
                     <input type="file" id="file" name="file" required accept=".xls, .xlsx" style="visibility:hidden;margin-right:-7rem;">
                     <button style="margin-left:-10rem;" type="submit"  class="btn btn-outline-info "> Bulk Store Upload(Excel)</button>
                </form>
                </div> 
                <div class="btn-group ml-3 " role="group" aria-label="Third group">
                    <button type="button" id = "create_new_store" class="btn btn-outline-info " data-toggle="modal" data-target="#myMol">Create
                        New Stores
                    </button>
                </div>
                
                <div class="btn-group ml-3 mr-1" role="group" aria-label="forth group">
                <!-- type="button" onclick="expotExcelReports();" class="btn btn-outline-info btn-lg" style="padding: 0px 70px; float:right;" -->
                    <button  type="button" id="myLink" onclick="expotExcel();"  class="btn btn-outline-info px-4">
                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                        </svg>
                        Excel Export
                    </a>
                </div>
            </div>
        </div>

        <!--maodel tab-->
<div class="modal fade" id="myMol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="zoom:90%;">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">New Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body ">
               
                <div class="tab-content " id="pills-tabContent">
                    <form id="store-manager-form" action="#" method="POST" name="store-manager-form">
                        <h3 style="width:100rem;">General</h3>
                        <fieldset>
                            <div class="form-group">
                                <label for="">Store Manager Name<span aria-hidden="true" style="color: red;">*</span></label>
                                <input type="text" class="form-control form-control-sm " id="store_manager_name" name="store_manager_name" >
                                <label id="store_manager_name-error" for="store_manager_name" class="error" style="display: inline-block;"></label>
                            </div>
                            <div class="form-group">
                                <label for="">Store ID<span aria-hidden="true" style="color: red;">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="store_id" name="store_id">
                                <label id="store_id-error" for="store_id"  class="error" style="display: inline-block;"></label>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control " id="description" rows="2" name="description"></textarea>
                                <label id="description-error" for="description" class="error" style="display: inline-block;"></label>
                            </div>

                            <div class="form-group">
                                <label for="" style="text-align: center">Status<span aria-hidden="true" style="color: red;">*</span></label>
                                    <select class="form-control required" name="status"  id="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                    </select>
                                <label id="status-error" class="error" for="status"  style="display: inline-block;"></label>
                            </div>
                            <div class="form_msg"></div>
                        </fieldset>

                        <h3>Contact</h3>
                        <fieldset>
                                <!--<div class="form-row">-->
                                <div class="form-group">
                                    <label for="">Contact Person<span aria-hidden="true" style="color: red;">*</span></label>
                                    <input type="text" class="form-control form-control-sm required" id="contact_person" name="contact_person">
                                    <label id="contact_person-error" class="error" for="contact_person" style="display: inline-block;"></label>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4">Phone<span aria-hidden="true" style="color: red;">*</span></label>
                                    <input type="tel" class="form-control form-control-sm required" id="phone" name="phone">
                                    <label id="phone-error" class="error" for="phone"  style="display: inline-block;"></label>
                                </div>
                                <!--</div>-->

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email<span aria-hidden="true" style="color: red;">*</span></label>
                                    <input type="email" class="form-control form-control-sm required" id="email" name="email">
                                    <label id="email-error" class="error" for="email"  style="display: inline-block;"></label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Pin Code</label>
                                    <input type="text" class="form-control form-control-sm " id="pin_code" name="pin_code">
                                    <label id="pin_code-error" class="error" for="pin_code"  style="display: inline-block;"></label>
                                </div>
                               
                                <div class="form-group col-md-3">
                                <label for="country">Country</label>
                                <select class="form-control form-control-sm " id="country"  name="country" onchange = "countrySelect()" >
                                    <option value="">Please select country</option>
                                </select>
                                <label id="country-error" class="error" for="country"  style="display: inline-block;"></label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Address</label>
                                    <textarea class="form-control " id="address" rows="2" name="address"></textarea>
                                </div>
                                
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="state">State</label>
                                <select class="form-control form-control-sm " id="state" name ="state" onchange = "stateSelect()">
                                    <option value="">Please select state</option>
                                </select>
                                    <label id="state-error" class="error" for="state"  style="display: inline-block;"></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <select class="form-control form-control-sm" id="city" name ="city" >
                                        <option value="">Please select city</option>
                                    </select>
                                    <label id="city-error" class="error" for="city"  style="display: inline-block;"></label>
                                </div>
                            </div>
                        </fieldset>

                        <h3>Account</h3>
                        <fieldset>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Store Manager Id<span aria-hidden="true" style="color: red;">*</span></label>
                                <input type="text" class="form-control form-control-sm required" id="store_manager_id" name="store_manager_id">
                                <label id="store_manager_id-error" class="error" for="store_manager_id" readonly></label>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput2">Region<span aria-hidden="true" style="color: red;">*</span></label>
                                <input type="text" class="form-control form-control-sm required" id="region" name="region">
                            </div>

                            <div class="form-group">
                                <label>Password<span aria-hidden="true" style="color: red;">*</span></label>
                                <div class="input-group" id="show_hide_password">
                                        <input class="form-control form-control-sm" type="password" name="password" id="password">
                                        <div class="input-group-prepend" style="border: 1px solid #ced4da; border-left: none; padding: 0px 5px;">
                                            <a href="#"><i toggle="#password"class="fa fa-eye-slash" id="toggling"aria-hidden="true" onclick="myFunction()"></i></a>
                                        </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Confirm Password<span aria-hidden="true" style="color: red;">*</span></label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control form-control-sm" id="cpassword" name="cpassword">
                                    
                                </div>
                            </div>
                        <div class="error_msg"></div>
                        </fieldset>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

        <div class="container mb-5">

            <div class="row">
                <div class="col-12 col-sm-6 col-md-12 mb-3">
                    <div class="card ">

                        <div class="card-body table-responsive">
                            <table id="store-manager-table" class="table table-striped table-bordered bg-light"
                                   style="width:100%">
                                <thead>
                                <tr>
                                <th>ID</th>
                                   <th>Store ID</th>
                                    <th>Store Manager Id</th>
                                    <th>Store Manager Name</th>
                                    <th>Status</th>
                                    <th>Last Status Modified</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--conatainer table end-->
        </div>
<!-- start Delete  Modal -->
<div id="deleteModalStore" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="height:220px;width:100%;margin-left:40px;zoom:90%;" >
      <div class="modal-header">
          <h3>Warning</h3>
      </div>
      <div class="modal-body">
        <p>Deleting store manager will delete the related data like Agents,targets and all.</p>
      </div>
      <div class="modal-footer">
        <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
        <button class="btn btn-primary" style="height: 3.25rem;" id ="deleteMDPButton">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Delete Modal -->
<!-- start toggleOn  Modal -->
<div id="toggleOnModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="height:220px;width:100%;margin-left:40px;zoom:90%" >
      <div class="modal-header">
          <h3>Active Store</h3>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Deactivate this Store?</p>
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
    <div class="modal-content" style="height:220px;width:100%;margin-left:40px;zoom:90%;" >
      <div class="modal-header">
          <h3>Deactive Store</h3>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Activate this Store?</p>
      </div>
      <div class="modal-footer">
        <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
        <button class="btn btn-primary" style="height: 3.25rem;" id ="toggleOffButton">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- End toggleOff Modal -->
    </section>

    <script>
        function stateSelect(){
            $("#city").empty();
            $("#city").append($("<option ></option>").val('').html("Please select city"));
            var selected_country = $("#country").val();
            var selected_state = $("#state").val();
            $.getJSON("<?php echo base_url(); ?>/public/assets/Country-City-State.json", function(st) {
                $.each(st, function(key, value) {
                    if(value.name == selected_country){
                        $.each(value.states, function(stateKey, stateValue) {
                            if(stateKey == selected_state){
                                $.each(stateValue, function(cityKey, cityValue) {
                                   $("#city").append($("<option></option>").val(cityValue).html(cityValue));
                                });
                            }
                        });
                    }
                });
            });
        }
        function countrySelect(){
            $("#state").empty();
            $("#city").empty();
            $("#state").append($("<option ></option>").val('').html("Please select state"));
            $("#city").append($("<option ></option>").val('').html("Please select city"));
            var selected_country = $("#country").val();
            $.getJSON("<?php echo base_url(); ?>/public/assets/Country-City-State.json", function(st) {
                $.each(st, function(key, value) {
                    if(value.name == selected_country){
                            $.each(value.states, function(key1, value1) {
                        $("#state").append($("<option></option>").val(key1).html(key1));
                        });
                    }
                    // $("#state").append($("<option></option>").val(value.iso3).html(value.name));
                });
            });
        }
        $(document).ready(function (){
            $(document).on('click','#create_new_store',function (){
                $.getJSON("<?php echo base_url(); ?>/public/assets/Country-City-State.json", function(jd) {
                    $.each(jd, function(key, value) {
                        $("#country").append($("<option></option>").val(value.name).html(value.name));
                    });
               });
            });
                // $.ajax({
                //     type: "POST",
                //     contentType: "application/json; charset=utf-8",
                //     url: "<?php echo base_url(); ?>/public/assets/Country-City-State.json",
                //     data:"{}",
                //     dataType: "json",
                //     success: function(data) {
                //         alert("success");
                //     // $.each(data.d, function(key, value) {
                //     // $("#ddlCountry").append($("<option></option>").val(value.CountryId).html(value.CountryName));
                //     // });
                //     },
                //     error: function(result) {
                //     alert("Error");
                //     }
				// });
            // });
            var storeTable = $("#store-manager-table").dataTable({
                "bLengthChange": true,
                "bPaginate": true,
                "bInfo": true,
                "autoWidth": false,
                "serverSide": true,
                "order": [[ 0, "desc" ]],
                'processing': true,
                'language': {
                    // 'loadingRecords': '&nbsp;',
                    'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
                },
                
				ajax:{
				url:  "<?php echo base_url('index.php/admin/store/get-store-manager-griddata'); ?>",
				type: "POST",
				},
				aoColumns: [
                    { mData: 'id',width:"5%" },
					{ mData: 'store_id',width:"10%" },
					{ mData: 'store_manager_id',width:"20%" },
					{ mData: 'managername',width:"20%" },
					{ data: 'status',  "render" : function(data)
                    {
                        if (data == "1") {
                            return '<center> <a class="switch toggleOff"><input type="checkbox" checked><span class="slider round"></span></a></center>'
                        }else{
                            return '<center> <a class="switch toggleOn"><input type="checkbox" ><span class="slider round"></span></a></center>'
                        }
                    },},
					{ mData: 'updated_at',width:"20%" },
					{
                        orderable:false,
					 	data: null,
					 	className: "center",
					 	defaultContent: '<center><a href="" class="fas fa-eye  view_store" ></a><a style="margin-left: 20%;"href="" class="fas fa-trash  delete_store" ></a></center>'
					}
				],
				
            });
        });
        $('#store-manager-table').on('click', 'a.delete_store', function(e) {
            e.preventDefault();
			const tableStore = $('#store-manager-table').DataTable();
			const tr=  $(this).parents('tr');
			const row_id = tableStore.row( tr ).data().id;
            const row_store_id = tableStore.row( tr ).data().store_id;
            const row_active_status = tableStore.row( tr ).data().status;
            if(row_active_status == "0"){
                $('#deleteModalStore').modal('show');
                $("#deleteMDPButton").unbind('click');
                $('#deleteMDPButton').on('click', function(e) {
					$('#deleteModalStore').modal('hide');
					$.ajax({
						url:  "<?php echo base_url('index.php/admin/store/store-manager-delete'); ?>",
						data: "id="+row_id+"&store_id="+row_store_id,
						type: "POST",
						dataType: "JSON",
						cache: false,
						success: function(response)
						{
							alert("Store manager deleted successfully.");
							$('#store-manager-table').DataTable().draw();
						}
					});
			    });
            }else{
                alert("This store manager can't delete, because its active store manager.");
            }
			
				
        });
        $('#store-manager-table').on('click', 'a.view_store', function(e) {
            e.preventDefault();
			const tableStore = $('#store-manager-table').DataTable();
			const tr=  $(this).parents('tr');
            const row_id = tableStore.row( tr ).data().id;
            window.location =  "<?php echo base_url('index.php/admin/store/store-manager-get-view?id='); ?>"+row_id;
           
        });
        $('#store-manager-table').on('click', 'a.toggleOff', function (e) {
            e.preventDefault();
            const tableStore = $('#store-manager-table').DataTable();
			const tr=  $(this).parents('tr');
			const row_id = tableStore.row( tr ).data().id;
            $('#toggleOnModal').modal('show');
			$("#toggleOnButton").unbind('click');
            $('#toggleOnButton').on('click', function(e) {
					$('#toggleOnModal').modal('hide');
					$.ajax({
						url:  "<?php echo base_url('index.php/admin/store/store-manager-deactive'); ?>",
						data: "id="+row_id,
						type: "POST",
						dataType: "JSON",
						cache: false,
						success: function(response)
						{
							alert("Store deactivated successfully.");
							$('#store-manager-table').DataTable().draw();
						}
					});
			});
        } );
        $('#store-manager-table').on('click', 'a.toggleOn', function (e) {
            e.preventDefault();
            const tableStore = $('#store-manager-table').DataTable();
			const tr=  $(this).parents('tr');
			const row_id = tableStore.row( tr ).data().id;
            $('#toggleOffModal').modal('show');
			$("#toggleOffButton").unbind('click');
            $('#toggleOffButton').on('click', function(e) {
					$('#toggleOffModal').modal('hide');
					$.ajax({
						url:  "<?php echo base_url('index.php/admin/store/store-manager-active'); ?>",
						data: "id="+row_id,
						type: "POST",
						dataType: "JSON",
						cache: false,
						success: function(response)
						{
							alert("Store activated successfully.");
							$('#store-manager-table').DataTable().draw();
						}
					});
			});
        } );
     
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                $('#toggling').removeClass('fa fa-eye-slash');
                $('#toggling').addClass('fa fa-fw fa-eye');
            } else {
                $('#toggling').removeClass('fa fa-fw fa-eye');
                $('#toggling').addClass('fa fa-eye-slash');
                x.type = "password";
            }

        }

        $('[data-dismiss=modal]').on('click', function (e) {
            $('#store-manager-table').DataTable().ajax.reload();
    var $t = $(this),
        target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

$(target)
    .find("input,textarea,select,fieldset")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
      
    
  var validator =$('#store-manager-form').validate();
validator.resetForm();
$(".form_msg").html('');
$(".error_msg").html('');
$("#store-manager-form-t-0")[0].parentNode.className='first current'
})
    $(function() {
        var form = $("#store-manager-form").show();

        jQuery.validator.addMethod("aphaonly", function (value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        }, "Please enter valid name");

        jQuery.validator.addMethod("alphanumeric", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9 ]*$/.test(value);
        }, "Please enter valid value");

        jQuery.validator.addMethod("onlyNumber", function (value, element) {
            return this.optional(element) || /^[0-9]*$/.test(value);
        }, "Please enter only number");

        jQuery.validator.addMethod("numberReg", function (value, element) {
            return this.optional(element) || /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/.test(value);
        }, "Please enter valid number");

        jQuery.validator.addMethod("passwordReg", function (value, element) {
            return this.optional(element) || /([a-zA-Z0-9!@#$%^&*()_+=:;"'<>?/.,{}]{5})/.test(value);
        }, "Please enter at least 5 digit password");

        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                password:{
                    required: true,
                    passwordReg:true
                },
                cpassword: {
                    equalTo: "#password"
                },
                store_manager_name: {
                    required: true,
                    aphaonly: true
                },
                store_id: {
                    required: true,
                    alphanumeric: true
                },
                contact_person: {
                    alphanumeric: true
                },
                phone: {
                    numberReg: true
                },
                pin_code: {
                    onlyNumber: true
                }
            }
        });
        form.steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex) {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                if (newIndex === 3) {
                    return false;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    form.steps("previous");
                }
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                var formdata = $('#store-manager-form').serialize();
                var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
                var csrfHash = $('.csrf_token').val(); // CSRF hash

                event.preventDefault();
                $.ajax({
                    url: "<?php echo base_url('index.php/admin/store/add-store-manager'); ?>",
                    type: "POST",
                    data: formdata + "&" + csrfName + "=" + csrfHash,
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        var result = response; // JSON.parse(response);
                        if(result.status){
                            $(".form_msg").html("<div class='alert alert-success'>"+result.msg+"</div>");
                            $(".csrf_token").val(result.token);
                            $("#store-manager-form")[0].reset()
                            setTimeout(function (){
                                $('.csrf_token').val(result.csrfHash);
                                $("#myMod").modal('show');
                                $(".form_msg").html('');
                            },1500);
                            $("#store-manager-form-t-0").trigger("click");
                            $("#store-manager-form").close();
                            $("#myMod").modal('hide');
                            
                            
                        }else{
                            $('.error_msg').html("<div style='color:red'>"+result.errors+"</div>");
                        }
                    }
                });
            }
        });

   
        $('#excel_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"<?php echo base_url("index.php/admin/store-upload"); ?>",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(response){
                    var res = JSON.parse(response);
                    if(res.status){
                        alert(res.data.success_record +" store created successfully.\n"+res.data.error_record+" store unable to create because store id or email or store manager id not unique");
                    }
                    // alert(data);
                }
            });
        });
    });

    function expotExcel(){
        var searchValue = $('.dataTables_filter input').val();
        window.location ="<?php echo base_url('index.php/admin/export-store-manager'); ?>?searchValue="+searchValue;  
    }
    </script>
</div>


