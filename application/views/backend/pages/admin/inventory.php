<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inventory</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="container mb-3">
        <div class="row">
            <div class="btn-group ml-5 mr-2 " role="group" aria-label="First group">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control " size="50" type="search" placeholder="Search" aria-label="Search">

                </div>

            </div>
            <div class="btn-group mr-2 " role="group" aria-label="forth group">
                <button type="button" class="btn btn-outline-info btn-lg" style="padding: 0px 20px;">

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill" style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                    </svg>
                    <span> Excel Upload</span>
                </button>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="forth group">
                <button type="button" class="btn btn-outline-info btn-lg" style="padding: 0px 20px;">

                    Download Format
                </button>
            </div>
            <div class="btn-group  mr-2" role="group" aria-label="forth group">
                <button type="button" class="btn btn-outline-info btn-lg" style="padding: 0px 30px;">

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill" style="margin-bottom:3px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                    </svg>
                    <span> Excel Export</span>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card mt-2">
            <div class="card-body table-responsive">

                <table id="example" class="table table-striped table-bordered mydatatable bg-light">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">MRP</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="w-15"><img src="image.png" class="img-fluid img-thumbnail" alt="icon"></th>
                        <td>Men</td>
                        <td>2020</td>
                        <td>2020</td>
                        <td>Sep 25 2020</td>
                        <td><a href=""class="ml-4" data-toggle="modal" data-target="#myMod"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- model 0n view -->

        <div class="modal fade" id="myMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Inventory Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="col">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" name="product_name">
                                </div>

                                <div class="col">
                                    <label for="product_code">Product Code</label>
                                    <input type="text" class="form-control" name="product_code">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="variant_sku">Variant SKU</label>
                                    <input type="text" class="form-control" name="variant_sku">
                                </div>

                                <div class="col">
                                    <label for="mrp">MRP</label>
                                    <input type="text" class="form-control" name="mrp">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" name="color">
                                </div>

                                <div class="col">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" name="quantity">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>


</div>