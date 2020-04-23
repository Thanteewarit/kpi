<!DOCTYPE html>
<html lang="en">
<?php $page="kpi"; $ac="department"; session_start();?>

<head>
    <?php include("inc-header.php")?>
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
<style>
    .table td, .table th {
    padding: 5px;
    vertical-align: top;
    border-top: 1px solid #e9ecef;
</style>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-header-left">
                                                <h3>Department KPI <i class="icofont icofont-emo-laughing"></i></h3>
                                            </div>
                                            <div class="card-header-right">
                                                <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-block" style="background-color: #f6f6f8;">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h5 class="d-inline-block " style="margin-right: 52px;">ผลคะแนน : 4.50/5.00</h5>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table <?php echo $_SESSION["ModeTable"];?>>
                                                    <thead>
                                                        <tr>
                                                            <th>KPI Name</th>
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
                                                            <th>Year</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Financial</td>
                                                            <?php for($i=1; $i<=3; $i++){ ?>
                                                            <tr>
                                                                
                                                                <td  >จำนวนครั้งของการIdentifyผู้ป่วยผิดคน</td>
                                                            <td>5</td>
                                                            <td>15%</td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;"value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                                <td><a href="department-kpi-chart.php" target="_blank"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                            </tr>
                                                            <?php }?>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Customer</td>
                                                            <?php for($i=1; $i<=2; $i++){ ?>
                                                            <tr>
                                                                
                                                                 <td  >จำนวนครั้งของการIdentifyผู้ป่วยผิดคน</td>
                                                            <td>5</td>
                                                            <td>15%</td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;"value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                                <td><a href="department-kpi-chart.php" target="_blank"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                            </tr>
                                                            <?php }?>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Internal Business Processes</td>
                                                            <?php for($i=1; $i<=2; $i++){ ?>
                                                            <tr>
                                                                
                                                                 <td  >จำนวนครั้งของการIdentifyผู้ป่วยผิดคน</td>
                                                            <td>5</td>
                                                            <td>15%</td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;"value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                                <td><a href="department-kpi-chart.php" target="_blank"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                            </tr>
                                                            <?php }?>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Learing and Growth</td>
                                                            <?php for($i=1; $i<=2; $i++){ ?>
                                                            <tr>
                                                                
                                                                 <td  >จำนวนครั้งของการIdentifyผู้ป่วยผิดคน</td>
                                                            <td>5</td>
                                                            <td>15%</td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;"value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="15%" readonly></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" disabled></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                                <td><a href="department-kpi-chart.php" target="_blank"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
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
                                                        <p class="m-b-0">xxxxx</p>
                                                        <footer class="blockquote-footer">Someone famous in
                                                            <cite title="Source Title">Source Title</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>

                                            </div>
                                        </div>
<!--
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Username</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                            <td>@fat</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Larry</td>
                                                            <td>the Bird</td>
                                                            <td>@twitter</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
-->
                                    </div>
                                    <!-- Page-header end -->

                                    <div class="page-body">
                                        <!-- `New` Constructor table start -->

                                        <!-- `New` Constructor table end -->
                                    </div>
                                </div>
                            </div>
                            <!-- Warning Section Starts -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("inc-footer.php");?>
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