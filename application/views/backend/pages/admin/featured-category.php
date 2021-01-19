<style>
.container, .container-lg, .container-md, .container-sm, .container-xl {
    /* max-width: 1100px; */
}

.filelabel{
/* border: thin; */
    position: absolute;
    width: 38%;
    top: 1;
    right: 0;
    left: 0;
    z-index: 1;
    height: 100%;
    padding-left: 4%;
    padding-top: 1%;
    font-weight: 400;
    <!-- line-height: 1.5; -->
     color: #495057; 
    background-color: #dee2e6;
    /* border: 1px solid #ced4da; */
    border-radius: .25rem;
    box-shadow: none;
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
<div class="content-wrapper" style="zoom:90%">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Featured Categories</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!--button search or Excel button-->
    <div class="container mb-3">
    <div class="btn-group ml-3" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-info " data-toggle="modal"  data-target="#featured_modal">Add</button>

                </div>
                <div class="btn-group ml-3" role="group" aria-label="First group">
                <button type="button" onclick="expotFeacturedCat();"  class="btn btn-outline-info float:right;">

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                         style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                    </svg>
                    <span> Excel Export </span>
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
                        <th scope="col">Featured Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Product Line</th>
                        <th scope="col">Attachment</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                  
                </table>
            </div>
        </div>
        <!-- start Delete  Modal -->
        <div id="deleteModalFeatureCat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height:220px;width:100%;margin-left:40px;zoom:90%;" >
            <div class="modal-header">
                <h3>Delete Feature Category</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Feature Category?</p>
            </div>
            <div class="modal-footer">
                <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
                <button class="btn btn-primary" style="height: 3.25rem;" id ="deleteFeatureCatButton">Yes</button>
            </div>
            </div>
        </div>
        </div>
        <!-- End Delete Modal -->
        <!-- model Edit view  -->
        <div class="modal fade" id="edit_featured_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="zoom:90%;">
                    <div class="msg_div"></div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Edit Featured Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form name="feature_cat_edit_form" id="feature_cat_edit_form" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="featured_category">Featured Category</label>
                                        <input type="text" class="form-control" name="edit_featured_category"
                                               id="edit_featured_category">
                                        <input type="hidden"  name="edit_featured_category_id" id="edit_featured_category_id">
                                    </div>

                                    <div class="form-group">
                                        <label for="edit_product_category">Product Category</label>
                                        <select class="form-control" id="edit_product_category" name="edit_product_category">
                                            <option value="">Please choose category</option>
                                            <?php
                                            if (isset($categories) && count($categories) > 0) {
                                                foreach ($categories as $category) {
                                                    echo "<option value='" . $category->id . "'>$category->category_name</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="edit_description" rows="5"
                                              name="edit_description"></textarea>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="edit_product_sub_category">Product Sub Category</label>
                                    <select class="form-control" id="edit_product_sub_category" name="edit_product_sub_category">
                                        <option value="">Please choose sub category</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="edit_product_line">Product Line</label>
                                    <select class="form-control" id="edit_product_line" name="edit_product_line">
                                        <option value="">Please choose product line.</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">
                            <div class="col">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2" style="margin-top:9px">Upload Image</label>
                                        <div class="row">
                                                <div class="col-sm-2" >
                                                <img  id="edit_preview"style='width:100%;height:100%;' >
                                                </div>
                                                <div class="col-sm-10" >
                                                    <label for="edit_file" class="filelabel" >Upload Image</label>
                                                    <input type="file" id="edit_file" name="edit_file"accept="image/*" style="visibility:hidden;">
                                                </div>
                                        </div>  
                                    </div>
                                </div>
                                <div class="col">
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
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" style="float: right">Update</button>
                            <a class="btn btn-secondary btn-sm" data-dismiss="modal"
                               style="float: right; margin-right: 5px;">Close</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- model 0n view end -->
        <!-- model 0n view  -->
        <div class="modal fade" id="featured_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="zoom:90%;">
                    <div class="msg_div"></div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Featured Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form name="feature_image_form" id="feature_image_form" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="featured_category">Featured Category</label>
                                        <input type="text" class="form-control" name="featured_category"
                                               id="featured_category">
                                    </div>

                                    <div class="form-group">
                                        <label for="product_category">Product Category</label>
                                        <select class="form-control" id="product_category" name="product_category">
                                            <option value="">Please choose category</option>
                                            <?php
                                            if (isset($categories) && count($categories) > 0) {
                                                foreach ($categories as $category) {
                                                    echo "<option value='" . $category->id . "'>$category->category_name</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5"
                                              name="description"></textarea>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="product_sub_category">Product Sub Category</label>
                                    <select class="form-control" id="product_sub_category" name="product_sub_category">
                                        <option value="">Please choose sub category</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="product_line">Product Line</label>
                                    <select class="form-control" id="product_line" name="product_line">
                                        <option value="">Please choose product line.</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2" style="margin-top:9px">Upload Image</label>
                                        <div class="row">
                                                <div class="col-sm-2" >
                                                <img  id="add_preview"style='width:100%;height:100%;' >
                                                </div>
                                                <div class="col-sm-10" >
                                                    <!-- <button for="file" type="button" class="btn btn-secondary" id="Select" >upload Image</button> -->
                                                    <label for="add_file" class="filelabel" >Upload Image</label>
                                                    <input type="file" id="add_file" name="file"accept="image/*" style="visibility:hidden;" required >
                                                </div>
                                        </div>  
                                    </div>
                                </div>
                                <div class="col">
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
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" style="float: right">Save</button>
                            <a class="btn btn-secondary btn-sm" data-dismiss="modal"
                               style="float: right; margin-right: 5px;">Close</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- model 0n view end -->
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
        
        
    var validator =$('#feature_image_form').validate();
    validator.resetForm();

    $('#add_preview').attr('src',"")
});
    /** file upload image */    
    var fileTag = document.getElementById("add_file"),
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


    var edit_fileTag = document.getElementById("edit_file"),
    edit_preview = document.getElementById("edit_preview");

          
    edit_fileTag.addEventListener("change", function() {
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
        "order": [[ 0, "desc" ]],
        // "ordering":false,
        'language': {
                // 'loadingRecords': '&nbsp;',
                'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
            },
        ajax:{
        url:  "<?php echo base_url('index.php/admin/feature-category/get-feature-category-griddata'); ?>",
        type: "POST",
        },
        aoColumns: [
            { mData: 'id',width:"5%" },
            { orderable:false,
                data: 'image_name',"render": function(data, type, row) {
                return '<img height="50px" width="100px" src="<?php echo base_url("public/uploads/featuredCat/")?>/'+data+'" class="img-thumbnail">';
                    // return '<img src="'+data+'"style="height:100px;width:100px;" />';
                }
            },
            { mData: 'feature_category_name',width:"17%" },
            { mData: 'description',width:"10%" },
            { data: 'product_category_name', width:"13%"},
            { mData: 'product_sub_category_name',width:"13%" },
            { mData: 'product_line_name',width:"13%" },
            { 
                orderable:false,
                data:'final_image',
                width:'10%'
                ,"render": function(data, type, row) {
                    if(data.length >15){
                        return data.slice(0, 15)+'...'; 
                    }else{
                        return data; 
                    }
                }
            },
            {
                width:"5%",
                data: null,
                className: "center",
                defaultContent: '<center><a href=""  class="fas fa-edit edit_feature_cat" ></a><a style="margin-left: 20%;"href="" class="fas fa-trash  delete_feature_cat" ></a></center>'
            }
        ],
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
                url:  "<?php echo base_url('index.php/admin/feature-category/delete-feature-category'); ?>",
                data: "id="+row_id,
                type: "POST",
                dataType: "JSON",
                cache: false,
                success: function(response)
                {
                  alert("Featured category deleted successfully.");
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
          $('#edit_featured_modal').modal('show');
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
                    $('#edit_featured_category_id').val(result[0][0].id);
                    $('#edit_featured_category').val(result[0][0].feature_category_name);
                    $('#edit_description').val(result[0][0].description);
                    $('#edit_product_category').val(result[0][0].product_category_id);
                    $('#edit_status').val(result[0][0].status);
                    $('#edit_preview').attr('src', "<?php echo base_url("public/uploads/featuredCat/")?>/"+result[0][0].image_name);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('index.php/admin/category/get-subcategory'); ?>",
                        data: {category_id: result[0][0].product_category_id},
                        dataType: 'json',
                        cache: false,
                        success: function (response) {
                            var result_sub = response; // JSON.parse(response);
                            if (result_sub.status) {
                                $("#edit_product_sub_category").html(result_sub.data);
                                $("#edit_product_sub_category").val(result[0][0].product_sub_category_id);
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('index.php/admin/products/get-productline'); ?>",
                                    data: {category_id: result[0][0].product_category_id, subcat_id:result[0][0].product_sub_category_id},
                                    dataType: 'json',
                                    cache: false,
                                    success: function (response) {
                                        var result_product_line = response; // JSON.parse(response);
                                        if (result_product_line.status) {
                                           $("#edit_product_line").html(result_product_line.data);
                                           $("#edit_product_line").val(result[0][0].product_line_id);
                                        } else {
                                            $('.error_div').html("something went wrong");
                                        }
                                    }
                                });
                            } else {
                                $('.error_div').html("something went wrong");
                            }
                        }
                    });
                } else {
                    $('.').html("something went wrong");
                }
            }
        });
          <!-- $("#deleteFeatureCatButton").unbind('click'); -->

    });
    $(document).on("change", "#edit_product_category", function (e) {
        e.preventDefault();
        $("#edit_product_line").html("");
        var category_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/admin/category/get-subcategory'); ?>",
            data: {category_id: category_id},
            dataType: 'json',
            cache: false,
            success: function (response) {
                var result = response; // JSON.parse(response);
                if (result.status) {
                    $("#edit_product_sub_category").html(result.data);
                } else {
                    $('.error_div').html("something went wrong");
                }
            }
        });
    });
    $(document).on("change", "#edit_product_sub_category", function (e) {
        e.preventDefault();
        $("#product_line").html("");
        var category_id = $("#edit_product_category").val();
        var subcat_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/admin/products/get-productline'); ?>",
            data: {category_id: category_id, subcat_id: subcat_id},
            dataType: 'json',
            cache: false,
            success: function (response) {
                var result = response; // JSON.parse(response);
                if (result.status) {
                    $("#edit_product_line").html(result.data);
                } else {
                    $('.error_div').html("something went wrong");
                }
            }
        });
    });
    $(document).on("change", "#product_category", function (e) {
        e.preventDefault();
        $("#product_line").html("");
        var category_id = $(this).val();
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/admin/category/get-subcategory'); ?>",
            data: {category_id: category_id},
            dataType: 'json',
            cache: false,
            success: function (response) {
                var result = response; // JSON.parse(response);
                if (result.status) {
                    $(".csrf_token").val(result.token);
                    $("#product_sub_category").html(result.data);
                } else {
                    $('.error_div').html("something went wrong");
                }
            }
        });
    });

    $(document).on("change", "#product_sub_category", function (e) {
        e.preventDefault();
        $("#product_line").html("");
        var category_id = $("#product_category").val();
        var subcat_id = $(this).val();
        var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
        var csrfHash = $('.csrf_token').val(); // CSRF hash
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/admin/products/get-productline'); ?>",
            data: {category_id: category_id, subcat_id: subcat_id, [csrfName]: csrfHash},
            dataType: 'json',
            cache: false,
            success: function (response) {
                var result = response; // JSON.parse(response);
                if (result.status) {
                    $(".csrf_token").val(result.token);
                    $("#product_line").html(result.data);

                } else {
                    $('.error_div').html("something went wrong");
                }
            }
        });
    });

    $(function () {
        $("#feature_image_form").validate({
            ignore: ":hidden",
            rules: {
                featured_category: "required",
                product_category: "required",
                description: "required",
                product_sub_category: "required",
                product_line: "required",
                status: "required"
            },
            messages: {
                featured_category: {
                    "required": "Featured category filed required.",
                },
                product_category: "Product category field required.",
                description: "Description field required.",
                product_sub_category: "Product sub category field required.",
                product_line: "Product line field required.",
                status: "Status field required."
            },
            submitHandler: function (form) {
                var product_cat_name =  $('#product_category option:selected').text(); 
                var product_sub_cat_name =   $('#product_sub_category option:selected').text(); 
                var product_line_name =  $('#product_line option:selected').text(); 
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/admin/feature-category/add'); ?>"+"?product_cat_name="+product_cat_name+"&product_sub_cat_name="+product_sub_cat_name+"&product_line_name="+product_line_name,
                    data: new FormData($('#feature_image_form')[0]),
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {
                       // console.log(response);
                        var result = JSON.parse(response);
                        if (result.status) {
                            $('.msg_div').html("<div class='alert alert-success'>" + result.msg + "</div>");
                            $("#feature_image_form")[0].reset();
                            $('#add_preview').attr("src",'');
                            setTimeout(function () {
                                $(".msg_div").html("");
                               
                                <!-- $("#featured_modal").modal("toggle"); -->
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
        $("#feature_cat_edit_form").validate({
            ignore: ":hidden",
            rules: {
                edit_featured_category: "required",
                edit_product_category: "required",
                edit_description: "required",
                edit_edit_product_sub_category: "required",
                edit_product_line: "required",
                edit_status: "required"
            },
            messages: {
                edit_featured_category: {
                    "required": "Featured category filed required.",
                },
                edit_product_category: "Product category field required.",
                edit_description: "Description field required.",
                edit_product_sub_category: "Product sub category field required.",
                edit_product_line: "Product line field required.",
                edit_status: "Status field required."
            },
            submitHandler: function (form) {
                var product_cat_name =  $('#edit_product_category option:selected').text(); 
                var product_sub_cat_name =   $('#edit_product_sub_category option:selected').text(); 
                var product_line_name =  $('#edit_product_line option:selected').text(); 
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('index.php/admin/feature-category/update'); ?>"+"?product_cat_name="+product_cat_name+"&product_sub_cat_name="+product_sub_cat_name+"&product_line_name="+product_line_name,
                    data: new FormData($('#feature_cat_edit_form')[0]),
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
                                $("#edit_featured_modal").modal("toggle");
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
    function expotFeacturedCat(){
        var searchValue = $('.dataTables_filter input').val();
        window.location ="<?php echo base_url('index.php/admin/export-featured-category'); ?>?searchValue="+searchValue;  
    }
</script>