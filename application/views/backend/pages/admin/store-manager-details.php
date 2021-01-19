
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

.number{
    visibility:hidden
}
.wizard > .steps {
    position: relative;
    display: block;
    width: 71rem;
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

</style>
   <!-- Contains all page content -->

       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="zoom:90%;">

             
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-4 ml-5">
            <h3 class="m-0 text-dark">Store Manager Details</h3>
          </div><!-- /.col -->
         <div class="btn-group ml-auto" role="group" aria-label="First group">
            <ol class="breadcrumb float-sm-right">
              <!--coding part when tab select target Details Agent list then see this button-->
              <button type="button" id="editManagerButton" class="btn btn-outline-info btn-lg ml-1"  style="padding: 0px 40px;">Edit Manager</button>
            </ol>
          </div>
          <!-- model Edit manager-->
				<!-- <div class="btn-group "  aria-label="forth group">
					<ol class="breadcrumb float-sm-right"> -->
							
              <!--maodel tab-->
<div  class="modal fade" id="myMolEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content " style= "zoom:90%;">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Store Manager</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body ">
               
                <div class="tab-content " id="pills-tabContent">
                    <form id="edit-store-manager-form" action="#" method="POST" name="edit-store-manager-form">
                        <h3 style="width:100rem;">General</h3>
                        <fieldset>
                            <div class="form-group">
                                <label for="">Store Manager Name<span aria-hidden="true" style="color: red;">*</span></label>
                                <input type="hidden" id="unique_id" name="unique_id" value=<?php echo $store_manager[0]->id; ?>>
                                <input type="text" class="form-control form-control-sm " id="edit_store_manager_name" name="edit_store_manager_name" >
                                <label id="edit_store_manager_name-error" for="edit_store_manager_name" class="error" style="display: inline-block;"></label>
                            </div>
                            <div class="form-group">
                                <label for="">Store ID<span aria-hidden="true" style="color: red;">*</span></label>
                                <input type="text"  class="form-control form-control-sm" id="edit_store_id" name="edit_store_id" >
                                <label id="edit_store_id-error" for="edit_store_id"  class="error" style="display: inline-block;"></label>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control " id="edit_description" rows="2" name="edit_description"></textarea>
                                <label id="edit_description-error" for="edit_description" class="error" style="display: inline-block;"></label>
                            </div>

                            <div class="form-group">
                                <label for="edit_status" style="text-align: center">Status<span aria-hidden="true" style="color: red;">*</span></label>
                                    <select class="form-control required" name="edit_status"  id="edit_status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                    </select>
                                <label id="edit_status-error" class="error" for="status"  style="display: inline-block;"></label>
                            </div>
                        </fieldset>

                        <h3>Contact</h3>
                        <fieldset>
                                <!--<div class="form-row">-->
                                <div class="form-group">
                                    <label for="">Contact Person<span aria-hidden="true" style="color: red;">*</span></label>
                                    <input type="text" class="form-control form-control-sm required" id="edit_contact_person" name="edit_contact_person">
                                    <label id="edit_contact_person-error" class="error" for="contact_person" style="display: inline-block;"></label>
                                </div>
                                <div class="form-group">
                                    <label for="edit_phone1">Phone<span aria-hidden="true" style="color: red;">*</span></label>
                                    <input type="tel" class="form-control form-control-sm required" id="edit_phone1" name="edit_phone1">
                                    <label id="edit_phone-error" class="error" for="edit_phone1"  style="display: inline-block;"></label>
                                </div>
                                <!--</div>-->

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="edit_email">Email<span aria-hidden="true" style="color: red;">*</span></label>
                                    <input type="email" class="form-control form-control-sm required" id="edit_email1" name="edit_email1">
                                    <label id="edit_email-error" class="error" for="edit_email1"  style="display: inline-block;"></label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Pin Code</label>
                                    <input type="text" class="form-control form-control-sm " id="edit_pin_code" name="edit_pin_code">
                                    <label id="edit_pin_code-error" class="error" for="edit_pin_code"  style="display: inline-block;"></label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="edit_country">Country</label>
                                    <select class="form-control form-control-sm " id="edit_country"  name="edit_country" onchange = "editCountrySelect()" >
                                    <option value="">Please select country</option>
                                </select>
                                    <label id="edit_country-error" class="error" for="edit_country"  style="display: inline-block;"></label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Address</label>
                                    <textarea class="form-control " id="edit_address" rows="2" name="edit_address"></textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="edit_state">State</label>
                                    <select class="form-control form-control-sm " id="edit_state" name ="edit_state" onchange = "editStateSelect()">
                                    <option value="">Please select state</option>
                                </select>
                                    <label id="edit_state-error" class="error" for="edit_state"  style="display: inline-block;"></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="edit_city">City</label>
                                    <select class="form-control form-control-sm " id="edit_city" name ="edit_city" >
                                    <option value="">Please select state</option>
                                </select>
                                    <label id="edit_city-error" class="error" for="edit_city"  style="display: inline-block;"></label>
                                </div>
                            </div>
                        </fieldset>

                        <h3>Account</h3>
                        <fieldset>
                            <div class="form-group">
                                <label for="">Store Manager Id<span aria-hidden="true" style="color: red;">*</span></label>
                                <input type="text" class="form-control form-control-sm required" id="edit_store_manager_id" name="edit_store_manager_id">
                                <label id="edit_store_manager_id-error" class="error" for="edit_store_manager_id" readonly></label>
                            </div>

                            <div class="form-group">
                                <label for="">Region<span aria-hidden="true" style="color: red;">*</span></label>
                                <input type="text" class="form-control form-control-sm required" id="edit_region" name="edit_region">
                            </div>

                            <div class="form-group">
                                  <div class="col-md-4">
                                    <button type="button" id="resetPassword" class="btn btn-sm btn-danger" data-toggle="modal" >Reset Password</button>

                                   
                                    <!-- <a href="" class="btn btn-sm btn-primary" style="margin: 0px 0px 0px 0px; float: right" disabled><b>Submit</b></a> -->
                                  </div>
                            </div>
                            <div class="form_msg"></div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
					<!-- /.ol end --> 
          <!-- </ol>
        </div>/.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- tabes modal-->

    <div class="modal-body ">
    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" style="  background-color: #66666687; margin-right: 5px; color: #000; border-radius:4px">
              <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab" aria-controls="pills-general" aria-selected="true" style="color:#fff;">General</a>
            </li>
            <li class="nav-item" style=" background-color: #66666687; margin-right: 5px; color: #000; border-radius:4px">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" style="color:#fff;">Contact info</a>
            </li>
            <li class="nav-item" style="background-color: #66666687; margin-right: 5px; color: #000; border-radius:4px">
              <a class="nav-link" id="pills-target-tab" data-toggle="pill" href="#pills-target" role="tab" aria-controls="pills-target" aria-selected="false" style="color:#fff;">Target Details </a>
            </li>

            <li class="nav-item" style="background-color: #66666687; margin-right: 5px; color: #000; border-radius:4px">
              <a class="nav-link" id="pills-Agent-tab" data-toggle="pill" href="#pills-AgentList" role="tab" aria-controls="pills-AgentList" aria-selected="false" style="color:#fff;">Agent List </a>
            </li>
            <li class="nav-item" style="background-color: #66666687; margin-right: 5px; color: #000; border-radius:4px">
              <a class="nav-link" id="pills-modified-tab" data-toggle="pill" href="#pills-LastModified" role="tab" aria-controls="pills-LastModified" aria-selected="false" style="color:#fff;">Last Modifications</a>
            </li>

          </ul>
          
          <div class="tab-content" id="pills-tabContent">
           <?php
         
            if(isset($store_manager) && count($store_manager) > 0){?>
              
          <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab"> 
                <div class="form-row">
                      <div class="col">
                        <label for="inputEmail4">Store ID</label>
                        <input type="text" class="form-control form-control-sm" id="" name="store_id" value=<?php echo $store_manager[0]->store_id; ?>>
                      </div>
                      <div class="col">
                        <label for="inputPassword4" style="margin-top: 22px">Status</label>
                          <label class="switch">
                              <?php if( $store_manager[0]->status =="1"){
                                  ?>
                                    <input type="checkbox"  checked name="status">  
                                    <?php
                              }else{
                                  ?>
                                  <input type="checkbox" name="status">
                                  <?php
                              }
                            ?>
                            <span class="slider round" ></span>
                          </label>
                      </div>
                </div>
               
                   <div class="form-row">
                      <div class="col">
                        <label >Description</label>
                        <textarea class="form-control" id=" " rows="4" name="description" ><?php echo $store_manager[0]->description; ?></textarea>
                        
                      </div>

                      <div class="col">
                        
                          <div class="col">
                            <label for="createdDate">Created Date</label>
                            <input type="text" class="form-control form-control-sm" id="createdDate" name="created_date" value=<?php echo $store_manager[0]->created_at; ?>>
                          </div>
                          <div class="col">
                            <label for="lastmodified">Last Modified</label>
                            <input type="text" class="form-control form-control-sm" id="lastmodified" name="last_modified" value=<?php echo $store_manager[0]->updated_at; ?>>
                          </div>
                      
                      </div>
                   </div>
                
                    <div class="form-row">

                      
                      <div class="col">
                        <label for="inputEmail4">Account ID</label>
                        <input type="email" class="form-control form-control-sm" id="inputEmail4" >
                      </div>
                      
                      <div class="col">
                        <label for="last_modi_user">Last Modified User</label>
                        <input type="text" class="form-control form-control-sm" id="last_modi_user" name="last_modi_user">
                      </div>
                    </div> 
                
                  </form>
                  
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> <form>
                 <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Contact Person</label>
                        <input type="text" class="form-control form-control-sm" id="inputEmail4" name="contact_person" value=<?php echo $store_manager[0]->contact_person; ?>>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control form-control-sm" id="phone" name="phone" value=<?php echo $store_manager[0]->phone; ?>>
                      </div>
                    </div>
                
                   <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control form-control-sm" id="inputEmail4" name="email" value=<?php echo $store_manager[0]->email; ?>>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pin_code">Pin Code</label>
                        <input type="text" class="form-control form-control-sm" id="pin_code" name="pin_code"  value=<?php echo $store_manager[0]->pincode; ?>>
                      </div>
                    </div>
                
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"><?php echo $store_manager[0]->address; ?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="country1">Country</label>
                        <input type="text" class="form-control form-control-sm" id="country1" name="country" value=<?php echo $store_manager[0]->country; ?>>
                      </div>
                  </div> 
                
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">State</label>
                        <input type="text" class="form-control form-control-sm" id="inputEmail4" name="state" value=<?php echo $store_manager[0]->state; ?>>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="city1">City</label>
                        <input type="text" class="form-control form-control-sm" id="city1" name="city" value=<?php echo $store_manager[0]->city; ?>>
                      </div>
                    </div>

                  </form>
                   <?php 
                }
                ?>
              </div>
    <div class="tab-pane fade" id="pills-target" role="tabpanel" aria-labelledby="pills-target-tab">
        <div class="container">
            <div class="card-body table-responsive">       
                <table id="target_details" class="table table-striped table-bordered  bg-light" style="width:100%">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Total Sales Values</th>
                    <th>Total Units Sold</th>
                    <th>Set Store Target</th>
                    <th>Action</th>
                </tr>
                </table>
            </div>
        </div> 
    </div>
    <div class="tab-pane fade" id="pills-AgentList" role="tabpanel" aria-labelledby="pills-Agent-tab">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4 ml-5">
                        <h1 class="m-0 text-dark"></h1>
                    </div><!-- /.col -->
                    <div class="btn-group ml-auto" role="group" aria-label="First group">
                        <ol class="breadcrumb float-sm-right">
                        <!--coding part when tab select target Details Agent list then see this button-->
                        <button type="button" id="add_agent_btn" class="btn btn-outline-info btn-lg" style="padding: 0px 40px;">

                        Add New Agent
                        </button>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container mb-5">

            <div class="row">
                <div class="col-12 col-sm-6 col-md-12 mb-3">
                    <div class="card ">

                        <div class="card-body table-responsive">
                            <table id="Agent-list-table" class="table table-striped table-bordered bg-light"
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
                </div>
            </div>
        <!--conatainer table end-->
        </div>
    </div>
    <div class="tab-pane fade" id="pills-LastModified" role="tabpanel" aria-labelledby="pills-modified-tab">
        <div class="container">
            <div class="card-body table-responsive">       
                <table id="last_modified_table" class="table table-striped table-bordered  bg-light" style="width:100%">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Field Name</th>
                    <th>Old Value</th>
                    <th>New Value</th>
                    <th>Updated Time</th>
                </tr>
                </table>
            </div>
        </div> 
    </div>
    <div class="modal fade" id="agent_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style= "zoom:90%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add Agent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="error_div" class="error_div"></div>
                    <form name="agent_form" id="agent_form" method="post" action="#" >
                        <div class="form-group">
                            <label for="formGroupExampleInput">Agent Name</label>
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
                                <option value="0">Deactive</option>
                            </select>
                            <label id="status-error" class="error" for="status"  style="display: inline-block;"></label>
                        </div>
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
                            <input type="password" class="form-control form-control-sm" id="cpassword" name="cpassword">
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
    
    <!-- view agent modal -->
    <div class="modal fade" id="view_agent_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style= "zoom:90%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Agent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="view_error_div" class="error_div"></div>
                    <form name="agent_form" id="view_agent_form" method="post" action="#" >
                        <div class="form-group">
                            <label for="formGroupExampleInput">Agent Name</label>
                            <input type="text" class="form-control form-control-sm " id="view_agent_name" name="view_agent_name">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Agent ID</label>
                            <input type="text" class="form-control form-control-sm" id="view_agent_id" name="view_agent_id">
                        </div>
                       
                        <div class="form-group">
                            <label for="" style="text-align: center">Status</label>
                            <select class="form-control" name="view_status"  id="view_status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            <label id="status-error" class="error" for="status"  style="display: inline-block;"></label>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input class="form-control form-control-sm" type="password" name="view_password" id="view_password">
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
    <!-- start Delete  Modal -->
<div id="deleteModalAgent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="zoom:90%;height:220px;width:100%;margin-left: 40px;" >
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
<!-- start reset password  Modal -->
<div class="modal fade" id="reset_password_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="width: 380px;zoom:90%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="reset_error_div" class="reset_error_div"></div>
                    <form name="reset_password_form" id="reset_password_form" method="post" action="#" >
                        <div class="form-group">
                            <label for="edit_password1">Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input class="form-control form-control-sm" type="password" name="edit_password1" id="edit_password1">
                                <div class="input-group-prepend"
                                      style="border: 1px solid #ced4da; border-left: none; padding: 0px 5px;">
                                    <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_cpassword1">Confirm password</label>
                            <input type="password" class="form-control form-control-sm" id="edit_cpassword1" name="edit_cpassword1">
                        </div>
                      
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- End reset password Modal -->
<!-- start toggleOn  Modal -->
<div id="toggleOnModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="zoom:90%;height:220px;width:100%;margin-left: 40px;" >
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
    <div class="modal-content" style="zoom:90%;height:220px;width:100%;margin-left: 40px;" >
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
<!-- View modal -->
        <div class="modal fade" id="Category_data" index="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="zoom:90%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Store Target</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="model-body">
                        <div class="card-body table-responsive">
                        <table id="catTable" class="table table-border">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Sales Values</th>
                                    <th scope="col">Units Sold</th>
                                    <th scope="col">Last Modified Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                               
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<!-- View modal -->
<div id="deleteModalTarCat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="zoom:90%;height:220px;width:100%;margin-left: 40px;" >
      <div class="modal-header">
          <h3>Delete</h3>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Set Target Category ?</p>
      </div>
      <div class="modal-footer">
        <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
        <button class="btn btn-primary" style="height: 3.25rem;" id ="deleteTarButton">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Delete Modal -->
<div class="modal fade" id="myMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="zoom:90%;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Edit Store Target</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    </div>
                                  <div class="modal-body">
                                    <div class="fom">
                                        <form>
                                          <div class="form-group">
                                            <label for="exampleFormControlSelect1">Category</label>
                                            <select class="form-control form-control-sm" id="exampleFormControlSelect1"  name="category">
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                              <option>4</option>
                                              <option>5</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="formGroupExampleInput">Category Sales Value</label>
                                            <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" name="category_sales_value">
                                          </div>
                                          <div class="form-group">
                                            <label for="formGroupExampleInput2">Category Units Sold</label>
                                            <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" name="category_units_sold">
                                          </div>    
                                            
                                        </form>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" style="float: right">Add</button>
                                    <button type="button" class="btn btn-danger btn-sm" style="float: right; margin-right: 5px;">Remove</button>
                                  </div>
                                </div>
                              </div>
                            </div>




        
  </div>
   <!--end-->

   <div class="modal fade" id="categoryAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="zoom:90%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                         <div id="cat_error_div" class="cat_error_div"></div>
                        <form name="cat_add_form" id="cat_add_form" method="post" action="#" >
                            <div class="form-group">
                            <input type="hidden" id="cat_store_id">
                            <input type="hidden" id="cat_target_id">
                            <input type="hidden" id="cat_total_sale_val">
                            <input type="hidden" id="cat_total_sold_unit">

                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control form-control-sm" id="cat" required>
                                <option disabled selected>Please select option</option>
                                    <option value="1">Men</option>
                                    <option value="2" >Women</option>
                                    <option value="3">Kids</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Category Sales Value</label>
                                <input type="text" class="form-control form-control-sm" id="catSale" required>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Category Units Sold</label>
                                <input type="text" class="form-control form-control-sm" id="CatUnitSold" required>
                            </div>


                        <button type="submit" class="btn btn-primary btn-sm" style="float: right; width:75px;" id="addCategory">Add</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" style="float:right;margin-right:5px;">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
</div>

<!-- REQUIRED SCRIPTS -->

<script>
$(document).on('click','#add_agent_btn',function (){
       $("#agent_modal").modal("show");
    });

  $('.mydatatable').dataTable( {
      searching: false,
      ordering: false,
    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ] ,
    createdRow: function( row, data,index ){
       
      }
  } );
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
var validatorReset =$('#reset_password_form').validate();
validatorReset.resetForm();
$(".error_div").html('');
$(".reset_error_div").html('');
$('.cat_error_div').html('');
$('.form_msg').html('');
})
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

