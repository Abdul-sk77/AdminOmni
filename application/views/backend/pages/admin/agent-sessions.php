<style>

.m-0 {
  margin: 1px 1px 1px 2rem !important;
}
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1080px;
}
</style>
<!-- Contains all page content -->
<div class="content-wrapper" style="zoom:90%">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">User Agent Session</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <button type="button" class="btn btn-outline-info btn-lg"
                            style="float:right; padding: 0px 40px; margin-right:5px">
                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                             style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                        </svg>
                        <span> Excel export</span>
                    </button>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active"
                style=" background-color: #66666687; margin-right: 5px; color: #000; border-radius:4px">
                <a class="nav-link active" id="pills-session-tab" data-toggle="pill" href="#pills-session" role="tab"
                   aria-controls="pills-session" aria-selected="true" style="color:#fff;">Average Session Time</a>
            </li>
            <li class="nav-item"
                style=" background-color: #66666687; margin-right: 5px; color: #000; border-radius:4px">
                <a class="nav-link" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab"
                   aria-controls="pills-login" aria-selected="false" style="color:#fff;">Device Login</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane active" id="pills-session" role="tabpanel" aria-labelledby="pills-session-tab">
                <div class="container-fluid">
                    <div class="row" style="padding: 3px 10px;">
                        <div class="col-12 col-sm-3 col-md-3 px-1">

                            <select multiple data-style="bg-whitesmoke px-3" class="selectpicker w-100"
                                    title="Select Store id*">
                                
                            </select>

                        </div>
                        <div class="col-12 col-sm-3 col-md-3 px-1">

                            <select multiple data-style="bg-whitesmoke px-3" class="selectpicker w-100"
                                    title="Select Month">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                        </div>
                        <div class="col-12 col-sm-3 col-md-3 px-1">

                            <select multiple data-style="bg-whitesmoke px-3" class="selectpicker w-100"
                                    title="Select FY*">
                                <option>United Kingdom</option>
                                <option>United States</option>
                                <option>France</option>
                                <option>Germany</option>
                                <option>Italy</option>
                            </select>

                        </div>

                        <div class="col-12 col-sm-2 col-md-2 px-1">

                            <select multiple data-style="bg-whitesmoke px-3" class="selectpicker w-100"
                                    title="Select Date*">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                        </div>

                        <div class="col-12 col-sm-1 col-md-1 px-1">
                            <button type="button" class="btn btn-outline-info btn-lg"
                                    style="text-align: center; font-size:18px; padding: 3px 10px">Submit
                            </button>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body table-responsive">
                            <table id="example" class="table table-striped table-bordered mydatatable bg-light"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No of Logins</th>
                                    <th scope="col">Avg. Login Session Time(In Mintues)</th>
                                    <th scope="col">Last Login</th>
                                    <th scope="col">Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>adc@gmail.com</td>
                                    <td>5</td>
                                    <td><input type="date" name="log_session_time"></td>
                                    <td>Sep 25 2020 12:12:12 PM</td>
                                    <td><a href="" class="mr-2" data-toggle="modal" data-target="#myMod"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- pop up -->
                    <div class="modal fade" id="myMod" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Agent Session Log- 1090ND0</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="model-body">
                                    <table id="example" class="table table-striped table-bordered mydatatable bg-light"
                                           style="width:100%">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Device ID</th>
                                            <th scope="col">Activity</th>
                                            <th scope="col">Date & Time</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>23536145248</td>
                                            <td>5</td>
                                            <td>Sep 25 2020 12:12:12 PM</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- close pop up -->
                </div>
            </div>

            <div class="tab-pane" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                <div class="container-fluid">
                    <div class="row" style="padding: 3px 10px;">
                        <div class="col-12 col-sm-3 col-md-3 px-1">

                            <select multiple data-style="bg-whitesmoke px-3" class="selectpicker w-100"
                                    title="Select Store id*">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                        </div>
                        <div class="col-12 col-sm-3 col-md-3 px-1">

                            <select multiple data-style="bg-whitesmoke px-3" class="selectpicker w-100"
                                    title="Select Month" style="height: 30px">
                                <option>United Kingdom</option>
                                <option>United States</option>
                                <option>France</option>
                                <option>Germany</option>
                                <option>Italy</option>
                            </select>

                        </div>
                        <div class="col-12 col-sm-3 col-md-3 px-1">

                            <select multiple data-style="bg-whitesmoke px-3" class="selectpicker w-100"
                                    title="Select FY*">
                                <option>United Kingdom</option>
                                <option>United States</option>
                                <option>France</option>
                                <option>Germany</option>
                                <option>Italy</option>
                            </select>

                        </div>


                        <div class="col-12 col-sm-3 col-md-3 px-1">
                            <button type="button" class="btn btn-outline-info btn-lg"
                                    style="text-align: center; float: right; font-size:18px; padding: 3px 10px">Submit
                            </button>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body table-responsive">
                            <table id="example" class="table table-striped table-bordered mydatatable bg-light"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Device Id</th>
                                    <th scope="col">Account Id</th>
                                    <th scope="col">Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>600-09698</td>
                                    <td>6767498366-0489468496375</td>
                                    <td><input type="date" name="date"></td>

                                </tr>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- end content -->
<script type="text/javascript">
    $(document).ready(function(){
     
      $("#state").change(function() {
        $.ajax({
            url:  "<?php echo base_url('/admin/store/store-manager-get-storeids'); ?>",
            data: "id="+row_id,
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(response)
            {
                alert("Store Manager Deleted successfully!");
                $('#store-manager-table').DataTable().draw();
            }
        });
      });
</script>