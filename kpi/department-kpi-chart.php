<!DOCTYPE html>
<html lang="en">
<?php $page="kpi"; session_start(); ?>

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
    <!-- Nvd3 chart css -->
    <link rel="stylesheet" href="../files/bower_components/nvd3/css/nv.d3.css" type="text/css" media="all">
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
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card ">
                                        <div class="card-block ">
                                            <h5 class="m-b-10">Department KPI</h5>

<!--
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#">KPI</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#">Hospitals KPI</a>
                                                </li>
                                            </ul>
-->
                                        </div>
                                        <div class="page-body">
                                        <div class="row">
                                            <!-- LINE CHART start -->
                                            <div class="col-lg-12 col-xl-3">
                                                <!-- Draggable Without Images card start -->
                                                <div class="card" style="margin-left: 15px">

                                                    <div class="card-block">
                                                        <div class="card-block">
                                                            <h6 class="card-title">KPI NO</h6>
                                                            <p class="card-text">00261-WARD7-6-01</p>
                                                            <h6 class="card-title">KPI NAME</h6>
                                                            <p class="card-text">%Net Revenue Growth</p>
                                                            <h6 class="card-title">Description</h6>
                                                            <p class="card-text">รายได้จากการบริการแผนก</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Draggable Without Images card end -->
                                            </div>
                                            <div class="col-md-12 col-lg-9">
                                                 <div class="card">
                                                    <div class="card-header">
                                                        <h5>Line chart</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="linechart" class="nvd-chart"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="page-body">
                                        <!-- `New` Constructor table start -->
                                        <div class="card">
                                            
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="new-cons" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>weight</th>
                                                                <th>Target</th>
                                                                <th>1</th>
                                                                <th>2</th>
                                                                <th>3</th>
                                                                <th>4</th>
                                                                <th>5</th>
                                                                <th>6</th>
                                                                <th>7</th>
                                                                <th>8</th>
                                                                <th>9</th>
                                                                <th>10</th>
                                                                <th>11</th>
                                                                <th>12</th>
                                                                <th>YTQ</th>
                                                                <th>scor</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php for($i=1; $i<2; $i++){ ?>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>15%</td>
                                                                <td>10%</td>
                                                                <td>12%</td>
                                                                <td>13%</td>
                                                                <td>14%</td>
                                                                <td>15%</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><i class="icofont icofont-emo-laughing"></i></td>
                                                               
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xl-12">
                                                        <blockquote class="blockquote blockquote-reverse">
                                                            <p class="m-b-0"><i class="icofont icofont-emo-laughing"></i> >11.3% <i class="icofont icofont-emo-laughing"></i> >11.3% <i class="icofont icofont-emo-laughing"></i> >11.3% <i class="icofont icofont-emo-laughing"></i> >11.3% <i class="icofont icofont-emo-laughing"></i> >11.3% </p>
                                                            <br>
<!--
                                                            <footer class="blockquote-footer">
                                                                <button type="button" id="idRunTheCode" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add note">
                                                            <span class="m-l-10">Add note</span>
                                                        </button>
                                                            </footer>
-->
                                                            <button type="button" id="idRunTheCode" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add note">
                                                            <span class="m-l-10">Add note</span>
                                                        </button>
                                                        </blockquote>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- `New` Constructor table end -->
                                    </div>
                                    </div>
                                    </div>
                                    <!-- Page-header end -->

                                    
                                </div>
                            </div>
                            <!-- Warning Section Starts -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script  src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script  src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script  src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script  src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script  src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script  src="../files/bower_components/modernizr/js/modernizr.js"></script>
    <script  src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- NVD3 chart -->
    <script src="../files/bower_components/d3/js/d3.js"></script>
    <script src="../files/bower_components/nvd3/js/nv.d3.js"></script>
    <script src="../files/assets/pages/chart/nv-chart/js/stream_layers.js"></script>
    <!-- Custom js -->
    <script  src="../files/assets/pages/chart/nvd3/chart-nvd3.js"></script>
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script  src="../files/assets/js/script.js"></script>
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