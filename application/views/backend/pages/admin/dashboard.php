
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="zoom:90%">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Dashboard</h3>
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- section Main content -->
    <section class="content">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <select multiple data-style="bg-whitesmoke px-3" class="selectpicker w-99" title="Select Store id*" id="storeIDFilter">
                            <?php
                        if (isset($store_id) && count($store_id) > 0) {
                            foreach ($store_id as $store_id) {
                                 echo "<option value='" . $store_id->store_id. "'>".$store_id->store_id."</option>";
								
                            }
                        }
                    ?>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <select  data-style="bg-whitesmoke px-3" class="selectpicker w-99" title="Select FY*" id=yearFilter>
                    <option  value =" ">Select FY*</option>
                    <option  value ="2021">2021</option>
                    <option  value ="2020">2020</option>
                    <option value ="2019">2019</option>
                    <option value ="2018">2018</option>
                    <option value ="2017">2017</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <select multiple data-style="bg-whitesmoke-info px-3" class="selectpicker w-99"
                            title="Select Month" style="height: 30px" id="monthFilter">
                            <option  value =" ">Select Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                    </select>
                </div>
                
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <button type="button" class="btn btn-outline-info btn-lg" onclick="submitFilter()"
                            style="text-align: center; font-size:18px; padding: 3px 84px">Submit
                    </button>
                </div>
            </div>
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box"><span class="info-box-icon bg-info elevation-1">₹</span>
                        <div class="info-box-content"> <span class="info-box-text">Sales
                            (FTM, in 000s)
                            </span>
                            <span class="info-box-number" id="FTMSale" value="">
                            <!-- <small>%</small> -->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"><span class="info-box-icon bg-danger elevation-1">₹</span>
                        <div class="info-box-content"> <span class="info-box-text">Last Day's Sales
                            (in 000s)</span>
                            <span class="info-box-number" id="lastDaySale" value="" ></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1">
                                <svg width="1em"
                                     height="1em"
                                     viewBox="0 0 16 16"
                                     class="bi bi-graph-up"
                                     fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h1v16H0V0zm1 15h15v1H1v-1z"/>
                                    <path fill-rule="evenodd"
                                          d="M14.39 4.312L10.041 9.75 7 6.707l-3.646 3.647-.708-.708L7 5.293 9.959 8.25l3.65-4.563.781.624z"/>
                                    <path fill-rule="evenodd"
                                          d="M10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4h-3.5a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </span>
                        <div class="info-box-content"> <span class="info-box-text">Growth in ASP<br>(over last month)</span>
                            <span class="info-box-number">0</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"><span class="info-box-icon bg-warning elevation-1"><i
                                    class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content"><span class="info-box-text">Total Units Sold</span>
                            <span class="info-box-number">0</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Monthly Recap Report: Sale</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <p class="text-center"><strong value="Sales: 1 Jan, 2014 - 30 December, 2014"></strong> -->
                                    <!-- </p> -->
                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart1" height="180" width="200" style="height:338px;width:1200px"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <!-- <div class="col-md-4"> -->
                                    <!-- <p class="text-center"><strong>Sale Analysis</strong>
                                    </p> -->
                                    <!-- <div class="progress-group">Women <span
                                                class="float-right"><b>160</b>/200</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                        </div>
                                    </div> -->
                                    <!-- /.progress-group -->
                                    <!-- <div class="progress-group">Beauty <span
                                                class="float-right"><b>310</b>/400</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                                        </div>
                                    </div> -->
                                    <!-- /.progress-group -->
                                    <!-- <div class="progress-group"><span class="progress-text">Decor & Gift</span>
                                        <span class="float-right"><b>480</b>/800</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 60%"></div>
                                        </div>
                                    </div> -->
                                    <!-- /.progress-group -->
                                    <!-- <div class="progress-group">Men <span class="float-right"><b>250</b>/500</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-secondary" style="width: 50%"></div>
                                        </div>
                                    </div> -->
                                    <!-- /.progress-group -->
                                    <!-- /.progress-group -->
                                    <!-- <div class="progress-group">Furniture <span
                                                class="float-right"><b>250</b>/500</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-dark" style="width: 50%"></div>
                                        </div>
                                    </div> -->
                                    <!-- /.progress-group -->
                                    <!-- /.progress-group -->
                                    <!-- <div class="progress-group">Kids <span class="float-right"><b>250</b>/500</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-info" style="width: 50%"></div>
                                        </div>
                                    </div> -->
                                    <!-- /.progress-group -->
                                    <!-- /.progress-group -->
                                    <!-- <div class="progress-group">Home Linen <span class="float-right"><b>250</b>/500</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar "
                                                 style="width: 50%;background-color:HotPink;	"></div>
                                        </div>
                                    </div> -->
                                    <!-- /.progress-group -->
                                    <!-- /.progress-group -->
                                    <!-- <div class="progress-group">Food <span class="float-right"><b>250</b>/500</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar "
                                                 style="width: 50%; background-color: coral;"></div>
                                        </div>
                                    </div> -->
                                    <!-- /.progress-group -->
                                <!-- </div> -->
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                      
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
             <!-- /.row -->
             <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Sale Analysis</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- <div class="row">
                            <svg height="30" width="20">
                                <circle cx="8" cy="8" r="8" stroke="res" stroke-width="3" fill="rgb(240 18 190)"/><span style="margin-top: -3px;">Women</span>
                            </svg> 
                            <svg height="30" width="20" style="margin-left:20px">
                                <circle cx="8" cy="8" r="8" stroke="res" stroke-width="3" fill="#007bff"/><span style="margin-top: -3px;">Men</span>
                            </svg> 
                            <svg height="30" width="20" style="margin-left:20px">
                                <circle cx="8" cy="8" r="8" stroke="res" stroke-width="3" fill="#6f42c1"/><span style="margin-top: -3px;">Beauty</span>
                            </svg> 
                            <svg height="30" width="20" style="margin-left:20px">
                                <circle cx="8" cy="8" r="8" stroke="res" stroke-width="3" fill="#17a2b8"/><span style="margin-top: -3px;">Decor & Gifts</span>
                            </svg> 
                            <svg height="30" width="20" style="margin-left:20px">
                                <circle cx="8" cy="8" r="8" stroke="res" stroke-width="3" fill="#28a745"/><span style="margin-top: -3px;">Furniture</span>
                            </svg> 
                            <svg height="30" width="20" style="margin-left:20px">
                                <circle cx="8" cy="8" r="8" stroke="res" stroke-width="3" fill="#dc3545"/><span style="margin-top: -3px;">Kid</span>
                            </svg> 
                            <svg height="30" width="20" style="margin-left:20px">
                                <circle cx="8" cy="8" r="8" stroke="res" stroke-width="3" fill="#fd7e14"/><span style="margin-top: -3px;">Home Linen</span>
                            </svg> 
                            <svg height="30" width="20" style="margin-left:20px">
                                <circle cx="8" cy="8" r="8" stroke="res" stroke-width="3" fill="#ffc107"/><span style="margin-top: -3px;">Food</span>
                            </svg> 
                            </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesAnalysis" height="180" width="200" style="height:338px;width:1200px"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                      
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-5 col-5">
                    <div class="description-block border-right">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h5 class="card-title">Key Metrics</h5>
                                </div>
                                <table id="example" class="table table-striped table-bordered  bg-light"
                                       style="width:100%">
                                    <thead class="ml-auto">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">TM</th>
                                        <th scope="col">LM</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Units Per Transaction</td>
                                        <td> <span  id="UPT_TM" value="" ></span></td>
                                        <td><span  id="UPT_LM" value="" ></span></td>
                                    </tr>
                                    <tr>
                                        <td>Avg Transaction Value(ATV)</td>
                                        <td> <span  id="ATV_TM" value="" ></span></td>
                                        <td><span  id="ATV_LM" value="" ></span></td>
                                    </tr>
                                    <tr>
                                        <td>Cart Value Growth</td>
                                        <td> <span  id="CVG_TM" value="" ></span></td>
                                        <td><span  id="CVG_LM" value="" ></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--card body end-->
                            </div>
                            <!--card end-->
                        </div>
                        <!--description-block end-->
                    </div>
                </div>
                <!-- /.row end -->
            </div>

        </div>
        <!--card end-->