jQuery.validator.addMethod("numberReg", function (value, element) {
return this.optional(element) || /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/.test(value);
}, "Please enter valid number");

jQuery.validator.addMethod("passwordReg", function (value, element) {
    return this.optional(element) || /([a-zA-Z0-9!@#$%^&*()_+=:;"'<>?/.,{}]{5})/.test(value);
}, "Please enter at least 5 digit password");

$(document).on('click','#editManagerButton',function (){
  var store_id = "<?php echo $store_manager[0]->id; ?>";
       $("#myMolEdit").modal("show");
       $.ajax({
						url:  "<?php echo base_url('index.php/admin/store/store-manager-get-view-edit'); ?>",
						data: "id="+store_id,
						type: "GET",
						dataType: "JSON",
						cache: false,
						success: function(response)
						{
              $('#edit_store_manager_name').val(response.data[0].managername);
              $('#edit_store_id').val(response.data[0].store_id);
              $('#edit_description').val(response.data[0].description);
              $('#edit_status').val(response.data[0].status);
              $('#edit_contact_person').val(response.data[0].contact_person);
              $('#edit_phone1').val(response.data[0].phone);
              $('#edit_email1').val(response.data[0].email);
              $('#edit_pin_code').val(response.data[0].pincode);
              $('#edit_address').val(response.data[0].address);
              $.getJSON("<?php echo base_url(); ?>/public/assets/Country-City-State.json", function(jd) {
                    $.each(jd, function(key, value) {
                        if(response.data[0].country == value.name){
                            $("#edit_country").append($("<option selected></option>").val(value.name).html(value.name));
                            $.each(value.states, function(editStateKey, editStateValue) {
                                if(response.data[0].state == editStateKey){
                                    $("#edit_state").append($("<option selected></option>").val(editStateKey).html(editStateKey));
                                    $.each(editStateValue, function(editCityKey, editCityValue) {
                                        if(response.data[0].city == editCityValue){
                                            $("#edit_city").append($("<option selected></option>").val(editCityValue).html(editCityValue));
                                        }else{
                                            $("#edit_city").append($("<option></option>").val(editCityValue).html(editCityValue));
                                        }
                                    });
                                }else{
                                    $("#edit_state").append($("<option></option>").val(editStateKey).html(editStateKey));
                                }
                            });
                        }else{
                            $("#edit_country").append($("<option></option>").val(value.name).html(value.name));
                        }
                    });
               });
              $('#edit_state').val(response.data[0].state);
              $('#edit_city').val(response.data[0].city);
              $('#edit_store_manager_id').val(response.data[0].store_manager_id);
              $('#edit_region').val(response.data[0].region);
						}
					});
       
});
$(document).on('click','#resetPassword',function (){
  $('#reset_password_modal').modal("show");
});

var form = $("#edit-store-manager-form").show();




form.validate({
errorPlacement: function errorPlacement(error, element) {
    element.before(error);
},
rules: {
    
    edit_store_manager_name: {
        required: true,
        aphaonly: true
    },
    edit_store_id: {
        required: true,
        alphanumeric: true
    },
    edit_contact_person: {
        alphanumeric: true
    },
    edit_phone1: {
        numberReg: true
    },
    edit_pin_code: {
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
    var formdata = $('#edit-store-manager-form').serialize();
    var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
    var csrfHash = $('.csrf_token').val(); // CSRF hash
    var store_id = "<?php echo $store_manager[0]->id; ?>";
    
    event.preventDefault();
    $.ajax({
        url: "<?php echo base_url('index.php/admin/store/edit-store-manager'); ?>",
        type: "POST",
        data: formdata + "&" + csrfName + "=" + csrfHash,
        dataType: "json",
        cache: false,
        success: function (response) {
            var result = response; // JSON.parse(response);
            if(result.status){
                $(".form_msg").html("<div class='alert alert-success'>"+result.msg+"</div>");
                $(".csrf_token").val(result.token);
                setTimeout(function (){
                    $('.csrf_token').val(result.csrfHash);
                     $(".form_msg").html('');

                },1500);
                location.reload();
            }else{
                $('.form_msg').html("<div style='color:red'>"+result.errors+"</div>");
            }
        }
    });
}
});

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
        email:{
            required:true,
            email: true
        },
        password:{
            required:true,
            passwordReg:true,
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
       var fd =$('#agent_form').serialize();
      var store_id = "<?php echo $store_manager[0]->store_id; ?>";
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/admin/agents/add-agent'); ?>"+"?store_id="+store_id,
            data:  fd ,
            dataType: "json",
            cache: false,
            success: function (response) {
                if(response.status){
                    $('.error_div').html("<div class='alert alert-success'>Agent Created Successfully.</div>");
                    $("#agent_form")[0].reset();
                    setTimeout(function (){
                        $(".error_div").html("");
                        $("#agent_modal").modal("toggle");
                        $("#Agent-list-table").DataTable().draw();
                    },2500)

                }else{
                    $('.error_div').html("<div style='color:red'>"+response.errors+"</div>");
                }
            }
        });
    }
});



