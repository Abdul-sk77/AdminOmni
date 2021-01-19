<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Products</h1>
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
            <div class="container mb-3">
                <div class="row">

                    <div class="btn-group px-2 ml-auto" role="group" aria-label="forth group">
                        <button type="button" class="btn btn-outline-info btn-lg"
                                style="padding: 0px 70px; float:right;">

                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                 class="bi bi-file-earmark-spreadsheet-fill" style="margin-bottom:3px"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                            </svg>
                            <span> Excel </span>
                        </button>
                    </div>

                </div>
            </div>


            <!--card-->
            <div class="card mt-2">

                <div class="card-body table-responsive">


                    <table id="products_table" class="table table-striped table-bordered bg-light"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Sub-Category</th>
                            <th scope="col">Product Line</th>
                            <th scope="col">MRP</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if (isset($products)) {
                            $i = 1;
                            foreach ($products as $product) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo ($product->product_code != '') ? $product->product_code : 'NA'; ?></td>
                                    <td><?php echo ($product->product_name != '') ? $product->product_name : 'NA'; ?></td>
                                    <td><?php echo ($product->category_name != '') ? $product->category_name : 'NA'; ?></td>
                                    <td><?php echo ($product->sub_category_name != '') ? $product->sub_category_name : 'NA'; ?></td>
                                    <td><?php echo ($product->productline != '') ? $product->productline : 'NA'; ?></td>
                                    <td>
                                        ₹<?php echo ($product->product_mrp != '') ? $product->product_mrp : 'NA'; ?></td>


                                    <td><?php echo ($product->status == 1) ? "Active" : 'Inactive'; ?></td>
                                    <td>
                                        <a class="" id="product_edit" data-id="<?php echo $product->id; ?>">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                 class="bi bi-pencil-square bg-primary" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd"
                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0)"  data-id = "<?php echo $product->id; ?>" id="product_view" class="ml-2">
                                            <i class="fa fa-eye text-primary" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        ?>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!--card end-->
    </section>
</div>

<!-- view product  -->
<div class="modal fade" id="product_view_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Products</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="error_div"></div>
                <div class="tab-content ">
                    <div class="tab-pane active" id="pills-profile">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_code">Product Code</label>
                                    <span id="view_product_code"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product_name">Product Name</label>
                                    <span id="view_product_name"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_sku">Variant SKU</label>
                                    <span id="view_product_sku"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status"
                                           style="text-align: center">Status</label>
                                    <span id="view_status"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_category">Product Category</label>
                                    <span id="view_product_category"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product_mrp">MRP</label>
                                    <span id="view_product_mrp"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_sub_category">Product Sub Category</label>
                                    <span id="view_product_sub_category"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="size">Size</label>
                                    <span id="view_size"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_line">Product Line</label>
                                    <span id="view_product_line"></span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="color">Color</label>
                                    <span id="view_color"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="discount_price">Discounted
                                        Price</label>
                                    <span id="view_discount_price"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product_qty">Product QTY</label>
                                    <span id="view_product_qty"></span>
                                </div>

                            </div>
                            <div class='hr'>
                                <span class='hr-title'>Brand Info</span>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="brand_name">Brand Name</label>
                                    <span id="view_brand_name"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="brand_description">Brand Description</label>
                                    <span id="view_brand_description"></span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- view product  -->


