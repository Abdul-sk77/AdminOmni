<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Store Target</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="container">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="example" class="table table-striped table-bordered bg-light mydatatable" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Store ID</th>
                        <th>Agent ID</th>
                        <th>Status</th>
                        <th>Last Status Modified</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>2343</td>
                        <td>12mdw</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>Sep 25 2020 12:12:12 PM</td>
                        <td><a data-toggle="modal" data-target="#myMod" href="" class="ml-3"><i class="fa fa-eye"
                                                                                                aria-hidden="true"></i></a>
                        </td>
                    </tr>

                    </tbody>

                </table>
            </div>
        </div>
        <!-- model 0n view -->

        <div class="modal fade" id="myMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             data-target=".bs-example-modal-lg">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Agent Setting</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body table-responsive">
                            <table id="example" class="table table-bordered mydatatable" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Total Sales Values</th>
                                    <th>Total Units Sold</th>
                                    <th>Set Store Target</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>12/2/2020</td>
                                    <td>50</td>
                                    <td>60</td>

                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#myModd">Set Target
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#myModa">View
                                        </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- First model -->


        <!-- View modal -->
        <div class="modal fade" id="myModa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Agent Target</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="model-body">
                        <div class="card-body table-responsive">
                            <table id="example" class="table mydatatable table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Sales Values</th>
                                    <th scope="col">Units Sold</th>
                                    <th scope="col">Last Modified Date</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Men</td>
                                    <td>2020</td>
                                    <td>2020</td>
                                    <td>Sep 25 2020</td>
                                    <td><a data-toggle="modal" data-target="#myModd" href="" class="mr-3">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                 class="bi bi-pencil-square" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd"
                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a></td>
                                </tr>
                                </tbody>
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
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

        <div class="modal fade" id="myModd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             data-target=".bs-example-modal-lg">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Edit Agent Target</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Category Sales Value</label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Category Units Sold</label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2">
                            </div>

                        </form>

                        <button type="button" class="btn btn-primary btn-sm" style="float: right">Add</button>
                        <button type="button" class="btn btn-danger btn-sm" style="float: right; margin-right: 5px;">
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- edit store model -->


    </div>

</div>