</div>
<!-- ./wrapper content-->
<script>
$(document).ready(function (w) {
    var current_year = new Date().getFullYear();
    $('#yearFilter').val(current_year);
    dashboardCal("",current_year,"");
    // var canvasData = document.getElementById("myCanvas");
});
 
function submitFilter(){
    var store_id_filter = $('#storeIDFilter').val();
    var year_filter = $('#yearFilter').val();
    var month_filter = $('#monthFilter').val();
    if(store_id_filter == ""){
        alert("Please Select at least one store id, it is mandatory!");
    }else{
        if(year_filter == "Select FY*"){
            alert("Please Select financial year , it is mandatory!");
        }
    }
    if(store_id_filter != "" && year_filter != "Select FY*"){
        dashboardCal(store_id_filter,year_filter,month_filter);
    } 
}
function dashboardCal(store_id_filter,year_filter,month_filter){
    $.ajax({
        url:"<?php echo base_url('index.php/admin/dashboard/get-dashboard-caldata'); ?>",
        data: { 
            store_id_filter:store_id_filter,
            year_filter:year_filter,
            month_filter:month_filter,
        },
        type: "POST",
        dataType: "JSON",
        cache: false,
        success: function(response)
        {
            $('#lastDaySale').text("₹"+response.last_day_sale);
            $('#FTMSale').text("₹"+response.ftp_current_month_of_last_date);
            $('#UPT_TM').text(response.utp_TM);
            $('#UPT_LM').text(response.utp_LM);
            $('#ATV_TM').text(response.atv_TM);
            $('#ATV_LM').text(response.atv_LM);
            $('#CVG_TM').text(response.cvg_TM);
            $('#CVG_LM').text(response.cvg_LM);
            var salesChartCanvas = $('#salesChart1').get(0).getContext('2d')
            var salesChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
                datasets: [{
                    label: 'Sale',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data:response.chart_data
                    }]
            }
            var salesChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                    gridLines: {
                        display: false
                    }
                    }],
                    yAxes: [{
                    gridLines: {
                        display: false
                    }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            // eslint-disable-next-line no-unused-vars
            var salesChart1 = new Chart(salesChartCanvas, {
                type: 'line',
                data: salesChartData,
                options: salesChartOptions
            })

        var salesAnalysisCanvas = $('#salesAnalysis').get(0).getContext('2d')
            var salesAnalysisData = {
                // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
                labels: ['Women', 'Beauty', 'Decor & Gifts', 'Men', 'Furniture', 'Kid', 'Home Linen','Food'],
                datasets: [{
                    label: 'Monthly Sale',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data:[60,10,50,60,70,80,90,90]
                    },
                    // {
                    // label: 'Beauty',
                    // backgroundColor: '#6f42c1',
                    // borderColor: '#6f42c1',
                    // pointRadius: false,
                    // pointColor: '#6f42c1',
                    // pointStrokeColor: '#6f42c1',
                    // pointHighlightFill: '#6f42c1',
                    // pointHighlightStroke: '#6f42c1',
                    // data:[90,70,0,0,0,0,0,0,0,70,0,0]
                    // },
                    // {
                    // label: 'Decor & Gifts',
                    // backgroundColor: '#17a2b8',
                    // borderColor: '#17a2b8',
                    // pointRadius: false,
                    // pointColor: '#17a2b8',
                    // pointStrokeColor: '#17a2b8',
                    // pointHighlightFill: '#17a2b8',
                    // pointHighlightStroke: '#17a2b8',
                    // data:[70,80,60,0,0,0,0,50,0,0,0,0]
                    // },
                    // {
                    // label: 'Men',
                    // backgroundColor: '#007bff',
                    // borderColor: '#007bff',
                    // pointRadius: false,
                    // pointColor: '#007bff',
                    // pointStrokeColor: '#007bff',
                    // pointHighlightFill: '#007bff',
                    // pointHighlightStroke: '#007bff',
                    // data:[50,60,0,80,80,0,0,0,0,0,0,0]
                    // },
                    // {
                    // label: 'Furniture',
                    // backgroundColor: '#28a745',
                    // borderColor: '#28a745',
                    // pointRadius: false,
                    // pointColor: '#28a745',
                    // pointStrokeColor: '#28a745',
                    // pointHighlightFill: '#28a745',
                    // pointHighlightStroke: '#28a745',
                    // data:[40,50,0,0,0,60,0,0,0,0,0,0]
                    // },
                    // {
                    // label: 'kid',
                    // backgroundColor: '#dc3545',
                    // borderColor: '#dc3545',
                    // pointRadius: false,
                    // pointColor: '#dc3545',
                    // pointStrokeColor: '#dc3545',
                    // pointHighlightFill: '#dc3545',
                    // pointHighlightStroke: '#dc3545',
                    // data:[30,80,0,0,0,0,0,80,0,0,0,0]
                    // },
                    // {
                    // label: 'Home Linen',
                    // backgroundColor: '#fd7e14',
                    // borderColor: '#fd7e14',
                    // pointRadius: false,
                    // pointColor: '#fd7e14',
                    // pointStrokeColor: '#fd7e14',
                    // pointHighlightFill: '#fd7e14',
                    // pointHighlightStroke: '#fd7e14',
                    // data:[10,60,0,0,0,0,0,80,0,0,0,0]
                    // },
                    // {
                    // label: 'Food',
                    // backgroundColor: '#ffc107',
                    // borderColor: '#ffc107',
                    // pointRadius: false,
                    // pointColor: '#ffc107',
                    // pointStrokeColor: '#ffc107',
                    // pointHighlightFill: '#ffc107',
                    // pointHighlightStroke: '#ffc107',
                    // data:[80,20,0,0,0,0,0,0,0,80,0,0]
                    // },
                    
                    ]
            }
            var salesAnalysisOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                    gridLines: {
                        display: false
                    }
                    }],
                    yAxes: [{
                    gridLines: {
                        display: false
                    }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            // eslint-disable-next-line no-unused-vars
            var salesAnalysis = new Chart(salesAnalysisCanvas, {
                type: 'horizontalBar',
                data: salesAnalysisData,
                options: salesAnalysisOptions,
                
            })
        }
    });
}
</script>