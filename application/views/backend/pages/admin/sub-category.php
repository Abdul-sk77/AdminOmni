
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sub Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.content-header button group -->
    <section class="content">
        <div class="container">
            <!--search or excel-->
            <div class="row ml-5">

                <div class="btn-group ml-3 mr-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-info btn-lg" id="sub_category_btn" style="padding: 3px 85px; float:right;">Add
                    </button>
                </div>

                <div class="btn-group mr-3 px-2" role="group" aria-label="forth group">
                    <button type="button" class="btn btn-outline-info btn-lg" style="padding: 3px 70px; float:right;">
                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                             style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                        </svg>
                        <span> Excel </span>
                    </button>
                </div>
            </div>

            <!--card table-->
            <div class="container">
                <div class="card mt-2">
                   
                    <div class="card-body table-responsive">
                        <table id="sub_category_table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Sub Category</th>
                                <th scope="col">Category</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($sub_categories) && count($sub_categories) > 0){
                                    foreach($sub_categories as $subcategory){
//                                        print_r($subcategory);exit();
                            ?>
                                        <tr>
                                            <th scope="row">
                                                <img height="50px" width="100px" src="<?php echo base_url("public/uploads/sub_category/")."/".$subcategory->attachment; ?>" alt="" class="img-thumbnail">
                                            </th>
                                            <td><?php echo $subcategory->sub_category_name; ?></td>
                                            <td><?php echo $subcategory->category_id; ?></td>
                                            <td><?php echo $subcategory->description; ?></td>
                                            <td><?php echo $subcategory->status; // ( === 1)?"Active":"Inactive"; ?></td>
                                            <td>

                                                <a href="" id="update_subcategory" data-id="<?php echo $subcategory->id; ?>" class="ml-3 update_subcategory">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd"
                                                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </a>
                                                <a  onclick="return confirm('Are you sure want to delete.?')" href="<?php echo base_url('/admin/category/delete-subcategory/'.$subcategory->id); ?>">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }else{
                                    echo "<tr><td>No sub category found.</td></tr>";
                                }

                            ?>

                            </tbody>
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Sub Category</th>
                                <th scope="col">Category</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                        </table>

                    </div>
                    <!--modal sub-category-->
                    <div class="modal fade" id="sub_category_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Add Sub Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="msg_div"></div>
                                    <div class="">
                                        <form id="sub_category_form" name="sub_category_form" method="POST" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label>Sub Category</label>
                                                <input type="hidden" class="form-control form-control-sm" id="subcategory_id" name="subcategory_id">
                                                <input type="hidden" class="form-control form-control-sm" id="sub_category_old_img" name="sub_category_old_img">
                                                <input type="text" class="form-control form-control-sm" id="sub_category" name="sub_category">
                                            </div>
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category" id="category" class="form-control form-control-sm">
                                                    <option value="">Select Category</option>
                                                    <?php
                                                        if(isset($categories) && count($categories) > 0){
                                                            foreach($categories as $category){
                                                                echo "<option value=".$category->id.">".$category->category_name."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea class="form-control form-control-sm" id="description" rows="2" name="description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="formGroupExampleInput2" style="margin-top:9px">Status</label>
                                                <div class="custom-file">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">Select status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Upload Image</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" placeholder=""
                                                           aria-describedby="basic-addon2" id="sub_category_img" name="sub_category_img">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-primary btn" id="basic-addon2">Upload Image</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" id="sub_category_submit_btn">Save</button>
                                                <button type="button" class="btn btn-default" id="btnCloseIt" data-dismiss="modal">Close</button>
                                            </div>
                                         </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!--card end-->

                </div>
                <!--div container end-->
            </div>


            <!--conatainer-fluid-->
        </div>
        <!--section end-->
    </section>


</div>
<!-- ./wrapper -->


<script>

    $(document).ready(function() {
        $('#sub_category_table').DataTable();
    });


    $(document).on("click",'#sub_category_btn',function (){
        var validator = $("#sub_category_form").validate();
        validator.resetForm();
        $("#sub_category_form")[0].reset();
        $(".errors").hide();
        $("#sub_category_model").modal('show');
    });

    $(function(){
        $("#sub_category_form").validate({
            ignore: ":hidden",
            rules:{
                sub_category:"required",
                category:"required",
                description:"required",
                status:"required"
            },
            messages: {
                sub_category: {
                    required: "Please enter sub category.",
                },
                category: "Please select category.",
                description: "Please enter product line."
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/admin/category/add-subcategory'); ?>",
                    data:  new FormData($('#sub_category_form')[0]),
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {
                        // console.log(response);
                        var result = JSON.parse(response);
                        if(result.status){
                            $('.msg_div').html("<div class='alert alert-success'>"+result.msg+"</div>");
                            $("#sub_category_form")[0].reset();
                            setTimeout(function (){
                                $(".msg_div").html("");
                                location.reload();
                            },2500)

                        }else{
                            $('.msg_div').html(result.errors);
                        }
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });
    });


    $(".update_subcategory").click(function(e){
        e.preventDefault();

        var subcategory_id = $(this).data('id');

        var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
        var csrfHash = $('.csrf_token').val(); // CSRF hash

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/admin/category/get-subcategory-data'); ?>"+"/"+subcategory_id,
            data: { subcategory_id: subcategory_id, [csrfName]: csrfHash  },
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {

                var result = response; // JSON.parse(response);
                // return  false;
                if(result.status){
                    $(".csrf_token").val(result.token);
                    $("#sub_category").val(result.data[0].sub_category_name);
                    $("#description").val(result.data[0].description);
                    $("#sub_category_old_img").val(result.data[0].attachment);
                    $("#category option[value="+result.data[0].category_id+"]").prop('selected', true);
                    $("#status option[value="+result.data[0].status+"]").prop('selected', true);
                    setTimeout(function (){
                        $("#subcategory_id").val(subcategory_id);
                        $('.csrf_token').val(result.csrfHash);
                        $("#sub_category_model").modal('show');
                    },1000)
                }else{
                    $('.error_div').html(result.errors);
                }
            }
        });
    });



</script>