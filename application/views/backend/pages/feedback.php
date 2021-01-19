<style>
.container, .container-lg, .container-md, .container-sm, .container-xl {
    /* max-width: 1450px; */
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
</style>
<div class="content-wrapper" style="zoom:90%;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Feedback</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="container mb-3">
        <div class="row">
            
            <div class="btn-group  mr-3 px-2" role="group" aria-label="forth group">
                <button type="button" onclick="smFeedbackExpotExcel();" class="btn btn-outline-info btn-lg" style="padding: 0px 50px;">
                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill" style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                    </svg>
                    <span> Excel Export</span>
                </button>
            </div>
        </div>
    </div>
    <!--table conatainer-->
    <div class="container">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="feedback_table" class="table table-striped table-bordered bg-light " style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">Sr. No</th>
                        <th scope="col">Store Id</th>
                        <th scope="col">Emp Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Feedback Date</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- model 0n view -->

        <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Feedback Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
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
                                    <label for="feedback">Feedback</label>
                                    <input type="text" class="form-control" name="feedback" id="feedback">
                                </div>

                                <div class="col">
                                    <label for="feedback_rate">Feedback Rate</label>
                                    <input type="text" class="form-control" name="feedback_rate" id="feedback_rate">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="feed_dt">Feedback Date & Time</label>
                                    <input type="text" class="form-control" name="feed_dt" id="feed_dt">
                                </div>

                                <div class="col">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" name="state" id="state">
                                </div>
                            </div>

                            <a class="btn btn-secondary btn-sm" data-dismiss="modal" style=" float:right;padding: 4px 40px;margin-top: 16px;color: white;">Close</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Contains all page content end -->

</div>
<script>
$(document).ready(function (){
    $('#store_id').change()
    // $('select.selectpicker').on('change', function(){
    //     var selected = $('.selectpicker option:selected').val();
    //     alert(selected);
    // });
    var myTarTable = $('#feedback_table').DataTable({
    //   "bLengthChange": true,
      "destroy": true,
      "bPaginate": true,
      "bInfo": true,
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "searching": false,
      "order": [[0,"desc"]],
      'language': {
                // 'loadingRecords': '&nbsp;',
                'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
            },
      ajax:{
          url:  "<?php echo base_url('index.php/admin/feedback/get-feedback-grid-data'); ?>",
          type: "POST",
      },
      aoColumns: [
          { mData: 'id',width:"8%" },
          { mData: 'store_id',width:"10%" },
            { mData: 'emp_id',width:"8%"},
            { mData: 'first_name',width:"12%" },
            { mData: 'last_name',width:"12%" },
            { mData: 'email',width:"15%" },
            { mData: 'rating',width:"9%" },
            { mData: 'feedback_date',width:"15%" },
          {
              orderable:false,
              width:"10%",
              data: null,
              className: "center",
              defaultContent: '<center><a href="" class="fas fa-eye  view_feedback" ></a> </center>'
          }
      ],
    });  
    $("#feedback_table").on('click', 'a.view_feedback', function(e) {
          e.preventDefault();
          const tableStore = $("#feedback_table").DataTable();
          const tr=  $(this).parents('tr');
          const row_id = tableStore.row( tr ).data().id;
          $('#feedbackModal').modal('show');
          $.ajax({
                type: "GET",
                url: "<?php echo base_url('index.php/admin/feedback/get-feedback-details-byid'); ?>",
                data: {feedback_id: row_id},
                dataType: 'json',
                cache: false,
                success: function (response) {
                    var result = response; // JSON.parse(response);
                    if (result.status) {
                        $("#first_name").val(result.data[0].first_name);
                        $('#last_name').val(result.data[0].last_name);
                        $("#email").val(result.data[0].email);
                        $('#mobile_no').val(result.data[0].phone_number);
                        $('#feedback').val(result.data[0].feedback);
                        $('#feedback_rate').val(result.data[0].rating);
                        $('#feed_dt').val(result.data[0].feedback_date);
                        $("#state").val(result.data[0].state);
                    
                    } else {
                        $('.').html("something went wrong");
                    }
                }
            });

    });
});
function smFeedbackExpotExcel(){
        var searchValue = $('.dataTables_filter input').val();
        window.location ="<?php echo base_url('index.php/sm/export-feedback'); ?>?searchValue="+searchValue;  
    }

</script>