<!-- update product   -->
<div class="modal fade" id="product_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Products</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="error_div"></div>
                <div class="tab-content ">
                    <div class="tab-pane active" id="pills-profile">
                        <form id="update_product_form" name="update_product_form" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_code">Product Code</label>
                                    <input name="product_id" id="product_id" type="hidden">
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           id="product_code"
                                           name="product_code">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product_name">Product Name</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           id="product_name"
                                           name="product_name">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_sku">Variant SKU</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           id="product_sku"
                                           name="product_sku">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status"
                                           style="text-align: center">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select status</option>
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="product_category">Product Category</label>
                                    <select class="form-control" id="product_category" name="product_category">
                                        <option value="">Please choose category </option>
                                        <?php
                                        if(isset($categories) && count($categories) > 0){
                                            foreach($categories as $category){
                                                echo "<option value='".$category->id."'>$category->category_name</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="product_mrp">MRP</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           id="product_mrp" name="product_mrp">
                                </div>
                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="product_sub_category">Product Sub Category</label>
                                    <select class="form-control" id="product_sub_category" name="product_sub_category">
                                        <option value="">Please choose sub category</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="size">Size</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           id="size"
                                           name="size">
                                </div>


                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_line">Product Line</label>
                                    <select class="form-control" id="product_line" name="product_line">
                                        <option value="">Please choose product line.</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="color">Color</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           id="color"
                                           name="color">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="discount_price">Discounted
                                        Price</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           id="discount_price"
                                           name="discount_price">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product_qty">Product QTY</label>
                                    <input type="text"
                                           class="form-control  form-control-sm"
                                           id="product_qty"
                                           name="product_qty">


                                </div>

                            </div>
                            <div class='hr'>
                                <span class='hr-title'>Brand Info</span>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="brand_name">Brand Name</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           id="brand_name" name="brand_name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="brand_description">Brand Description</label>
                                    <textarea name="brand_description" class="form-control" id="brand_description"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="submit" value="Update" name="update" id="update_product_form_btn" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--udpate-->


<script>
    $("#products_table").DataTable();


    // view product with modal
        $(document).on("click",'#product_view',function (e){
            e.preventDefault();
            var product_id = $(this).data('id');
            var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
            var csrfHash = $('.csrf_token').val(); // CSRF hash

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/admin/products/get-product-data'); ?>"+"/"+product_id,
                data: { product_id: product_id, [csrfName]: csrfHash  },
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    var result = response;
                    if(result.status){
                        $(".csrf_token").text(result.token);
                        $("#view_category").text(result.data.category_name);
                        $("#view_product_code").text(result.data.product_code);
                        $("#view_product_name").text(result.data.product_name);
                        $("#view_product_sku").text(result.data.product_sku);
                        $("#view_product_mrp").text(result.data.product_mrp);
                        $("#view_size").text(result.data.size);
                        $("#view_color").text(result.data.color);
                        $("#view_discount_price").text(result.data.product_web_mrp);
                        $("#view_product_qty").text(result.data.product_qty);
                        $("#view_brand_name").text(result.data.brand_name);
                        $("#view_brand_description").text(result.data.brand_description);
                        $("#view_status").text((result.data.brand_description ==1)?'Active':'Inactive');
                        $("#view_product_category").text(result.data.category_name);
                        $("#view_product_sub_category").text(result.data.sub_category_name);
                        $("#view_product_line").text(result.data.productline);
                        setTimeout(function (){
                            $('.csrf_token').val(result.csrfHash);
                            $("#product_view_modal").modal('show');
                        },1000)
                    }else{
                        $('.error_div').html(result.errors);
                    }
                }
            });

        });
    // view product with modal


    // update product with modal
    $(document).on("click",'#product_edit',function (e){
        e.preventDefault();

        var validator = $("#update_product_form").validate();
        validator.resetForm();
        $(".errors").hide();

        var product_id = $(this).data('id');

        var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
        var csrfHash = $('.csrf_token').val(); // CSRF hash

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/admin/products/get-product-data'); ?>"+"/"+product_id,
            data: { product_id: product_id, [csrfName]: csrfHash  },
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                var result = response;

                // JSON.parse(response);
                if(result.status){
                    $(".csrf_token").val(result.token);
                    $("#category").val(result.data.category_name);
                    $("#product_code").val(result.data.product_code);
                    $("#product_name").val(result.data.product_name);
                    $("#product_sku").val(result.data.product_sku);
                    $("#product_mrp").val(result.data.product_mrp);
                    $("#size").val(result.data.size);
                    $("#color").val(result.data.color);
                    $("#discount_price").val(result.data.product_web_mrp);
                    $("#product_qty").val(result.data.product_qty);
                    $("#brand_name").val(result.data.brand_name);
                    $("#brand_description").val(result.data.brand_description);
                    $("#status option[value="+result.data.status+"]").prop('selected', true);
                    $("#product_category option[value="+result.data.product_category_id+"]").prop('selected', true);
                    $("#product_category").trigger('change');
                    setTimeout(function (){
                        $("#product_sub_category option[value="+result.data.product_sub_category_id+"]").prop('selected', true);
                        $("#product_sub_category").trigger('change');
                    },150);
                    setTimeout(function(){
                        $("#product_line option[value="+result.data.product_line_id+"]").prop('selected', true);
                    },250)
                    setTimeout(function (){
                        $("#product_id").val(result.data.id);
                        $('.csrf_token').val(result.csrfHash);
                        $("#product_modal").modal('show');
                    },1000)

                }else{
                    $('.error_div').html(result.errors);
                }
            }
        });

    });


    $(document).on("change","#product_category",function (e){
        e.preventDefault();
        $("#product_line").html("");
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
                if(result.status){
                    $(".csrf_token").val(result.token);
                    $("#product_sub_category").html(result.data);
                }else{
                    $('.error_div').html("something went wrong");
                }
            }
        });
    });

    $(document).on("change","#product_sub_category",function (e){
        e.preventDefault();
        $("#product_line").html("");
        var category_id = $("#product_category").val();
        var subcat_id = $(this).val();
        var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
        var csrfHash = $('.csrf_token').val(); // CSRF hash
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/admin/products/get-productline'); ?>",
            data: { category_id: category_id, subcat_id:subcat_id , [csrfName]: csrfHash  },
            dataType: 'json',
            cache: false,
            success: function (response) {
                var result = response; // JSON.parse(response);
                if(result.status){
                    $(".csrf_token").val(result.token);
                    $("#product_line").html(result.data);

                }else{
                    $('.error_div').html("something went wrong");
                }
            }
        });
    });

    $("#update_product_form").validate({
        rules:{
            product_code: "required",
            product_name: "required",
            product_sku: "required",
            product_category: "required",
            product_qty: "required",
            product_mrp: "required",
            color: "required",
            size: "required",
            discount_price: "required",
            brand_name: "required",
            brand_description: "required",
            status: "required",
        },
        messages:{
            product_code:{
                required: "product code field is required."
            },
            product_name:{
                required: "product name field is required.",
            },
            product_sku:{
                required: "product sku field is required.",
            },
            product_category:{
                required: "product category field is required.",
            },
            product_qty:{
                required: "product qty field is required.",
            },
            product_mrp:{
                required: "product mrp field is required.",
            },
            discount_price:{
                required: "product discout field is required.",
            },
            status:{
                required: "product status is required.",
            },
        },
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/admin/products/update-product'); ?>",
                data:  new FormData($('#update_product_form')[0]),
                mimeType: "multipart/form-data",
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    // console.log(response);
                    var result = JSON.parse(response);
                    if(result.status){
                        $('.error_div').html("<div class='alert alert-success'>"+result.msg+"</div>");
                        // $("#productlin_form")[0].reset();
                        setTimeout(function (){
                            $(".error_div").html("");
                            location.reload();
                        },1500)
                    }else{
                        $('.error_div').html(result.msg);
                    }
                }
            });
            return false; // required to block normal submit since you used ajax
        }
    })

</script>