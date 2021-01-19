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

.container, .container-lg, .container-md, .container-sm, .container-xl {
    /* max-width: 1100px; */
}

</style>
<div class="content-wrapper" style="zoom:90%">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Store Target Setting</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="container">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="target_setting_table" class="table table-striped table-bordered  bg-light">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Store ID</th>
                        <th scope="col">Store Manager ID</th>
                        <th scope="col">Store Manager Name </th>
                        <th scope="col">Status</th>
                        <th scope="col">Last Status Modified</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                   
                </table>

            </div>
        </div>

        <!-- model 0n view -->

        <div class="modal fade" id="myMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="zoom:90%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Store Target Setting</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-primary btn-sm" style="float: right">Excel Upload</button>
                        <button type="button" class="btn btn-secondary btn-sm" id ="target_set_modal_button" style="float: right; margin-right: 5px;">Set Store Target</button>

                        <div class="card-body table-responsive">
                            <table  id="sub_target_table" class="table table-border" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Total Sales Values</th>
                                    <th>Total Units Sold</th>
                                    <th>Set Target</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- First model -->

        <!-- set store target modal -->   
                 
        <div class="modal fade" id="target_set_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="zoom:90%;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Store Target</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div id="target_error_div" class="target_error_div"></div>
                        <form name="set_target_setting_form" id="set_target_setting_form" method="post" action="#" >
                            <div class="form-group">
                                <label for="Target_Date">Target Date</label>
                                <input type="date" class="form-control form-control-sm " id="Target_Date" required>
                                <input type="hidden" id="store_target_id" >
                            </div>
                            <div class="form-group">
                                <label for="Total_Sales_Value">Total Sales Value</label>
                                <input type="text" class="form-control form-control-sm" id="Total_Sales_Value" required>
                            </div>
                            <div class="form-group">
                                <label for="Total_Units_Sold">Total Units Sold</label>
                                <input type="text" class="form-control form-control-sm" id="Total_Units_Sold" required>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- set store target modal -->


        <!-- View modal -->
        <div class="modal fade" id="Category_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg">
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

        <!-- edit store model -->

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
        <!-- edit store model -->
        <!-- start Delete  Modal -->
<div id="deleteModalCat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="height:220px;width:100%;margin-left:40px;zoom:90%;">
      <div class="modal-header">
          <h3>Delete</h3>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Set Target Category ?</p>
      </div>
      <div class="modal-footer">
        <button class="btn" style="height: 3.25rem;"data-dismiss="modal" aria-hidden="true">No</button>
        <button class="btn btn-primary" style="height: 3.25rem;" id ="deleteButton">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Delete Modal -->



    </div>

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

        var validator =$('#set_target_setting_form').validate();
        validator.resetForm();
        var validatorReset =$('#cat_add_form').validate();
        validatorReset.resetForm();
        $(".error_div").html('');
        $('.cat_error_div').html('');
})
    $('#target_set_modal_button').on('click', function(e){
        $('#target_set_modal').modal("show");
    });
    $('#sub_target_table').on('click', 'a.view_categaory', function(e) {
        e.preventDefault();
      
        const tableStore = $('#sub_target_table').DataTable();
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
            // "ordering":false,
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
          $('#deleteModalCat').modal('show');
          $("#deleteButton").unbind('click');
          $('#deleteButton').on('click', function(e) {
              $('#deleteModalCat').modal('hide');
              $.ajax({
                url:  "<?php echo base_url('index.php/admin/category/target-setting-category-delete'); ?>",
                data: "id="+row_id,
                type: "POST",
                dataType: "JSON",
                cache: false,
                success: function(response)
                {
                  alert("Deleted successfully!");
                  $('#catTable').DataTable().draw();
                }
              });
          });
    });
    $('#sub_target_table').on('click', 'a.set_target_category', function (e) {
            e.preventDefault();
            const tableStore = $('#sub_target_table').DataTable();
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
        } );
         
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
    var targetTable = $("#target_setting_table").DataTable({
          "bLengthChange": true,
          "bPaginate": true,
          "bInfo": true,
          "autoWidth": false,
          'processing': true,
          "serverSide": true,
        //   "ordering":false,
        "order": [[ 0, "desc" ]],
          'language': {
                // 'loadingRecords': '&nbsp;',
                'processing': '<img src="<?php echo base_url(); ?>/public/assets/img/loading1.gif">'
            },
        ajax:{
            url:  "<?php echo base_url('index.php/admin/store/get-store-manager-griddata'); ?>",
            type: "POST",
        },
        aoColumns: [
            { mData: 'id',width:"5%" },
            { mData: 'store_id',width:"10%" },
            { mData: 'store_manager_id',width:"20%" },
            { mData: 'managername',width:"20%" },
            { data: 'status',  "render" : function(data)
            {
                if (data == "1") {
                return '<center> <a class="switch toggleOff"><input type="checkbox" checked disabled><span class="slider round"></span></a></center>'
                }else{
                return '<center> <a class="switch toggleOn"><input type="checkbox" disabled><span class="slider round"></span></a></center>'
                }
                },
            }, { mData: 'updated_at',width:"20%" },
            {   
                orderable:false,
                data: null,
                className: "center",
                defaultContent: '<center><a href="" class="fas fa-eye  view_target_setting" ></a></center>'
            }
        ],

        });
        $('#target_setting_table').on('click', 'a.view_target_setting', function(e) {
            e.preventDefault();
           const tableStore = $('#target_setting_table').DataTable();
			const tr=  $(this).parents('tr');
            const row_id = tableStore.row( tr ).data().id;
            $('#store_target_id').val(row_id);
            $('#sub_target_table').DataTable({
                "bLengthChange": true,
                "destroy": true,
                "bPaginate": true,
                "bInfo": true,
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                "searching": false,
                "order": [[ 0, "desc" ]],
                // "ordering":false,
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
    $('#myMod').modal('show');
        });
        $("#set_target_setting_form").validate({
            rules:{
                Target_Date:{
                     required:true,
                 },
                 Total_Sales_Value:{
                     required:true,
                 },
                 Total_Units_Sold:{
                     required:true,
                 }
            },
            messages:{
                Target_Date:{
                    required:"Target Date  required.",
                },
                Total_Sales_Value:{
                    required:"Total Sales Value required.",
                },
                Total_Units_Sold:{
                    required:"Total Units Sold required.",
                }  
            },
            submitHandler: function (form){
               var store_id = $('#store_target_id').val();
               var target_date =$('#Target_Date').val();
               var Total_Sales_Value =$('#Total_Sales_Value').val();
               var Total_Units_Sold =$('#Total_Units_Sold').val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('index.php/admin/store/store-manager-set-target-setting'); ?>",
                        data:  
                        {
                            store_id:store_id,
                            target_date:target_date,
                            Total_Sales_Value:Total_Sales_Value,
                            Total_Units_Sold:Total_Units_Sold
                        },
                        dataType: "json",
                        cache: false,
                        success: function (response) {
                            if(response.status){
                                $('.target_error_div').html("<div class='alert alert-success'>Successfully inserted.</div>");
                                $("#set_target_setting_form")[0].reset();
                                setTimeout(function (){
                                    $(".target_error_div").html("");
                                    $("#target_set_modal").modal("toggle");
                                    $('#sub_target_table').DataTable().draw();
                                },2500)

                            }else{
                                $('.target_error_div').html(response.errors);
                            }
                        }
                    });
                }
            });

</script>