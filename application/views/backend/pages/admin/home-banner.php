
<style>

.container, .container-lg, .container-md, .container-sm, .container-xl {
    /* max-width: 1100px; */
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

.filelabel{
/* border: thin; */
    position: absolute;
    width: 19%;
    top: 1;
    right: 0;
    left: -8%;
    z-index: 1;
    height: 124%;
    padding-left: 2%;
    padding-top: 1%;
    font-weight: 400;
    <!-- line-height: 1.5; -->
     color: #495057; 
    background-color: #dee2e6;
    /* border: 1px solid #ced4da; */
    border-radius: .25rem;
    box-shadow: none;
}
</style>
<div class="content-wrapper" style="zoom:90%">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Home Banner</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!--button search or Excel button-->
    <div class="container mb-3">
    <div class="btn-group ml-3" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-info " data-toggle="modal"  data-target="#bannerModal">Add</button>

                </div>
                <div class="btn-group ml-3" role="group" aria-label="First group">
                <button type="button" onclick="expotExcelHomeBanner();"  class="btn btn-outline-info float:right;">

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                         style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                    </svg>
                    <span> Excel Export</span>
                </button>
            </div>
           
   
    </div>
    <!--table container-->
    <div class="container">
        <div class="card mt-2">
            <div class="card-body table-responsive">
                <table id="feature_cat" class="table table-striped table-bordered bg-light">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                  
                </table>
            </div>
        </div>
        <!-- start Delete  Modal -->
        <div id="deleteModalFeatureCat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height:220px;width:100%;margin-left: 40px;zoom:90%;" >
            <div class="modal-header">
                <h3>Delete Home Banner</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Home Banner?</p>
            </div>
            <div class="modal-footer">
                <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
                <button class="btn btn-primary" style="height: 3.25rem;" id ="deleteFeatureCatButton">Yes</button>
            </div>
            </div>
        </div>
        </div>
        <!-- End Delete Modal -->
        
        <!-- upload pop -->
<div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false"
     data-target=".bs-example-modal-lg">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="zoom:90%;">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myModalLabel">Add New Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                
                <div class="msg_div"></div>
                <form name="banner_images" id="banner_images" action="#"  method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput2" style="margin-top:9px">Title</label>
                        <div class="custom-file">
                           <input  type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2" style="margin-top:9px">Status</label>
                        <div class="custom-file">
                            <select class="form-control" name="status" id="status">
                                <option value="">Select status</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>

                   <div class="form-group">
                            <label for="formGroupExampleInput2" style="margin-top:9px">Upload Image</label>
                            <div class="row">
                                    <div class="col-sm-2" >
                                    <img  id="add_preview"style='width:50%;height:120%;' >
                                    </div>
                                    <div class="col-sm-10" >
                                        <!-- <button for="file" type="button" class="btn btn-secondary" id="Select" >upload Image</button> -->
                                        <label for="banner_image" class="filelabel" >Upload Image</label>
                                        <input type="file"  id="banner_image" name="banner_image" accept="image/*" style="visibility:hidden;" required >
                                    </div>
                            </div>  
                        </div>

                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" style="float: right">Save</button>
                            <a class="btn btn-secondary btn-sm" data-dismiss="modal"
                               style="float: right; margin-right: 5px;">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- start toggleOn  Modal -->
<div id="toggleOnModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="height:220px;width:100%;margin-left: 40px;zoom:90%;" >
      <div class="modal-header">
          <h3>Active Home Banner</h3>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Deactivate this Home Banner?</p>
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
    <div class="modal-content" style="height:220px;width:100%;margin-left: 40px;zoom:90%;" >
      <div class="modal-header">
          <h3>Deactive Home Banner</h3>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Activate this Home Banner?</p>
      </div>
      <div class="modal-footer">
        <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
        <button class="btn btn-primary" style="height: 3.25rem;" id ="toggleOffButton">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- End toggleOff Modal -->
<!-- Edit Modal -->
<div class="modal fade" id="editBannerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false"
     data-target=".bs-example-modal-lg">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="zoom:90%;">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myModalLabel">Edit Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                
                <div class="msg_div"></div>
                <form name="edit_banner_images" id="edit_banner_images" action="#"  method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput2" style="margin-top:9px">Title</label>
                        <div class="custom-file">
                           <input  type="text" class="form-control" name="edit_title" id="edit_title">
                           <input  type="hidden" class="form-control" name="home_banner_id" id="home_banner_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2" style="margin-top:9px">Status</label>
                        <div class="custom-file">
                            <select class="form-control" name="edit_status" id="edit_status">
                                <option value="">Select status</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>

                   <div class="form-group">
                            <label for="formGroupExampleInput2" style="margin-top:9px">Upload Image</label>
                            <div class="row">
                                    <div class="col-sm-2" >
                                    <img  id="edit_preview"style='width:50%;height:120%;' >
                                    </div>
                                    <div class="col-sm-10" >
                                        <!-- <button for="file" type="button" class="btn btn-secondary" id="Select" >upload Image</button> -->
                                        <label for="edit_banner_image" class="filelabel" >Upload Image</label>
                                        <input type="file"  id="edit_banner_image" name="edit_banner_image" accept="image/*" style="visibility:hidden;" >
                                    </div>
                            </div>  
                        </div>

                    
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" style="float: right">update</button>
                            <a class="btn btn-secondary btn-sm" data-dismiss="modal"
                               style="float: right; margin-right: 5px;">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>

    <!--table container end-->
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
        
        
    var validator =$('#banner_images').validate();
    validator.resetForm();

    $('#add_preview').attr('src',"")
});
    /** file upload image */    
    var fileTag = document.getElementById("banner_image"),
    add_preview = document.getElementById("add_preview");

    fileTag.addEventListener("change", function() {
    changeImage(this);
    });

    function changeImage(input) {
    var reader;
        if (input.files && input.files[0]) {
            reader = new FileReader();

            reader.onload = function(e) {
            add_preview.setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    var editFileTag = document.getElementById("edit_banner_image"),
    edit_preview = document.getElementById("edit_preview");

    editFileTag.addEventListener("change", function() {
        editChangeImage(this);
    });


    function editChangeImage(input) {
    var edit_reader;
        if (input.files && input.files[0]) {
            edit_reader = new FileReader();
            edit_reader.onload = function(e) {
                edit_preview.setAttribute('src', e.target.result);
            }
            edit_reader.readAsDataURL(input.files[0]);
        }
    }



    var featureTable = $('#feature_cat').DataTable({
        "bLengthChange": true,
        "bPaginate": true,
        "bInfo": true,
        "autoWidth": false,
        "serverSide": true,
        'processing': true,
        // "ordering":false,
        "order": [[ 0, "desc" ]],
        'language': {
                // 'loadingRecords': '&nbsp;',
                'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
            },
        ajax:{
        url:  "<?php echo base_url('index.php/admin/feature-category/get-home-banner'); ?>",
        type: "POST",
        },
        aoColumns: [
            { mData: 'id',width:"5%" },
            { 
                orderable:false,
                data: 'image_name',"render": function(data, type, row) {
                return '<img height="50px" width="100px" src="<?php echo base_url("public/uploads/homebanner/")?>/'+data+'" class="img-thumbnail">';
                }
            },
            { mData: 'title',width:"20%" },
            { data: 'status', width:"15%", "render" : function(data)
                {
                    if (data == "1") {
                        return '<center> <a class="switch view_active"><input type="checkbox" checked  ><span class="slider round"></span></a></center>'
                    }else{
                        return '<center> <a class="switch view_deactive"><input type="checkbox"  ><span class="slider round"></span></a></center>'
                    }
                },
            },
            {
                orderable:false,
                data: null,
                className: "center",
                defaultContent: '<center><a href=""  class="fas fa-edit edit_feature_cat" ></a><a style="margin-left: 20%;"href="" class="fas fa-trash  delete_feature_cat" ></a></center>'
            }
        ],
    });
    $('#feature_cat').on('click', 'a.view_active', function (e) {
            e.preventDefault();
            const tableStore = $('#feature_cat').DataTable();
			      const tr=  $(this).parents('tr');
			      const row_id = tableStore.row( tr ).data().id;
            $('#toggleOnModal').modal('show');
			      $("#toggleOnButton").unbind('click');
            $('#toggleOnButton').on('click', function(e) {
					  $('#toggleOnModal').modal('hide');
            $.ajax({
                  url:  "<?php echo base_url('index.php/admin/home-banner/status-active'); ?>",
                  data: "id="+row_id,
                  type: "POST",
                  dataType: "JSON",
                  cache: false,
                  success: function(response)
                  {
                    alert("Home banner deactivated successfully.");
                    $('#feature_cat').DataTable().draw();
                  }
                });
            });
        } );
        $('#feature_cat').on('click', 'a.view_deactive', function (e) {
            e.preventDefault();
            const tableStore = $('#feature_cat').DataTable();
            const tr=  $(this).parents('tr');
            const row_id = tableStore.row( tr ).data().id;
            $('#toggleOffModal').modal('show');
            $("#toggleOffButton").unbind('click');
            $('#toggleOffButton').on('click', function(e) {
                $('#toggleOffModal').modal('hide');
                $.ajax({
                    url:  "<?php echo base_url('index.php/admin/home-banner/status-deactive'); ?>",
                    data: "id="+row_id,
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    success: function(response)
                    {
                      alert("Home banner activated successfully.");
                      $('#feature_cat').DataTable().draw();
                    }
                });
			      });
        });
    $("#feature_cat").on('click', 'a.delete_feature_cat', function(e) {
          e.preventDefault();
          const tableStore = $("#feature_cat").DataTable();
          const tr=  $(this).parents('tr');
          const row_id = tableStore.row( tr ).data().id;
          $('#deleteModalFeatureCat').modal('show');
          $("#deleteFeatureCatButton").unbind('click');
          $('#deleteFeatureCatButton').on('click', function(e) {
              $('#deleteModalFeatureCat').modal('hide');
              $.ajax({
                url:  "<?php echo base_url('index.php/admin/home-banner/delete'); ?>",
                data: "id="+row_id,
                type: "POST",
                dataType: "JSON",
                cache: false,
                success: function(response)
                {
                  alert("Home banner deleted successfully.");
                  $('#feature_cat').DataTable().draw();
                }
              });
          });
    });
    $("#feature_cat").on('click', 'a.edit_feature_cat', function(e) {
          e.preventDefault();
          const tableStore = $("#feature_cat").DataTable();
          const tr=  $(this).parents('tr');
          const row_id = tableStore.row( tr ).data().id;
          $('#home_banner_id').val(row_id);
          $('#editBannerModal').modal('show');
          $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/admin/feature-category/get-feature-category'); ?>",
            data: {feature_cat_id: row_id},
            dataType: 'json',
            cache: false,
            success: function (response) {
                var result = response; // JSON.parse(response);
                if (result.status) {
                    $(".csrf_token").val(result.token);
                    $('#edit_title').val(result[0][0].title);
                    $('#edit_status').val(result[0][0].status);
                    $('#edit_preview').attr('src', "<?php echo base_url("public/uploads/homebanner/")?>/"+result[0][0].image_name);
                   
                } else {
                    $('.').html("something went wrong");
                }
            }
        });

    });
   

   
   

    $(function () {
        $("#banner_images").validate({
            ignore: ":hidden",
            rules: {
                title: "required",
                status: "required",
            },
            messages: {
                title: {
                    "required": "Title filed required.",
                },
                status: "status field required.",
             
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/admin/feature-category/add-home-banner'); ?>",
                    data: new FormData($('#banner_images')[0]),
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {
                       // console.log(response);
                        var result = JSON.parse(response);
                        if (result.status) {
                            $('.msg_div').html("<div class='alert alert-success'>" + result.msg + "</div>");
                            $("#banner_images")[0].reset();
                            $('#add_preview').attr("src",'');
                            setTimeout(function () {
                                $(".msg_div").html("");
                               
                                $("#feature_cat").DataTable().draw();
                            }, 2500)

                        } else {
                            $('.msg_div').html(result.errors);
                        }
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });
        $("#edit_banner_images").validate({
            ignore: ":hidden",
            rules: {
                edit_title: "required",
                edit_status: "required",
            },
            messages: {
                edit_title: {
                    "required": "Title filed required.",
                },
                edit_status: "status field required.",
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/admin/home-banner/update'); ?>",
                    data: new FormData($('#edit_banner_images')[0]),
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {
                       // console.log(response);
                        var result = JSON.parse(response);
                        if (result.status) {
                            $('.msg_div').html("<div class='alert alert-success'>" + result.msg + "</div>");
                            setTimeout(function () {
                                $(".msg_div").html("");
                                $("#editBannerModal").modal("toggle");
                                $("#feature_cat").DataTable().draw();
                                <!-- location.reload(); -->
                            }, 2500)

                        } else {
                            $('.msg_div').html(result.errors);
                        }
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });

       
      
    });
    function expotExcelHomeBanner(){
        var searchValue = $('.dataTables_filter input').val();
        window.location ="<?php echo base_url('index.php/admin/export-homebanner'); ?>?searchValue="+searchValue;  

    }
</script>