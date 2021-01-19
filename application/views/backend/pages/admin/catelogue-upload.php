<!-- Contains all page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manual Catalogue Upload</h1>
                </div><!-- /.col -->
                <!--Excel Upload button-->
                <div class="col-sm-6">
                    <button  class="btn btn-outline-info btn-lg" style="float:right; padding: 0px 40px; margin-right:5px">

                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill" style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                        </svg>
                        <span> Excel Upload</span>
                    </button>

                </div>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- /.content-header -->
    <!-- Content Header (Page header) -->




    <!-- /.content-header -->

  

    <div class="container">
     
        <!--selection button-->
        <form style="margin: 0px 22px;"  action="<?php echo base_url("/admin/products/add-catalogue"); ?>" id="catelogue_form" name="catelogue_form" method="POST">

            <div class="form-row">
                <div class="col">
                    <label for="category">Product Category</label>
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
                    <!-- <span class="error"> <?php  echo $validation->getError('product_category'); ?></span> -->
                </div>
                <div class="col">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="<?= old('product_name');?>" >
                    <span class="error"> <?php  echo $validation->getError('product_name'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="sub_category">Product Sub Category</label>
                    <select class="form-control" id="product_sub_category" name="product_sub_category">
                        <option value="">Please choose sub category</option>
                    </select>
                    <span class="error"> <?php  echo $validation->getError('product_sub_category'); ?></span>
                </div>

                <div class="col">
                    <label for="product_qty">Product QTY</label>
                    <input type="text" class="form-control" name="product_qty"  value="<?= old('product_qty');?>">
                    <span class="error"> <?php  echo $validation->getError('product_qty'); ?></span>
                </div>

            </div>

            <div class="form-row">
                <div class="col">
                    <label for="product_line">Product Line</label>
                    <select class="form-control" id="product_line" name="product_line">
                        <option value="">Please choose product line.</option>
                    </select>
                    <span class="error"> <?php  echo $validation->getError('product_line'); ?></span>
                </div>

                <div class="col">
                    <label for="product_mrp">Product MRP</label>
                    <input type="text" class="form-control" name="product_mrp"  value="<?= old('product_mrp');?>">
                    <span class="error"> <?php  echo $validation->getError('product_mrp'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="product_sku">Product SKU</label>
                    <input type="text" class="form-control" name="product_sku"  value="<?= old('product_sku');?>">
                    <span class="error"> <?php  echo $validation->getError('product_sku'); ?></span>
                </div>
                <div class="col">
                    <label for="product_web_mrp">Selling price</label>
                    <input type="text" class="form-control" name="product_web_mrp"  value="<?= old('product_web_mrp');?>">
                    <span class="error"> <?php  echo $validation->getError('product_web_mrp'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="product_code">Product Code</label>
                    <input type="text" class="form-control" name="product_code"  value="<?= old('product_code');?>">
                    <span class="error"> <?php  echo $validation->getError('product_code'); ?></span>
                </div>
                <div class="col">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="">Select status</option>
                        <option value="1">Active</option>
                        <option value="0">In Active</option>
                    </select>
                    <span class="error"> <?php  echo $validation->getError('status'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="product_sku">Size</label>
                    <input type="text" class="form-control" name="size"  value="<?= old('size');?>">
                    <span class="error"> <?php  echo $validation->getError('size'); ?></span>
                </div>
                <div class="col">
                    <label for="product_web_mrp">Color</label>
                    <input type="text" class="form-control" name="color"  value="<?= old('color');?>">
                    <span class="error"> <?php  echo $validation->getError('color'); ?></span>
                </div>
            </div>

            <div class='hr'>
                <span class='hr-title'>Brand Info</span>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="product_sku">Brand Name</label>
                    <input type="text" class="form-control" name="brand_name"  value="<?= old('brand_name');?>">
                    <span class="error"> <?php  echo $validation->getError('brand_name'); ?></span>
                </div>
                <div class="col">
                    <label for="product_web_mrp">Brand Description</label>
                    <textarea name="brand_description" class="form-control" id="brand_description"><?= old('brand_description');?></textarea>
                    <span class="error"> <?php  echo $validation->getError('brand_description'); ?></span>
                </div>
            </div>

            <div class="form-row" style="margin-top:40px;">
                <div class="col">
                    <button type="button" class="btn btn-secondary btn-sm" style="padding: 5px 95px; float:right;">Cancel</button>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary btn-sm" style="padding: 5px 95px; float:left;">Upload</button>
                </div>

            </div>

        </form>
    </div>
    <!-- end page wrapper-container -->
</div>

<!-- end page wrapper -->
<script>
    // get subcategory based on category
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

    $(function (){
        $("#catelogue_form").validate({
            rules:{
                product_category: "required",
                product_name: "required",
                product_qty: "required",
                product_mrp: "required",
                product_sku: "required",
                product_web_mrp: "required",
                product_code: "required",
                color: "required",
                size: "required",
                brand_name: "required",
                brand_description: "required"
            },
            messages:{
                product_category:{
                  required: "product category field is required.",
                },
                product_name:{
                  required: "product name field is required.",
                },
                product_qty:{
                  required: "product qty field is required.",
                },
                product_mrp:{
                  required: "product mrp field is required.",
                },
                product_sku:{
                  required: "product sku field is required.",
                },
                product_web_mrp:{
                  required: "product web_mrp field is required.",
                },
                product_code:{
                  required: "product code field is required."
                }
            }
        })
    });
</script>