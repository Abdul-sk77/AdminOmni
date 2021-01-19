<style>
    .error{
        color: red;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product Line</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.content-header button group -->
    <section class="content">
        <div class="container-fluid">
            <!--search box and button-->
            <div class="row">
                <div class="btn-group ml-2 mr-1" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-info btn-lg" id="productline_btn" style="padding: 0px 85px; float:right;">Add
                    </button>

                </div>
                <div class="btn-group mr-2 px-2" role="group" aria-label="forth group">
                    <button type="button" class="btn btn-outline-info btn-lg" style="padding: 0px 70px; float:right;">

                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill"
                             style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                        </svg>
                        <span> Excel </span>
                    </button>
                </div>
            </div>

            <!--card-->
            <div class="card mt-2">
                <div class="card-body table-responsive">
                    <table id="productline_tbl" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product Line</th>
                            <th scope="col">Category</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col">Attachment</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(isset($productlines) && count($productlines) > 0){
                                foreach($productlines as $productline){
                                    ?>
                                    <tr>
                                        <th scope="row"><img height="100px" width="100px" src="<?php echo base_url("public/uploads/productline/")."/".$productline->attachment; ?>" alt="..." class="img-thumbnail"></th>
                                        <td><?php echo $productline->productline; ?></td>
                                        <td><?php echo $productline->category_id; ?></td>
                                        <td><?php echo $productline->sub_category_id; ?></td>
                                        <td><?php echo $productline->attachment; ?></td>
                                        <td><?php echo ($productline->status == 1)?"Active":"Inactive"; ?></td>
                                        <td><a href="" id="update_productline" data-id="<?php echo $productline->id; ?>" class="ml-3 update_productline">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                     class="bi bi-pencil-square bg-primary" fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd"
                                                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </a>
                                            <a  onclick="return confirm('Are you sure want to delete.?')" href="<?php echo base_url('/admin/products/product-line/delete/'.$productline->id); ?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                        ?>

                        </tbody>
                    </table>
                    <!--card body end-->
                </div>
                <!--modal start Add sub category-->
                <div class="modal fade" id="productline_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Add Sub Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="">
                                    <div class="error_div"></div>
                                    <form id="productlin_form" name="productlin_form" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Product Line</label>
                                            <input type="hidden" name="productline_old_img" id="productline_old_img">
                                            <input type="hidden" name="productline_id" id="productline_id">
                                            <input type="text" class="form-control form-control-sm" id="product_line" name="product_line">
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
                                            <label>Sub Category</label>
                                            <select name="sub_category" id="sub_category" class="form-control form-control-sm">
                                                <option value="">Select Sub Category</option>
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
                                            <label for="">Total Units Sold</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" placeholder=""
                                                       aria-describedby="basic-addon2" name="productline_img" id="productline_img">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-primary btn" id="basic-addon2">Upload Image</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" id="btnSaveIt">Save</button>
                                            <button type="button" class="btn btn-default" id="btnCloseIt" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--modal end-->
                </div>
                <!--card end-->
            </div>
            <!--conatiner-fluid-->
        </div>
    </section>
    <!--div container end-->
</div>


<script>
    $(document).ready(function() {
        $('#productline_tbl ').DataTable();
    });

    // get subcategory based on category
    $(document).on("change","#category",function (e){
        e.preventDefault();
        var category_id = $(this).val();
        var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
        var csrfHash = $('.csrf_token').val(); // CSRF hash
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/admin/category/get-subcategory'); ?>",
            data: { category_id: category_id, [csrfName]: csrfHash  },
            dataType: 'json',
            cache: false,
            success: function (response) {
                var result = response; // JSON.parse(response);
                console.log(result);
                if(result.status){
                    $(".csrf_token").val(result.token);
                    $("#sub_category").html(result.data);

                }else{
                    $('.error_div').html("something went wrong");
                }
            }
        });
    });

    $(function() {
        $("#productlin_form").validate({
            ignore: ":hidden",
            rules: {
                category: {
                    required: true
                },
                sub_category: "required",
                product_line: "required",
                description: "required",
                status: "required"
            },
            messages: {
                category: {
                    required: "Please select category.",
                },
                sub_category: "Please select sub category.",
                product_line: "Please enter product line.",
                status: "Please select status."
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/admin/products/add-product-line'); ?>",
                    data:  new FormData($('#productlin_form')[0]),
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {
                        // console.log(response);
                        var result = JSON.parse(response);
                        if(result.status){
                            $('.error_div').html("<div class='alert alert-success'>Successfully inserted.</div>");
                            $("#productlin_form")[0].reset();
                            setTimeout(function (){
                                $(".error_div").html("");
                                location.reload();
                            },2500);
                        }else{
                            $('.error_div').html(result.errors);
                        }
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });
    });

    $("#productline_btn").click(function (){
        var validator = $("#productlin_form").validate();
        validator.resetForm();
        $("#productlin_form")[0].reset();
        $(".errors").hide();
        $("#productline_modal").modal('show');
    })

    $(".update_productline").click(function(e){
        e.preventDefault();
        var productline_id = $(this).data('id');
        var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
        var csrfHash = $('.csrf_token').val(); // CSRF hash
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/admin/category/get-productline-data'); ?>"+"/"+productline_id,
            data: { productline_id: productline_id, [csrfName]: csrfHash  },
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                var result = response; // JSON.parse(response);
                if(result.status){
                    $(".csrf_token").val(result.token);
                    $("#product_line").val(result.data[0].productline);
                    $("#description").val(result.data[0].description);
                    $("#productline_old_img").val(result.data[0].attachment);
                    $("#category option[value="+result.data[0].category_id+"]").prop('selected', true);
                    $("#status option[value="+result.data[0].status+"]").prop('selected', true);
                    $("#category").trigger("change");
                    setTimeout(function (){
                        $("#sub_category option[value="+result.data[0].sub_category_id+"]").prop('selected', true);
                        $("#productline_id").val(productline_id);
                        $('.csrf_token').val(result.csrfHash);
                        $("#productline_modal").modal('show');
                    },2000)
                }else{
                    $('.error_div').html(result.errors);
                }
            }
        });
    });
</script>