$("#reset_password_form").validate({
    rules:{
        edit_password1:{
            required:true,
            passwordReg:true,
        },
        edit_cpassword1: {
            equalTo: "#edit_password1"
        },
    },
    
    submitHandler: function (form){
       var fd =$('#reset_password_form').serialize();
      var id = "<?php echo $store_manager[0]->id; ?>";
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/admin/store/store-manager-reset-password'); ?>"+"?id="+id,
            data:  fd ,
            dataType: "json",
            cache: false,
            success: function (response) {
                if(response.status){
                    $('.reset_error_div').html("<div class='alert alert-success'>Password reset successfully.</div>");
                    $("#reset_password_form")[0].reset();
                    setTimeout(function (){
                        $(".reset_error_div").html("");
                        $("#reset_password_modal").modal("toggle");
                    },2500)

                }else{
                    $('.reset_error_div').html("<div style='color:red'>"+response.errors+"</div>");
                }
            }
        });
    }
});


//Click event handler for nav-items
$('.nav-item').on('click',function(e){
 activeTab = e.currentTarget.innerText;
 if(activeTab == "Agent List"){

    var store_id = "<?php echo $store_manager[0]->store_id; ?>";
    var agentTable = $("#Agent-list-table").dataTable({
          "bLengthChange": true,
          "destroy": true,
          "bPaginate": true,
          "bInfo": true,
          "autoWidth": false,
          'processing': true,
          "serverSide": true,
          "order": [[ 0, "desc" ]],
          'language': {
                    // 'loadingRecords': '&nbsp;',
                    'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
                },
          ajax:{
            url:  "<?php echo base_url('index.php/admin/agents/get-agents-for-admin'); ?>"+"?store_id="+store_id,
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
  
        $("#Agent-list-table").on('click', 'a.view_agents', function(e) {
          e.preventDefault();
          const tableStore = $("#Agent-list-table").DataTable();
          const tr=  $(this).parents('tr');
          const row_id = tableStore.row( tr ).data().id;
          $.ajax({
						url: "<?php echo base_url('index.php/admin/agents/agent-get-view-data'); ?>",
						data: "id="+row_id,
						type: "GET",
						dataType: "JSON",
						cache: false,
						success: function(response)
						{
              $('#view_agent_name').val(response.data[0].agent_name);
              $('#view_agent_id').val(response.data[0].agent_id);
              $('#view_password').val(response.data[0].password);
              if(response.data[0].status == "1"){
                $('#view_status').val("1");
              }else{
                $('#view_status').val("0");
              }
							$('#view_agent_modal').modal('show');
						}
					});
        });
        $("#Agent-list-table").on('click', 'a.view_delete', function(e) {
          e.preventDefault();
          const tableStore = $("#Agent-list-table").DataTable();
          const tr=  $(this).parents('tr');
          const row_id = tableStore.row( tr ).data().id;
          const active_status = tableStore.row( tr ).data().status;
          if(active_status == 0){
            $('#deleteModalAgent').modal('show');
            $("#deleteButton").unbind('click');
            $('#deleteButton').on('click', function(e) {
                $('#deleteModalAgent').modal('hide');
                $.ajax({
                    url:  "<?php echo base_url('index.php/admin/agents/agent-delete'); ?>",
                    data: "id="+row_id,
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    success: function(response)
                    {
                    alert("Agent deleted successfully.");
                    $('#Agent-list-table').DataTable().draw();
                    }
                });
            });
          }else{
            alert("This agent can't delete, because its active agent.");
          }
          
         
        });
        $('#Agent-list-table').on('click', 'a.view_active', function (e) {
            e.preventDefault();
            const tableStore = $('#Agent-list-table').DataTable();
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
                    alert("Agents deactivated successfully.");
                    $('#Agent-list-table').DataTable().draw();
                  }
                });
            });
        } );
        $('#Agent-list-table').on('click', 'a.view_deactive', function (e) {
            e.preventDefault();
            const tableStore = $('#Agent-list-table').DataTable();
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
							alert("Store activated successfully.");
							$('#Agent-list-table').DataTable().draw();
						}
					});
			  });
        } );
  }
  if(activeTab == "Target Details"){
    var row_id = "<?php echo $store_manager[0]->id; ?>";
    var myTarTable = $('#target_details').DataTable({
      "bLengthChange": true,
      "destroy": true,
      "bPaginate": true,
      "bInfo": true,
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "searching": false,
      "order": [[ 0, "desc" ]],
      'language': {
            // 'loadingRecords': '&nbsp;',
            'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
        },
      ajax:{
          url:  "<?php echo base_url('index.php/admin/store/get-set-target-griddata'); ?>",
          type: "POST",
          data:{
              id:row_id
          }
      },
      aoColumns: [
          { mData: 'id',width:"5%" },
          { mData: 'target_date',width:"20%" },
          { mData: 'total_sale_value',width:"20%" },
          { mData: 'total_units_sold',width:"20%" },
          { 
             orderable:false,
              width:"20%",
              data: null,
              className: "center",
              defaultContent: '<center><a class= "set_target_category"><button type="button" class="btn btn-primary btn-sm" style="width: 77px;">Set Target</button></a></center>'
              },
          {
              orderable:false,
              width:"10%",
              data: null,
              className: "center",
              defaultContent: '<center><a href="" class="fas fa-eye  view_categaory" ></a> </center>'
          }
      ],
    });  
    $('#target_details').on('click', 'a.set_target_category', function (e) {
            e.preventDefault();
            const tableStore = $('#target_details').DataTable();
			const tr=  $(this).parents('tr');
            const row_id = tableStore.row( tr ).data().id;
            const store_id =tableStore.row( tr ).data().store_id;
            const total_units_sold = tableStore.row( tr ).data().total_units_sold;
            const total_sale_value = tableStore.row( tr ).data().total_sale_value;
            $('#cat_store_id').val(store_id);
            $('#cat_target_id').val(row_id);
            $('#cat_total_sale_val').val(total_sale_value);
            $('#cat_total_sold_unit').val(total_units_sold);
            $('#categoryAddModal').modal('show');
    });
    $("#cat_add_form").validate({
            rules:{
                cat:{
                     required:true,
                 },
                 catSale:{
                     required:true,
                 },
                 CatUnitSold:{
                     required:true,
                 }
            },
            messages:{
                cat:{
                    required:"Category  required.",
                },
                catSale:{
                    required:"Category Sales Value required.",
                },
                CatUnitSold:{
                    required:"Category Units Sold required.",
                }  
            },
            submitHandler: function (form){
               var store_id = $('#cat_store_id').val();
               var target_setting_id = $('#cat_target_id').val();
               var Category_id =$('#cat').val();
               var Category_value =$('#cat option:selected').text();
               var catSale =$('#catSale').val();
               var CatUnitSold =$('#CatUnitSold').val();
               var totalSale = $('#cat_total_sale_val').val();
               var totalSold = $('#cat_total_sold_unit').val();

					$.ajax({
						url:  "<?php echo base_url('index.php/admin/category/category-mappping-add'); ?>",
						data:  
                        {
                            store_id:store_id,
                            target_setting_id:target_setting_id,
                            Category_id:Category_id,
                            Category_value:Category_value,
                            catSale:catSale,
                            CatUnitSold:CatUnitSold,
                            totalSale:totalSale,
                            totalSold:totalSold,

                        },
						type: "POST",
						dataType: "JSON",
						cache: false,
						success: function(response)
						{
                            if(response.status){
                                $('.cat_error_div').html("<div class='alert alert-success'>Successfully inserted.</div>");
                                $("#cat_add_form")[0].reset();
                                setTimeout(function (){
                                    $(".cat_error_div").html("");
                                },2500)

                            }else{
                                $('.cat_error_div').html("<div style='color:red'>"+response.errors+"</div>");
                            }
						}
					});
                   
            }
        }); 
    $('#target_details').on('click', 'a.view_categaory', function(e) {
        e.preventDefault();
      
        const tableStore = $('#target_details').DataTable();
        const tr=  $(this).parents('tr');
        const row_id = tableStore.row( tr ).data().id;
        $('#Category_data').modal('show');

        var cat_table = $("#catTable").DataTable({
            "bLengthChange": true,
            "destroy": true,
            "bPaginate": true,
            "bInfo": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "searching": false,
            "order": [[ 0, "desc" ]],
            'language': {
                // 'loadingRecords': '&nbsp;',
                'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
            },
            ajax:{
                url:  "<?php echo base_url('index.php/admin/category/get-target-setting-category'); ?>",
                type: "POST",
                data:{
                    target_id:row_id
                }
            },
            aoColumns: [
                { mData: 'id',width:"5%" },
                { mData: 'category_value',width:"20%" },
                { mData: 'category_sale_value',width:"20%" },
                { mData: 'category_unit_sold',width:"20%" },
                { mData: 'updated_at',width:"20%" },
                {
                    orderable:false,
                    width:"5%",
                    data: null,
                    className: "center",
                    defaultContent: '<center><a href="" class="fas fa-trash  cat_delete" ></a></center>'
                }
            ],

        });
    });
    $('#catTable').on('click', 'a.cat_delete', function (e) {
        e.preventDefault();
          const tableStore = $("#catTable").DataTable();
          const tr=  $(this).parents('tr');
          const row_id = tableStore.row( tr ).data().id;
          $('#deleteModalTarCat').modal('show');
          $("#deleteTarButton").unbind('click');
          $('#deleteTarButton').on('click', function(e) {
              $('#deleteModalTarCat').modal('hide');
              $.ajax({
                url:  "<?php echo base_url('index.php/admin/category/target-setting-category-delete'); ?>",
                data: "id="+row_id,
                type: "POST",
                dataType: "JSON",
                cache: false,
                success: function(response)
                {
                  alert("Category deleted successfully.");
                  $('#catTable').DataTable().draw();
                }
              });
          });
    }); 
 }
 if(activeTab == "Last Modifications"){
    var row_id = "<?php echo $store_manager[0]->id; ?>";
    var myTarTable = $('#last_modified_table').DataTable({
      "bLengthChange": true,
      "destroy": true,
      "bPaginate": true,
      "bInfo": true,
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "searching": true,
      "order": [[ 0, "desc" ]],
      'language': {
            // 'loadingRecords': '&nbsp;',
            'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
        },
      ajax:{
          url:  "<?php echo base_url('index.php/admin/store-history/get-history-griddata'); ?>",
          type: "POST",
          data:{
              id:row_id
          }
      },
      aoColumns: [
          { mData: 'id',width:"5%" },
          { mData: 'field_name',width:"20%" },
          { mData: 'field_old_value',width:"20%" },
          { mData: 'field_new_value',width:"20%" },
          { mData: 'field_updated_at',width:"20%" },
        
      ],
    });  
    
   }

});

});
function editStateSelect(){
    $("#edit_city").empty();
    $("#edit_city").append($("<option ></option>").val('').html("Please select city"));
    var selected_country = $("#edit_country").val();
    var selected_state = $("#edit_state").val();
    $.getJSON("<?php echo base_url(); ?>/public/assets/Country-City-State.json", function(st) {
        $.each(st, function(key, value) {
            if(value.name == selected_country){
                $.each(value.states, function(stateKey, stateValue) {
                    if(stateKey == selected_state){
                        $.each(stateValue, function(cityKey, cityValue) {
                            $("#edit_city").append($("<option></option>").val(cityValue).html(cityValue));
                        });
                    }
                });
            }
        });
    });
}
function editCountrySelect(){
    $("#edit_state").empty();
    $("#edit_city").empty();
    $("#edit_state").append($("<option ></option>").val('').html("Please select state"));
    $("#edit_city").append($("<option ></option>").val('').html("Please select city"));
    var selected_country = $("#edit_country").val();
    $.getJSON("<?php echo base_url(); ?>/public/assets/Country-City-State.json", function(st) {
        $.each(st, function(key, value) {
            if(value.name == selected_country){
                    $.each(value.states, function(key1, value1) {
                $("#edit_state").append($("<option></option>").val(key1).html(key1));
                });
            }
        });
    });
    }
  </script>
  
  
  
  <script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  

  <script src="dist/js/pages/dashboard2.js"></script>
  
  
  
  
  </body>
  </html>