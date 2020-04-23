<!DOCTYPE html>
<html lang="en">
<?php $page="dashboard"; $ac="hospitals"; ?> 

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
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
    <!-- radial chart.css -->
    <link rel="stylesheet" href="../files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
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
                                            <!-- unique visitor start -->
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Statistics</h5>
                                                        <span class="text-muted">Get 15% Off on <a href="https://www.amcharts.com/" target="_blank">amCharts</a> licences. Use code "codedthemes" and get the discount.</span>
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
                                                        <div id="visitor-list-graph" style="height: 400px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- unique visitor start -->
    
                                            <!-- Power card Start -->
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card">
                                                    <div class="card-header p-t-20">
                                                        <div class="card-header-left">
                                                            <h5>Power</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <i class="icofont icofont-spinner-alt-5 "></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-block-big card-power">
                                                        <h2>2789</h2><span class="text-muted">kw</span>
                                                        <canvas id="power-card-chart1" height='75'></canvas>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="map-area">
                                                                    <h6 class="m-0">2876</h6>
                                                                    <span>kw</span>
                                                                    <p class="text-muted m-0">Month</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="map-area">
                                                                    <h6 class="m-0">234</h6>
                                                                    <span>kw</span>
                                                                    <p class="text-muted m-0">Today</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card">
                                                    <div class="card-header p-t-20">
                                                        <div class="card-header-left">
                                                            <h5>Water</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <i class="icofont icofont-spinner-alt-5 "></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-block-big card-power">
                                                        <h2>7.3</h2><span class="text-muted">m3</span>
                                                        <canvas id="power-card-chart2" height='75'></canvas>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="map-area">
                                                                    <h6 class="m-0">4.5</h6>
                                                                    <span>m3</span>
                                                                    <p class="text-muted m-0">Month</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="map-area">
                                                                    <h6 class="m-0">0.5</h6>
                                                                    <span>m3</span>
                                                                    <p class="text-muted m-0">Today</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-4">
                                                <div class="card">
                                                    <div class="card-header p-t-20">
                                                        <div class="card-header-left">
                                                            <h5>Power</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <i class="icofont icofont-spinner-alt-5 "></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-block-big card-power">
                                                        <h2>834</h2><span class="text-muted">mpg</span>
                                                        <canvas id="power-card-chart3" height='75'></canvas>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="map-area">
                                                                    <h6 class="m-0">15.6</h6>
                                                                    <span>mpg</span>
                                                                    <p class="text-muted m-0">Month</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="map-area">
                                                                    <h6 class="m-0">234</h6>
                                                                    <span>kw</span>
                                                                    <p class="text-muted m-0">Today</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Power card End -->
                                            
                                            <!-- Project overview Start -->
                                            <div class="col-md-12 col-xl-5">
                                                <div class="card ">
                                                    <div class="card-header ">
                                                        <div class="card-header-left ">
                                                            <h5>Latest Comments</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block ">
                                                        <div class="card-comment ">
                                                            <div class="card-block-small">
                                                                <img class="img-radius" src="../files/assets/images/avatar-4.jpg" alt="user-1">
                                                                <div class="comment-desc">
                                                                    <h6>Luciano Durk</h6>
                                                                    <p class="text-muted ">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                                    <div class="comment-btn">
                                                                        <button class="btn bg-c-blue btn-round btn-comment ">Action</button>
                                                                    </div>
                                                                    <div class="date">
                                                                        <i>04 October 2015</i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-comment ">
                                                            <div class="card-block-small">
                                                                <img class="img-radius" src="../files/assets/images/avatar-2.jpg" alt="user-4">
                                                                <div class="comment-desc">
                                                                    <h6>John Doe</h6>
                                                                    <p class="text-muted ">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                                    <div class="comment-btn">
                                                                        <button class="btn bg-c-pink btn-round btn-comment ">Approved</button>
                                                                    </div>
                                                                    <div class="date">
                                                                        <i>16 December 2015</i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-comment ">
                                                            <div class="card-block-small">
                                                                <img class="img-radius" src="../files/assets/images/avatar-3.jpg" alt="user-2">
                                                                <div class="comment-desc">
                                                                    <h6>Planner Board</h6>
                                                                    <p class="text-muted ">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                                    <div class="comment-btn">
                                                                        <button class="btn bg-c-green btn-round btn-comment ">Rejected</button>
                                                                    </div>
                                                                    <div class="date">
                                                                        <i>12 Saptember 2015</i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-7">
                                                <div class="card review-project">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5>Project Report</h5>
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block p-t-0 p-b-0 w-100">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>Project</th>
                                                                    <th></th>
                                                                    <th>Status</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-4.jpg" alt="chat-user"></a>
                                                                        <div class="project-contain">
                                                                            <h6>Appestia Perfect</h6>
                                                                            <p class="text-muted"><i class="fa fa-clock-o f-12 m-r-10"></i>Created 12 . 3 . 2015</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="pie_1" style="display: none;">1/5</span>
                                                                    </td>
                            
                                                                    <td>
                                                                        25 %
                                                                    </td>
                                                                    <td>
                                                                        15 Octobar 2015
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-2.jpg" alt="chat-user"></a>
                                                                        <div class="project-contain">
                                                                            <h6>Web consultancy</h6>
                                                                            <p class="text-muted"><i class="fa fa-clock-o f-12 m-r-10"></i>Created 22 . 8 . 2015</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="pie_2" style="display: none;">226/360</span>
                                                                    </td>
                            
                                                                    <td>
                                                                        60 %
                                                                    </td>
                                                                    <td>
                                                                        25 Octobar 2015
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-3.jpg" alt="chat-user"></a>
                                                                        <div class="project-contain">
                                                                            <h6>Graphic desginer</h6>
                                                                            <p class="text-muted"><i class="fa fa-clock-o f-12 m-r-10"></i>Created 05 . 8 . 2015</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="pie_3" style="display: none;">0.52/1.561</span>
                                                                    </td>
                            
                                                                    <td>
                                                                        40 %
                                                                    </td>
                                                                    <td>
                                                                        12 Octobar 2015
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-1.jpg" alt="chat-user"></a>
                                                                        <div class="project-contain">
                                                                            <h6>Photoshop and logo</h6>
                                                                            <p class="text-muted"><i class="fa fa-clock-o f-12 m-r-10"></i>Created 14 . 8 . 2015</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="pie_4" style="display: none;">1,4</span>
                                                                    </td>
                            
                                                                    <td>
                                                                        20 %
                                                                    </td>
                                                                    <td>
                                                                        04 Octobar 2015
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-4.jpg" alt="chat-user"></a>
                                                                        <div class="project-contain">
                                                                            <h6>Appestia Perfect</h6>
                                                                            <p class="text-muted"><i class="fa fa-clock-o f-12 m-r-10"></i>Created 14 . 8 . 2015</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="pie_5" style="display: none;">226,134</span>
                                                                    </td>
                            
                                                                    <td>
                                                                        60 %
                                                                    </td>
                                                                    <td>
                                                                        15 Octobar 2015
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-2.jpg" alt="chat-user"></a>
                                                                        <div class="project-contain">
                                                                            <h6>Appestia Perfect</h6>
                                                                            <p class="text-muted"><i class="fa fa-clock-o f-12 m-r-10"></i>Created 14 . 8 . 2015</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="pie_6" style="display: none;">200,134</span>
                                                                    </td>
    
                                                                    <td>
                                                                        60 %
                                                                    </td>
                                                                    <td>
                                                                        15 Octobar 2015
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Project overview End -->
                                            
                                            <!-- amount-card start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-blue amount-card">
                                                    <div class="card-block">
                                                        <i class="ti-arrow-up"></i>
                                                        <h4>$4600,00</h4>
                                                    </div>
                                                    <canvas id="amunt-card1"></canvas>
                                                    <p>Amount Founded</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-green amount-card">
                                                    <div class="card-block">
                                                        <i class="ti-arrow-down"></i>
                                                        <h4>$387.00</h4>
                                                    </div>
                                                    <canvas id="amunt-card2"></canvas>
                                                    <p>Balance</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-yellow amount-card">
                                                    <div class="card-block">
                                                        <i class="ti-arrow-up"></i>
                                                        <h4>$8350.00</h4>
                                                    </div>
                                                    <canvas id="amunt-card3"></canvas>
                                                    <p>Payback Amount</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-pink amount-card">
                                                    <div class="card-block">
                                                        <i class="ti-arrow-down"></i>
                                                        <h4>$123.00</h4>
                                                    </div>
                                                    <canvas id="amunt-card4"></canvas>
                                                    <p>Planned Collection Income</p>
                                                </div>
                                            </div>
                                            <!-- amount-card end -->
                                            
                                            <!-- Project & Task Start -->
                                            <div class="col-md-12 col-xl-7">
                                                <div class="card past-payment-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Past Payment</h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>Team Member</th>
                                                                    <th>Paid Hours</th>
                                                                    <th>Paid Amount</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-3.jpg" alt="chat-user"></a>
                                                                        <p class="d-inline-block m-l-10 f-w-600">Erwin Brown</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>6:23</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>$20.00/hr</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>23 oct, 2017</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-2.jpg" alt="chat-user"></a>
                                                                        <p class="d-inline-block m-l-10 f-w-600">Joseph Villa</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>10:56</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>$25.00/hr</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>25 oct, 2017</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-4.jpg" alt="chat-user"></a>
                                                                        <p class="d-inline-block m-l-10 f-w-600">Jekson Durk</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>5:56</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>$23.00/hr</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>01 nov, 2017</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-1.jpg" alt="chat-user"></a>
                                                                        <p class="d-inline-block m-l-10 f-w-600">Erwin Brown</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>6:23</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>$16.00/hr</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>05 nov, 2017</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#!"><img class="img-radius img-40" src="../files/assets/images/avatar-4.jpg" alt="chat-user"></a>
                                                                        <p class="d-inline-block m-l-10  f-w-600">Gregory Durk</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>15:23</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>$40.00/hr</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>15 nov, 2017</p>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-5 ">
                                                <div class="card project-task">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Audience By Country</h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-block p-b-10">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>Country</th>
                                                                    <th>Statistic</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="task-contain">
                                                                            <h6 class="bg-c-blue d-inline-block text-center">IN</h6>
                                                                            <p class="d-inline-block m-l-20">India</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="d-inline-block m-r-20">80%</p>
                                                                        <div class="progress d-inline-block">
                                                                            <div class="progress-bar bg-c-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="task-contain">
                                                                            <h6 class="bg-c-pink d-inline-block text-center">NY</h6>
                                                                            <p class="d-inline-block m-l-20">New York</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="d-inline-block m-r-20">60%</p>
                                                                        <div class="progress d-inline-block">
                                                                            <div class="progress-bar bg-c-pink" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="task-contain">
                                                                            <h6 class="bg-c-yellow d-inline-block text-center">UK</h6>
                                                                            <p class="d-inline-block m-l-20">England</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="d-inline-block m-r-20">50%</p>
                                                                        <div class="progress d-inline-block">
                                                                            <div class="progress-bar bg-c-yellow" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="task-contain">
                                                                            <h6 class="bg-c-green d-inline-block text-center">BZ</h6>
                                                                            <p class="d-inline-block m-l-20">Brazil</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="d-inline-block m-r-20">20%</p>
                                                                        <div class="progress d-inline-block">
                                                                            <div class="progress-bar bg-c-green" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="task-contain">
                                                                            <h6 class="bg-c-blue d-inline-block text-center">SA</h6>
                                                                            <p class="d-inline-block m-l-20">Africa</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="d-inline-block m-r-20">50%</p>
                                                                        <div class="progress d-inline-block">
                                                                            <div class="progress-bar bg-c-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Project & Task End -->
                                            
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
    <script src="../files/bower_components/peity/js/jquery.peity.js "></script>
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
    <script src="../files/assets/pages/dashboard/analytic-dashboard.js"></script>
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