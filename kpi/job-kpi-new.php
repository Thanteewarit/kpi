<!DOCTYPE html>
<html lang="en">
<?php $page="kpi"; $ac="job"; session_start(); ?>

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
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/component.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../files/new/jquery-ui.1.10.1.min.css" type="text/css" />
    <link rel="stylesheet" href="../files/new/style.css" type="text/css" />
    <link rel="stylesheet" href="../files/bower_components/nvd3/css/nv.d3.css" type="text/css" media="all">
</head>
<style>
    .table td,
    .table th {
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
                                        <div class="page-header">
                                            <div class="row">
                                                <div class="card-block col-9">
                                                    <ul class="breadcrumb-title  p-t-10">
                                                        <li class="breadcrumb-item">
                                                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Job KPI</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="?">Department KPI</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="?">Hospitals KPI </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="col-3">
                                                    <div class="card" style="margin-top: 30px; margin-right: 30px; margin-bottom: 0px;">
                                                        <div class="card-block" style="background-color: #f6f6f8;">
                                                            <div class="row">
                                                                <div class="col-12 text-right">
                                                                    <h6 class="d-inline-block ">ผลคะแนน : 4.50/5.00</h6>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <hr style="width: 95%;">

                                        </div>
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
                                                            <th>YTD</th>
                                                            <th>scor</th>
                                                            <th></th>
                                                            <th>Year</th>
                                                        </tr>
                                                    </thead>
                                                    <?php 
                                                        ?>
                                                    <tbody>
                                                        <?php 
                                                            $month = $_SESSION['time']['month'];
                                                            $year = $_SESSION['time']['year'];
                                                            $code = $_GET['code'];                                     
                                                            $valuei="SELECT * 
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_kpi_type AS r3 ON r2.kpi_type_id = r3.kpi_type_id
JOIN tb_assessment_time AS r4 ON r2.assessment_time_code = r4.assessment_time_code
WHERE r1.evaluation_all_staff = '".$_SESSION['staff']["code"]."' 
AND r1.evaluation_all_year = '".$_SESSION['time']['year']."'
AND r4.assessment_time_type = '3'
AND r2.kpi_type_id = '2'"; ?>
                                                        <?php if (ck_numrow($valuei)!=0) { ?>
                                                        <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Financial</td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php
                                                            
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr>

                                                            <td><?php echo $r['kpi_master_name']?></td>
                                                            <td><?php echo $r['kpi_master_weight']?></td>
                                                            <td><?php echo $r['kpi_master_target']?></td>
                                                            <td><input type="text" class="form-control am1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" disabled></td>

                                                            <td><input type="text" class="form-control am2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" disabled></td>

                                                            <td><input type="text" class="form-control am3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" disabled></td>

                                                            <td><input type="text" class="form-control am4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" disabled></td>

                                                            <td><input type="text" class="form-control am5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" disabled></td>

                                                            <td><input type="text" class="form-control am6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" disabled></td>

                                                            <td><input type="text" class="form-control am7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" disabled></td>

                                                            <td><input type="text" class="form-control am8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" disabled></td>

                                                            <td><input type="text" class="form-control am9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" disabled></td>

                                                            <td><input type="text" class="form-control am10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" disabled></td>

                                                            <td><input type="text" class="form-control am11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" disabled></td>

                                                            <td><input type="text" class="form-control am12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?>></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php 
                                                            $valuei="SELECT * 
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_kpi_type AS r3 ON r2.kpi_type_id = r3.kpi_type_id
JOIN tb_assessment_time AS r4 ON r2.assessment_time_code = r4.assessment_time_code
WHERE r1.evaluation_all_staff = '".$_SESSION['staff']["code"]."' 
AND r1.evaluation_all_year = '".$_SESSION['time']['year']."'
AND r4.assessment_time_type = '3'
AND r2.kpi_type_id = '3'"; 
                                                                ?>

                                                        <?php if (ck_numrow($valuei)!=0) { ?>
                                                        <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Customer</td>
                                                        </tr>
                                                        <?php }?>


                                                        <?php foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr>

                                                            <td><?php echo $r['kpi_master_name']?></td>
                                                            <td><?php echo $r['kpi_master_weight']?></td>
                                                            <td><?php echo $r['kpi_master_target']?></td>
                                                            <td><input type="text" class="form-control am1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" disabled></td>

                                                            <td><input type="text" class="form-control am2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" disabled></td>

                                                            <td><input type="text" class="form-control am3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" disabled></td>

                                                            <td><input type="text" class="form-control am4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" disabled></td>

                                                            <td><input type="text" class="form-control am5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" disabled></td>

                                                            <td><input type="text" class="form-control am6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" disabled></td>

                                                            <td><input type="text" class="form-control am7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" disabled></td>

                                                            <td><input type="text" class="form-control am8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" disabled></td>

                                                            <td><input type="text" class="form-control am9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" disabled></td>

                                                            <td><input type="text" class="form-control am10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" disabled></td>

                                                            <td><input type="text" class="form-control am11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" disabled></td>

                                                            <td><input type="text" class="form-control am12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?>></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php 
                                                                  $valuei="SELECT * 
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_kpi_type AS r3 ON r2.kpi_type_id = r3.kpi_type_id
JOIN tb_assessment_time AS r4 ON r2.assessment_time_code = r4.assessment_time_code
WHERE r1.evaluation_all_staff = '".$_SESSION['staff']["code"]."' 
AND r1.evaluation_all_year = '".$_SESSION['time']['year']."'
AND r4.assessment_time_type = '3'
AND r2.kpi_type_id = '4'"; 
                                                                ?>
                                                        <?php if (ck_numrow($valuei)!=0) { ?>
                                                        <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Internal Business Processes</td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr>

                                                            <td><?php echo $r['kpi_master_name']?></td>
                                                            <td><?php echo $r['kpi_master_weight']?></td>
                                                            <td><?php echo $r['kpi_master_target']?></td>
                                                            <td><input type="text" class="form-control am1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" disabled></td>

                                                            <td><input type="text" class="form-control am2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" disabled></td>

                                                            <td><input type="text" class="form-control am3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" disabled></td>

                                                            <td><input type="text" class="form-control am4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" disabled></td>

                                                            <td><input type="text" class="form-control am5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" disabled></td>

                                                            <td><input type="text" class="form-control am6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" disabled></td>

                                                            <td><input type="text" class="form-control am7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" disabled></td>

                                                            <td><input type="text" class="form-control am8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" disabled></td>

                                                            <td><input type="text" class="form-control am9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" disabled></td>

                                                            <td><input type="text" class="form-control am10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" disabled></td>

                                                            <td><input type="text" class="form-control am11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" disabled></td>

                                                            <td><input type="text" class="form-control am12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?>></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php 
                                                                  $valuei="SELECT * 
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_kpi_type AS r3 ON r2.kpi_type_id = r3.kpi_type_id
JOIN tb_assessment_time AS r4 ON r2.assessment_time_code = r4.assessment_time_code
WHERE r1.evaluation_all_staff = '".$_SESSION['staff']["code"]."' 
AND r1.evaluation_all_year = '".$_SESSION['time']['year']."'
AND r4.assessment_time_type = '3'
AND r2.kpi_type_id = '5'"; 
                                                                ?>
                                                        <?php if (ck_numrow($valuei)!=0) { ?>
                                                        <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Learing and Growth</td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr>

                                                            <td><?php echo $r['kpi_master_name']?></td>
                                                            <td><?php echo $r['kpi_master_weight']?></td>
                                                            <td><?php echo $r['kpi_master_target']?></td>
                                                            <td><input type="text" class="form-control am1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" disabled></td>

                                                            <td><input type="text" class="form-control am2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" disabled></td>

                                                            <td><input type="text" class="form-control am3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" disabled></td>

                                                            <td><input type="text" class="form-control am4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" disabled></td>

                                                            <td><input type="text" class="form-control am5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" disabled></td>

                                                            <td><input type="text" class="form-control am6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" disabled></td>

                                                            <td><input type="text" class="form-control am7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" disabled></td>

                                                            <td><input type="text" class="form-control am8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" disabled></td>

                                                            <td><input type="text" class="form-control am9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" disabled></td>

                                                            <td><input type="text" class="form-control am10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" disabled></td>

                                                            <td><input type="text" class="form-control am11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" disabled></td>

                                                            <td><input type="text" class="form-control am12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?>></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                                                                                <?php 
                                                                  $valuei="SELECT * 
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_kpi_type AS r3 ON r2.kpi_type_id = r3.kpi_type_id
JOIN tb_assessment_time AS r4 ON r2.assessment_time_code = r4.assessment_time_code
WHERE r1.evaluation_all_staff = '".$_SESSION['staff']["code"]."' 
AND r1.evaluation_all_year = '".$_SESSION['time']['year']."'
AND r4.assessment_time_type = '3'
AND r2.kpi_type_id = '11'"; 
                                                                ?>
                                                        <?php if (ck_numrow($valuei)!=0) { ?>
                                                        <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Participate</td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr>

                                                            <td><?php echo $r['kpi_master_name']?></td>
                                                            <td><?php echo $r['kpi_master_weight']?></td>
                                                            <td><?php echo $r['kpi_master_target']?></td>
                                                            <td><input type="text" class="form-control am1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" disabled></td>

                                                            <td><input type="text" class="form-control am2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" disabled></td>

                                                            <td><input type="text" class="form-control am3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" disabled></td>

                                                            <td><input type="text" class="form-control am4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" disabled></td>

                                                            <td><input type="text" class="form-control am5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" disabled></td>

                                                            <td><input type="text" class="form-control am6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" disabled></td>

                                                            <td><input type="text" class="form-control am7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" disabled></td>

                                                            <td><input type="text" class="form-control am8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" disabled></td>

                                                            <td><input type="text" class="form-control am9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" disabled></td>

                                                            <td><input type="text" class="form-control am10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" disabled></td>

                                                            <td><input type="text" class="form-control am11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" disabled></td>

                                                            <td><input type="text" class="form-control am12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?>></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>



                                    </div>
                                    <?php 
                                                                $valuei = "SELECT * 
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.competency_master_type = '4'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".$_SESSION['staff']["code"]."'"; 
                                                                
                             if(ck_numrow($valuei)!=0){ 
                                                                ?>
                                    <div class="card">


                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="new-cons2" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="no-sort">Managerial Competency</th>
                                                            <th class="no-sort">ประเมิน</th>
                                                            <th class="no-sort">View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $valuei = "SELECT * 
                                                        FROM tb_kpi_type  WHERE kpi_types = '2'";
                                                        foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr style="background: #2a97a5;">
                                                            <td><?php echo ($key+1)." . ".$r['kpi_type_name'];?></td>
                                                            <td> <?php //echo $r['ap_weight']?></td>
                                                            <td> </td>
                                                        </tr>

                                                        <?php 
                                                        $valuei = "                                                        SELECT * 
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.kpi_type_id  = '".$r['kpi_type_id']."' 
AND r2.competency_master_type = '4'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".$_SESSION['staff']["code"]."'";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>

                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?></td>
                                                            <td class="tabledit-edit-mode">
                                                                <select class="tabledit-input form-control input-sm" >
                                                                    <option value="">กรุณาเลือกคะแนน</option>
                                                                    <?php for($i=1; $i<=$r2['competency_master_target']; $i++) { ?>
                                                                    <option value="<?php echo $i?>" <?php if($r2['evaluation_competency_value']==$i ){ echo "selected" ;}?>><?php echo $i;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td class="tabledit-edit-mode">
                                                                <a href="#" onclick="villGraph2('<?php echo $r2['competency_master_id']?>','<?php echo $r2['evaluation_competency_code']?>','<?php echo $r2['evaluation_competency_year']?>','<?php echo $r2['evaluation_competency_id_staff']?>');"><button class="btn btn-success btn-round btn-sm">view</button></a>
                                                            </td>
                                                        </tr>
                                                        <?php } }?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php 
$valuei = "SELECT * 
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.competency_master_type = '5'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".$_SESSION['staff']["code"]."'"; 
                                                                
                             if(ck_numrow($valuei)!=0){ 
                                                                ?>
                                    <div class="card">


                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="new-cons2" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="no-sort">Functional Competency</th>
                                                            <th class="no-sort">ประเมิน</th>
                                                            <th class="no-sort">View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $valuei = "SELECT * 
                                                        FROM tb_kpi_type  WHERE kpi_types = '2'";
                                                        foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr style="background: #2a97a5;">
                                                            <td><?php echo ($key+1)." . ".$r['kpi_type_name'];?></td>
                                                            <td> <?php //echo $r['ap_weight']?></td>
                                                            <td> <?php //echo $r['ap_weight']?></td>
                                                        </tr>

                                                        <?php 
                                                        $valuei = "                                                        SELECT * 
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.kpi_type_id  = '".$r['kpi_type_id']."' 
AND r2.competency_master_type = '5'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".$_SESSION['staff']["code"]."'";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>

                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?></td>
                                                            <td class="tabledit-edit-mode">
                                                                <select class="tabledit-input form-control input-sm" >
                                                                    <option value="">กรุณาเลือกคะแนน</option>
                                                                    <?php for($i=1; $i<=$r2['competency_master_target']; $i++) { ?>
                                                                    <option value="<?php echo $i?>" <?php if($r2['evaluation_competency_value']==$i ){ echo "selected" ;}?>><?php echo $i;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td class="tabledit-edit-mode">
                                                                <a href="#" onclick="villGraph2('<?php echo $r2['competency_master_id']?>','<?php echo $r2['evaluation_competency_code']?>','<?php echo $r2['evaluation_competency_year']?>','<?php echo $r2['evaluation_competency_id_staff']?>');"><button class="btn btn-success btn-round btn-sm">view</button></a>
                                                            </td>
                                                        </tr>
                                                        <?php } }?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php 
                                                                $valuei = "SELECT * 
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.competency_master_type = '6'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".$_SESSION['staff']["code"]."'"; 
                                                                
                             if(ck_numrow($valuei)!=0){ 
                                                                ?>
                                    <div class="card">


                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="new-cons2" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="no-sort">Core Competency </th>
                                                            <th class="no-sort">ประเมิน</th>
                                                           <th class="no-sort">View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $valuei = "SELECT * 
                                                        FROM tb_kpi_type  WHERE kpi_types = '2'";
                                                        foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr style="background: #2a97a5;">
                                                            <td><?php echo ($key+1)." . ".$r['kpi_type_name'];?></td>
                                                            <td> <?php //echo $r['ap_weight']?></td>
                                                            <td> <?php //echo $r['ap_weight']?></td>
                                                        </tr>

                                                        <?php 
                                                        $valuei = "                                                        SELECT * 
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.kpi_type_id  = '".$r['kpi_type_id']."' 
AND r2.competency_master_type = '6'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".$_SESSION['staff']["code"]."'";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>

                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?></td>
                                                            <td class="tabledit-edit-mode">
                                                                <select class="tabledit-input form-control input-sm" >
                                                                    <option value="">กรุณาเลือกคะแนน</option>
                                                                    <?php for($i=1; $i<=$r2['competency_master_target']; $i++) { ?>
                                                                    <option value="<?php echo $i?>" <?php if($r2['evaluation_competency_value']==$i ){ echo "selected" ;}?>><?php echo $i;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td class="tabledit-edit-mode">
                                                                <a href="#" onclick="villGraph2('<?php echo $r2['competency_master_id']?>','<?php echo $r2['evaluation_competency_code']?>','<?php echo $r2['evaluation_competency_year']?>','<?php echo $r2['evaluation_competency_id_staff']?>');"><button class="btn btn-success btn-round btn-sm">view</button></a>
                                                            </td>
                                                        </tr>
                                                        <?php } }?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
<?php } ?>

                                </div>
                            </div>
                            <div class="modal fade" id="villGraph" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 90%;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header pt-2 pb-2 btnh_primary">
                                            <h5 class="modal-title" id="exampleModalLabel">ประเมิน KPI</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-block" style="margin: 5px;" id="contents">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <label class="col-12 col-form-label text-center">รายละเอียด</label>
                                                        </div>

                                                        <div class="card">
                                                            <div class="card-block">
                                                                <div id="placeholder" class="demo-placeholder" style="height:300px; width:700px;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Name</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="showKpiName" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Weight</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="showWeight" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Target</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="showTarget" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="new-cons" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Jan</th>
                                                                        <th>Feb</th>
                                                                        <th>Mar</th>
                                                                        <th>Apr</th>
                                                                        <th>May</th>
                                                                        <th>Jun</th>
                                                                        <th>Jul</th>
                                                                        <th>Aug</th>
                                                                        <th>Sep</th>
                                                                        <th>Oct</th>
                                                                        <th>Nov</th>
                                                                        <th>Dec</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div id="dm1"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm2"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm3"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm4"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm5"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm6"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm7"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm8"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm9"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm10"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm11"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="dm12"></div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Year to date</label>
                                                            <div class="col-4">
                                                                <input type="text" class="form-control" id="" readonly>

                                                            </div>
                                                            <label class="col-2 col-form-label">Score</label>
                                                            <div class="col-4">
                                                                <input type="text" class="form-control" id="" readonly>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="md-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script src="../files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- sweet alert js -->
    <script src="../files/bower_components/sweetalert/js/sweetalert.min.js"></script>
    <script src="../files/assets/js/modal.js"></script>
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script src="../files/assets/js/classie.js"></script>
    <script src="../files/assets/js/modalEffects.js"></script>
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/js/script.js"></script>
    <!-- data-table js -->
    <script src="../files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="../files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="../files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/data-table/js/data-table-custom.js"></script>

    <!-- Switch component js -->
    <script src="../files/bower_components/switchery/js/switchery.min.js"></script>
    <!-- Tags js -->
    <script src="../files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
    <!-- Max-length js -->
    <script src="../files/bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/advance-elements/swithces.js"></script>
    <script type="text/javascript" src="../files/new/jquery-ui.1.12.1.min.js"></script>


    <!-- Float Chart js -->
    <script src="../files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.pie.js"></script>
    <!-- Custom js -->
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

    function showmr(id, csid) {


        $("#modal_add_comment").modal("show");
        clearScore();
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "getKpiMasterHesd"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    $("#kpi_master_id").val(id);
                    $("#kpi_master_name").val(val["kpi_master_name"]);
                    $("#csid").val(csid);
                    $("#kpi_master_weight").val(val["kpi_master_weight"]);
                    $("#kpi_master_target").val(val["kpi_master_target"]);
                    $("#kpi_master_standard_0").val(val["kpi_master_standard_0"]);
                    $("#kpi_master_standard_1").val(val["kpi_master_standard_1"]);
                    $("#kpi_masterl_standard_2").val(val["kpi_masterl_standard_2"]);
                    $("#kpi_master_standard_3").val(val["kpi_master_standard_3"]);
                    $("#kpi_master_standard_4").val(val["kpi_master_standard_4"]);
                    $("#kpi_master_standard_5").val(val["kpi_master_standard_5"]);
                    $("#assessment_time_code").val(val["assessment_time_code"]);

                });
                document.getElementById("evaluation_value").focus();
            }
        });
    }

    function getScore() {
        var csid = $("#csid").val()
        var month = '<?php echo $month;?>';
        var year = '<?php echo $year;?>';
        var idStaff = '<?php echo cut(TokenVerify($_GET['key'], $secret))?>';
        console.log(csid);
        $.ajax({
            url: "../class/class-calculate.php",
            global: false,
            type: "POST",
            data: ({
                id: $("#evaluation_value").val(),
                Mode: "getScore",
                v0: $("#kpi_master_standard_0").val(),
                v1: $("#kpi_master_standard_1").val(),
                v2: $("#kpi_masterl_standard_2").val(),
                v3: $("#kpi_master_standard_3").val(),
                v4: $("#kpi_master_standard_4").val(),
                v5: $("#kpi_master_standard_5").val(),
                month: month,
                year: year,
                idStaff: idStaff,
                Weight: $("#kpi_master_weight").val(),
                kpi_master_id: $("#kpi_master_id").val()
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    $("#evaluation_total_score").val(val["score"]);
                    $("#evaluation_total").val(val["scoreAll"]);
                    $("." + csid).val((val["scoreAll"]));

                });
            }
        });
    }

    function clearScore() {

        $("#evaluation_value").val("");
        $("#csid").val("");
        $("#evaluation_total_score").val("");
        $("#evaluation_total").val("");
    }

    function villGraph(id) {
        //$(window).load(categoryChart());

        $("#villGraph").modal("show");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "getEvaluationAll"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var m1 = val["evaluation_all_month_1"];
                    var m2 = val["evaluation_all_month_2"];
                    var m3 = val["evaluation_all_month_3"];
                    var m4 = val["evaluation_all_month_4"];
                    var m5 = val["evaluation_all_month_5"];
                    var m6 = val["evaluation_all_month_6"];
                    var m7 = val["evaluation_all_month_7"];
                    var m8 = val["evaluation_all_month_8"];
                    var m9 = val["evaluation_all_month_9"];
                    var m10 = val["evaluation_all_month_10"];
                    var m11 = val["evaluation_all_month_11"];
                    var m12 = val["evaluation_all_month_12"];



                    $("#showWeight").val(val["kpi_master_weight"]);
                    $("#showTarget").val(val["kpi_master_target"]);
                    $("#showKpiName").val(val["kpi_master_name"]);
                    if (m1 > 0) {
                        $("#dm1").empty().append(m1);
                    }
                    if (m2 > 0) {
                        $("#dm2").empty().append(m2);
                    }
                    if (m3 > 0) {
                        $("#dm3").empty().append(m3);
                    }
                    if (m4 > 0) {
                        $("#dm4").empty().append(m4);
                    }
                    if (m5 > 0) {
                        $("#dm5").empty().append(m5);
                    }
                    if (m6 > 0) {
                        $("#dm6").empty().append(m6);
                    }
                    if (m7 > 0) {
                        $("#dm7").empty().append(m7);
                    }
                    if (m8 > 0) {
                        $("#dm8").empty().append(m8);
                    }
                    if (m9 > 0) {
                        $("#dm9").empty().append(m9);
                    }
                    if (m10 > 0) {
                        $("#dm10").empty().append(m10);
                    }
                    if (m11 > 0) {
                        $("#dm11").empty().append(m11);
                    }
                    if (m12 > 0) {
                        $("#dm11").empty().append(m12);
                    }
                    categoryChart(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12);
                });
            }
        });



    }


    function categoryChart(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12) {
        var data = [
            ["Jan", m1],
            ["Feb", m2],
            ["Mar", m3],
            ["Apr", m4],
            ["May", m5],
            ["Jun", m6],
            ["Jul", m7],
            ["Aug", m8],
            ["Sep", m9],
            ["Oct", m10],
            ["Nov", m11],
            ["Dec", m12]
        ];

        $.plot("#placeholder", [data], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.3,
                    align: "center",
                }
            },

            xaxis: {
                mode: "categories",
                tickLength: 0,
                tickColor: '#f5f5f5',
            },
            colors: ["#01C0C8", "#83D6DE"],
            labelBoxBorderColor: "red"

        });
    };
    function villGraph2(id,code,year,staff) {
            console.log(id);
            console.log(code);
            console.log(year);
            console.log(staff);
        $("#villGraph").modal("show");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                code : code, 
                year : year,
                staff : staff,
                Mode: "getEvaluationAllCom"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var m1 = val["evaluation_all_month_1"];
                    var m2 = val["evaluation_all_month_2"];
                    var m3 = val["evaluation_all_month_3"];
                    var m4 = val["evaluation_all_month_4"];
                    var m5 = val["evaluation_all_month_5"];
                    var m6 = val["evaluation_all_month_6"];
                    var m7 = val["evaluation_all_month_7"];
                    var m8 = val["evaluation_all_month_8"];
                    var m9 = val["evaluation_all_month_9"];
                    var m10 = val["evaluation_all_month_10"];
                    var m11 = val["evaluation_all_month_11"];
                    var m12 = val["evaluation_all_month_12"];



                    $("#showWeight").val(val["kpi_master_weight"]);
                    $("#showTarget").val(val["kpi_master_target"]);
                    $("#showKpiName").val(val["kpi_master_name"]);
                    if (m1 > 0) {
                        $("#dm1").empty().append(m1);
                    }
                    if (m2 > 0) {
                        $("#dm2").empty().append(m2);
                    }
                    if (m3 > 0) {
                        $("#dm3").empty().append(m3);
                    }
                    if (m4 > 0) {
                        $("#dm4").empty().append(m4);
                    }
                    if (m5 > 0) {
                        $("#dm5").empty().append(m5);
                    }
                    if (m6 > 0) {
                        $("#dm6").empty().append(m6);
                    }
                    if (m7 > 0) {
                        $("#dm7").empty().append(m7);
                    }
                    if (m8 > 0) {
                        $("#dm8").empty().append(m8);
                    }
                    if (m9 > 0) {
                        $("#dm9").empty().append(m9);
                    }
                    if (m10 > 0) {
                        $("#dm10").empty().append(m10);
                    }
                    if (m11 > 0) {
                        $("#dm11").empty().append(m11);
                    }
                    if (m12 > 0) {
                        $("#dm11").empty().append(m12);
                    }
                    categoryChart2(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12);
                });
            }
        });



    }
        function categoryChart2(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12) {
        var data = [
            ["Jan", m1],
            ["Feb", m2],
            ["Mar", m3],
            ["Apr", m4],
            ["May", m5],
            ["Jun", m6],
            ["Jul", m7],
            ["Aug", m8],
            ["Sep", m9],
            ["Oct", m10],
            ["Nov", m11],
            ["Dec", m12]
        ];

        $.plot("#placeholder", [data], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.3,
                    align: "center",
                }
            },

            xaxis: {
                mode: "categories",
                tickLength: 0,
                tickColor: '#f5f5f5',
            },
            colors: ["#01C0C8", "#83D6DE"],
            labelBoxBorderColor: "red"

        });
    };
</script>

</html>