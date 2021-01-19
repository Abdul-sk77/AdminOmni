<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                    <h1 class="text-dark">Update MRP</h1>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.content-header button group -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-4 col-md-12 px-1">
                    <button type="button" class="btn btn-outline-info btn-lg"
                            style="padding: 4px 30px; float:right;margin-right:0px">
                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                             class="bi bi-file-earmark-spreadsheet-fill" style="margin-bottom:3px"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                        </svg>
                        <span>Update MRP/WebMRP Excel</span>
                    </button>
                </div>
            </div>
            <div class="msg_div"></div>
        </div>


        <!--card-->
        <div class="card mt-2">

            <div class="card-body table-responsive">
                <table id="udpate_product_mrp" class="table table-striped table-bordered bg-light"
                       style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Product SKU</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product MRP</th>
                        <th scope="col">Product Web MRP</th>
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
                        <td><?php echo ($product->product_sku != '') ? $product->product_sku : 'NA'; ?></td>
                        <td><?php echo ($product->product_name != '') ? $product->product_name : 'NA'; ?></td>
                         <td><input type="text" value="<?php echo ($product->product_mrp != '') ? $product->product_mrp : 'NA'; ?>" id="product_mrp"></td>
                         <td><input type="text" value="<?php echo ($product->product_web_mrp != '') ? $product->product_web_mrp : 'NA'; ?>" id="product_web_mrp"></td>
                        <td>
                            <a href="javascript:void(0)" data-id="<?php echo $product->id; ?>" id="update_product_price" class="btn btn-primary">Update</a>
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
            <div class="modal fade" id="myMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Add Sub Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="">
                                <form>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" class="form-control form-control-sm" id=""
                                               name="category">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <input type="text" class="form-control form-control-sm" id=""
                                               name="sub-category">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Line</label>
                                        <input type="text" class="form-control form-control-sm" id=""
                                               name="Product_Line">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" class="form-control form-control-sm" id=""
                                               name="Description">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Total Units Sold</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder=""
                                                   aria-describedby="basic-addon2" name="t_unit_sold">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary btn" id="basic-addon2">Upload Image</span>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <button type="button" class="btn  btn-secondary btn-lg" style="float: right">Close
                            </button>
                            <button type="button" class="btn btn-primary btn-lg"
                                    style="float: right; margin-right: 5px;">Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--div container end-->
    </section>

</div>

<script>
    $("#udpate_product_mrp").dataTable();
    $(document).on("click","#update_product_price",function (e){
        e.preventDefault();
        var product_id = $(this).data("id");
        var product_mrp = $("#product_mrp").val();
        var product_web_mrp = $("#product_web_mrp").val();
        var csrfName = $('.csrf_token').attr('name'); // Value specified in $config['csrf_token_name']
        var csrfHash = $('.csrf_token').val(); // CSRF hash
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('/admin/product/update-product-price'); ?>",
            data: { product_id: product_id,product_mrp:product_mrp,product_web_mrp:product_web_mrp ,[csrfName]: csrfHash  },
            dataType: 'json',
            cache: false,
            success: function (response) {
                var result = response; // JSON.parse(response);
                if(result.status){
                    $(".csrf_token").val(result.token);
                    $(".msg_div").html("<div class='alert alert-success'>"+result.msg+"</div>");
                }else{
                    $('.msg_div').html(result.msg);
                }

                setTimeout(function (){
                    $('.msg_div').html("");
                    location.reload();
                },1500);
            }
        });
    });
</script>