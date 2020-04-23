<!DOCTYPE html>
<html lang="en">
<?php $page="dashboard"; $ac="all"; ?> 

<head>
    <title>Gradient Able bootstrap admin template by codedthemes </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php include("inc-nav.php");?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include("inc-menu.php");?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
    
                                            <div class="col-md-12 col-xl-4">
                                                <div class="card widget-statstic-card borderless-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5>Statistics</h5>
                                                            <p class="p-t-10 m-b-0 text-muted">Compared to last week</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <i class="fa fa-calendar st-icon bg-primary"></i>
                                                        <div class="text-left">
                                                            <h3 class="d-inline-block">5,456</h3>
                                                            <i class="fa fa-long-arrow-up f-24 text-success m-l-15"></i>
                                                            <span class="f-right bg-success">23%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card widget-statstic-card borderless-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5>Daily order</h5>
                                                            <p class="p-t-10 m-b-0 text-muted">Compare to yesterday</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <i class="fa fa-users st-icon bg-warning txt-lite-color"></i>
                                                        <div class="text-left">
                                                            <h3 class="d-inline-block">600</h3>
                                                            <i class="fa fa-long-arrow-down text-danger f-24 m-l-15"></i>
                                                            <span class="f-right bg-danger">-5%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card widget-statstic-card borderless-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5>Revenue 2017</h5>
                                                            <p class="p-t-10 m-b-0 text-muted">This year revenue</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <i class="fa fa-line-chart st-icon bg-success"></i>
                                                        <div class="text-left">
                                                            <h3 class="d-inline-block">$2,65,500</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---->
                                            <div class="col-xl-8 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Analytics</h5>
                                                        <span class="text-muted">Get 15% Off on <a href="https://www.amcharts.com/" target="_blank">amCharts</a> licences. Use code "codedthemes" and get the discount.</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="analythics-graph" style="height:365px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                                <div class="row">
                                                <div class="col-xl-12 col-md-6">
                                                    <div class="card">
                                                        <div class="card-block text-center">
                                                            <i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
                                                            <h4 class="m-t-20"><span class="text-c-blue">8.62k</span> Subscribers</h4>
                                                            <p class="m-b-20">Your main list is growing</p>
                                                            <button class="btn btn-primary btn-sm btn-round">Manage List</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-6">
                                                    <div class="card">
                                                        <div class="card-block text-center">
                                                            <i class="fa fa-twitter text-c-green d-block f-40"></i>
                                                            <h4 class="m-t-20"><span class="text-c-blgreenue">+40</span> Followers</h4>
                                                            <p class="m-b-20">Your main list is growing</p>
                                                            <button class="btn btn-success btn-sm btn-round">Check them out</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- unique visitor start -->
                                            <div class="col-xl-5 col-md-12">
                                                <div class="card review-task">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5>Reviews</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-chevron-left"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-times close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <tbody>
                                                                <tr>
                                                                    <td><a href="#!"><img class="img-rounded" src="../files/assets/images/widget/user-3.png" alt="chat-user"></a>
                                                                    </td>
                                                                    <td>
                                                                        <h6>Josephin John</h6>
                                                                        <p class="text-muted">Lorem ipsum dolor</p>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#!"><img class="img-rounded" src="../files/assets/images/widget/user-2.png" alt="chat-user"></a>
                                                                    </td>
                                                                    <td>
                                                                        <h6>Josephin Doe</h6>
                                                                        <p class="text-muted">Lorem ipsum dolo</p>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#!"><img class="img-rounded" src="../files/assets/images/widget/user-3.png" alt="chat-user"></a>
                                                                    </td>
                                                                    <td>
                                                                        <h6>Viral Dhimmar</h6>
                                                                        <p class="text-muted">Lorem ipsum do</p>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#!"><i class="fa fa-star  f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#!"><img class="img-rounded" src="../files/assets/images/widget/user-4.png" alt="chat-user"></a>
                                                                    </td>
                                                                    <td>
                                                                        <h6>Luciano Durk</h6>
                                                                        <p class="text-muted">Lorem ipsu</p>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#!"><i class="fa fa-star  f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#!"><img class="img-rounded" src="../files/assets/images/widget/user-3.png" alt="chat-user"></a>
                                                                    </td>
                                                                    <td>
                                                                        <h6>Viral Dhimmar</h6>
                                                                        <p class="text-muted">Lorem ipsum do</p>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#!"><i class="fa fa-star  f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-c-blue"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                        <a href="#!"><i class="fa fa-star f-18 text-default"></i></a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-md-12">
                                                <div class="card bg-c-blue map-visitor-card">
                                                    <div class="card-header">
                                                        <h5>Unique Visitor</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="unique-visitor-chart" style="height:260px"></div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="row justify-content-center text-center">
                                                            <div class="col-auto b-r-default col-6 col-sm-4">
                                                                <h6>Visits</h6>
                                                                <p class="text-muted">29.703 Users (40%)</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-blue" style="width:40%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto col-6 col-sm-4">
                                                                <h6>Revenue</h6>
                                                                <p class="text-muted">20703$ (60%)</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-green" style="width:60%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- unique visitor end -->
                                            <!-- Recent Orders start -->
                                            <div class="col-xl-8 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Recent Orders</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-chevron-left"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-times close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block p-0">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Image</th>
                                                                    <th>Product Code</th>
                                                                    <th>Customer</th>
                                                                    <th>Purchased On</th>
                                                                    <th>Status</th>
                                                                    <th>Transaction</th>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="../files/assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td>
                                                                    <td>PNG002413</td>
                                                                    <td>Jane Elliott</td>
                                                                    <td>06-01-2017</td>
                                                                    <td><span class="label label-primary">Shipping</span></td>
                                                                    <td>#7234421</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="../files/assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td>
                                                                    <td>PNG002344</td>
                                                                    <td>John Deo</td>
                                                                    <td>05-01-2017</td>
                                                                    <td><span class="label label-danger">Failed</span></td>
                                                                    <td>#7234486</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="../files/assets/images/product/prod3.jpg" alt="prod img" class="img-fluid"></td>
                                                                    <td>PNG002653</td>
                                                                    <td>Eugine Turner</td>
                                                                    <td>04-01-2017</td>
                                                                    <td><span class="label label-success">Delivered</span></td>
                                                                    <td>#7234417</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="../files/assets/images/product/prod4.jpg" alt="prod img" class="img-fluid"></td>
                                                                    <td>PNG002156</td>
                                                                    <td>Jacqueline Howell</td>
                                                                    <td>03-01-2017</td>
                                                                    <td><span class="label label-warning">Pending</span></td>
                                                                    <td>#7234454</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="../files/assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td>
                                                                    <td>PNG002344</td>
                                                                    <td>John Deo</td>
                                                                    <td>05-01-2017</td>
                                                                    <td><span class="label label-primary">Shipping</span></td>
                                                                    <td>#7234489</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-6">
                                                        <div class="card statustic-card">
                                                            <div class="card-header">
                                                                <h5>Order completed</h5>
                                                            </div>
                                                            <div class="card-block text-center">
                                                                <span class="d-block text-c-green f-36">14</span>
                                                                <p class="m-b-0">Total</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-green" style="width:14%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer bg-c-green">
                                                                <h6 class="text-white m-b-0">this month Order: 14</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-md-6">
                                                        <div class="card statustic-card">
                                                            <div class="card-header">
                                                                <h5>Order cancel</h5>
                                                            </div>
                                                            <div class="card-block text-center">
                                                                <span class="d-block text-c-pink f-36">85</span>
                                                                <p class="m-b-0">Total</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-pink" style="width:85%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer bg-c-pink">
                                                                <h6 class="text-white m-b-0">this month cancel order: 85</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Recent Orders end -->
                                            
                                        </div>
                                    </div>
                                </div>

                                <div id="styleSelector">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../files/bower_components/jquery/js/jquery.min.js "></script>
    <script src="../files/bower_components/jquery-ui/js/jquery-ui.min.js "></script>
    <script src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="../files/bower_components/bootstrap/js/bootstrap.min.js "></script>
    <script src="../files/assets/pages/widget/excanvas.js "></script>
    <!-- jquery slimscroll js -->
    <script src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script src="../files/bower_components/modernizr/js/modernizr.js "></script>
    <!-- slimscroll js -->
    <script src="../files/assets/js/SmoothScroll.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script src="../files/bower_components/chart.js/js/Chart.js"></script>
    <!-- amchart js -->
    <script src="../files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="../files/assets/pages/widget/amchart/gauge.js"></script>
    <script src="../files/assets/pages/widget/amchart/serial.js"></script>
    <script src="../files/assets/pages/widget/amchart/ammap.js"></script>
    <script src="../files/assets/pages/widget/amchart/continentsLow.js"></script>
    <script src="../files/assets/pages/widget/amchart/light.js"></script>
    <!-- menu js -->
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script src="../files/assets/pages/dashboard/ecommerce-dashboard.js"></script>
    <script src="../files/assets/js/script.js "></script>
</body>
<script>
    $('#new-cons').dataTable({
        "searching": false,
        "info": false,
        "paging": false,
        "lengthChange": false,
        "order": [],
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }]
    });
</script>

</html>