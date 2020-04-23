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
    <link rel="stylesheet" href="../files/bower_components/nvd3/css/nv.d3.css" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/component.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../files/new/jquery-ui.1.10.1.min.css" type="text/css" />
    <link rel="stylesheet" href="../files/new/style.css" type="text/css" />

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
                                    <?php 
                    $valuei="
                                                            SELECT r1.staff_code, r1.staff_Name, r1.staff_Sername, r2.depatment_head_Name, r3.department_Name, r4.department_work_Name, r5.division_director_Name, r6.division_manager_head_Name, r7.division_manager_sub_Name, r8.hospital_NameTh, r9.director_assistant_Name, r1.staff_job_code, r1.staff_job_description, r1.staff_job_grade, r8.hospital_Code, r4.department_work_Code,  r1.staff_start, r1.staff_end, r10.level_position_name
FROM tb_staff AS r1 
LEFT JOIN tb_depatment_head AS r2 ON r2.depatment_head_id = r1.staff_depatment_head_id
LEFT JOIN tb_department AS r3 ON r3.department_id = r1.staff_department_id
LEFT JOIN tb_department_work AS r4 ON r4.department_work_id = r1.staff_department_work_id
LEFT JOIN tb_division_director AS r5 ON r5.division_director_id = r1.staff_division_director_id
LEFT JOIN tb_division_manager_head AS r6 ON r6.division_manager_head_id = r1.staff_division_manager_head_id
LEFT JOIN tb_division_manager_sub AS r7 ON r7.division_manager_sub_id = r1.staff_division_manager_sub_id
LEFT JOIN tb_hospital AS r8 ON r8.hospital_id = r1.staff_hospital_id
LEFT JOIN tb_hospital_director_assistant AS r9 ON r9.director_assistant_id = r1.staff_director_assistant_id
LEFT JOIN tb_level_position AS r10 ON r10.level_position_code = r1.staff_level_position
WHERE r1.staff_code = '".cut(TokenVerify($_GET['key'], $secret))."' AND r1.staff_status = 'Y'";
                    $r=c_scelectOne($valuei);
                    ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-header-text">ข้อมูลส่วนตัว </h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">โรงพยาบาล</th>
                                                                                    <td><?php echo $r['hospital_NameTh']?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ชื่อย่อของโรงพยาบาล</th>
                                                                                    <td><?php echo $r['hospital_Code'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ฝ่าย</th>
                                                                                    <td><?php echo $r['department_Name'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ชื่อแผนก</th>
                                                                                    <td><?php echo $r['department_work_Name'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ชื่อย่อแผนก</th>
                                                                                    <td><?php echo $r['department_work_Code'];?></td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end of table col-lg-6 -->
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tbody>

                                                                                <tr>
                                                                                    <th scope="row">รหัสพนักงาน</th>
                                                                                    <td><a href="#!"><?php echo  $r['staff_code']?></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ชื่อ</th>
                                                                                    <td><?php echo $r['staff_Name']?> - <?php echo $r['staff_Sername']?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">สายงาน</th>
                                                                                    <td><?php echo $r['depatment_head_Name']?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">ตำแหน่งงาน</th>
                                                                                    <td><?php echo $r['hospital_Code'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">รหัสแผนก</th>
                                                                                    <td><?php echo $r['hospital_Code'];?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>



                                                                <!-- end of table col-lg-6 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end of row -->
                                            </div>
                                        </div>
                                        <!-- end of card-block -->
                                    </div>
                                    <div class="card" style="padding-bottom:30px;">
                                        <div class="card-header">
                                            <h5 class="card-header-text">Staff KPI</h5>
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
                                                        $linkGet="?key=";
                                                        ?>
                                                    <tbody>
                                                        <?php 
                                                            $month = $_SESSION['time']['month'];
                                                            $year = $_SESSION['time']['year'];
                                                            $code = $_GET['code'];
                                                            $valuei="SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '".cut(TokenVerify($_GET['key'], $secret))."'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '2'
AND r3.assessment_time_type = '3' 
"; ?>
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
                                                            <td><input type="text" class="form-control am1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am1'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am2'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am3'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am4'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am5'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am6'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am7'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am8'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am9'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am10'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am11'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control am12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'am12'+<?php echo $key;?>)"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value);"></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php 
                                                                 $valuei="SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '".cut(TokenVerify($_GET['key'], $secret))."'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '3'
AND r3.assessment_time_type = '3'";  
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
                                                            <td><input type="text" class="form-control bm1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm1'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm2'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm3'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm4'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm5'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm6'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm7'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm8'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm9'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm10'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm11'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bm12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bm12'+<?php echo $key;?>)"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value);"></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                            <!--                                                                <td><a href="hospitals-kpi-chart.php?key=<?php  echo TokenGen($r['evaluation_all_id'], $secret)?>" target="_blank"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>-->
                                                        </tr>
                                                        <?php }?>
                                                        <?php 
                                                                 $valuei="SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '".cut(TokenVerify($_GET['key'], $secret))."'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '4'
AND r3.assessment_time_type = '3'";  
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
                                                            <td><input type="text" class="form-control cm1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm1'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm2'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm3'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm4'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm5'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm6'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm7'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm8'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm9'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm10'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm11'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cm12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cm12'+<?php echo $key;?>)"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value);"></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php 
                                                                 $valuei="SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '".cut(TokenVerify($_GET['key'], $secret))."'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '5'
AND r3.assessment_time_type = '3'";  
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
                                                            <td><input type="text" class="form-control dm1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm1'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm2'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm3'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm4'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm5'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm6'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm7'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm8'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm9'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm10'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm11'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dm12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dm12'+<?php echo $key;?>)"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value);"></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5>4.50 / 5.00</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="card" style="padding-bottom:30px;">
                                        <div class="card-header">
                                            <h5 class="card-header-text">Behavior KPI</h5>
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
                                                        $linkGet="?key=";
                                                        ?>
                                                    <tbody>
                                                        <?php 
                                                            $month = $_SESSION['time']['month'];
                                                            $year = $_SESSION['time']['year'];
                                                            $code = $_GET['code'];
                                                            $valuei="SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '".cut(TokenVerify($_GET['key'], $secret))."'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '12'
AND r3.assessment_time_type = '8'
"; ?>
                                                        <?php if (ck_numrow($valuei)!=0) { ?>
                                                        <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Disciplinary</td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php
                                                            
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr>

                                                            <td><?php echo $r['kpi_master_name']?></td>
                                                            <td><?php echo $r['kpi_master_weight']?></td>
                                                            <td><?php echo $r['kpi_master_target']?></td>
                                                            <td><input type="text" class="form-control amb1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb1'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb2'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb3'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb4'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb5'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb6'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb7'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb8'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb9'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb10'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb11'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control amb12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'amb12'+<?php echo $key;?>)"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value);"></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php 
                                                                 $valuei="SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '".cut(TokenVerify($_GET['key'], $secret))."'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '11'
AND r3.assessment_time_type = '8'";  
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
                                                            <td><input type="text" class="form-control bmb1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb1'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb2'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb3'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb4'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb5'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb6'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb7'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb8'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb9'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb10'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb11'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control bmb12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'bmb12'+<?php echo $key;?>)"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value);"></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                            <!--                                                                <td><a href="hospitals-kpi-chart.php?key=<?php  echo TokenGen($r['evaluation_all_id'], $secret)?>" target="_blank"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>-->
                                                        </tr>
                                                        <?php }?>
                                                        <?php 
                                                                 $valuei="SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '".cut(TokenVerify($_GET['key'], $secret))."'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '13'
AND r3.assessment_time_type = '8'";  
                                                                ?>
                                                        <?php if (ck_numrow($valuei)!=0) { ?>
                                                        <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;">Attribute</td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr>

                                                            <td><?php echo $r['kpi_master_name']?></td>
                                                            <td><?php echo $r['kpi_master_weight']?></td>
                                                            <td><?php echo $r['kpi_master_target']?></td>
                                                            <td><input type="text" class="form-control cmb1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb1'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb2'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb3'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb4'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb5'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb6'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb7'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb8'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb9'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb10'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb11'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control cmb12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'cmb12'+<?php echo $key;?>)"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value);"></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                        <?php 
                                                                 $valuei="SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '".cut(TokenVerify($_GET['key'], $secret))."'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '5'
AND r3.assessment_time_type = '8'";  
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
                                                            <td><input type="text" class="form-control dmb1<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn1'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn2<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn2'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn3<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn3'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn4<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn4'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn5<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn5'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn6<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn6'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn7<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn7'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn8<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn8'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn9<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn9'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn10<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn10'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn11<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn11'+<?php echo $key;?>)"></td>

                                                            <td><input type="text" class="form-control dmn12<?php echo $key;?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onClick="showmr(<?php echo $r["kpi_master_id"]?>,'dmn12'+<?php echo $key;?>)"></td>
                                                            <td><input type="text" class="form-control" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value);"></td>
                                                            <td></td>
                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><a href="#" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a> </td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5>4.50 / 5.00</h5>
                                                        </div>
                                                    </div>
                                                </div>
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
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."'"; 
                                                                
                             if(ck_numrow($valuei)!=0){ 
                                                                ?>
                                    <div class="card" style="padding-bottom:30px;">


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
                                                        FROM tb_kpi_type AS l1  
                                                        WHERE l1.kpi_types = '2'
                                                        AND (SELECT COUNT(*)
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.kpi_type_id  = l1.kpi_type_id
AND r2.competency_master_type = '4'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."') !=0
                                                        ";
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
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."'";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>

                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?> <i class="fa fa-question-circle-o btn-warning " onclick="adddetile(<?php echo $r2['competency_master_id']?>)"></i></td>
                                                            <td class="tabledit-edit-mode">
                                                                <select class="tabledit-input form-control input-sm" onchange="upDateCompetency(this.value,'<?echo $r2['evaluation_competency_id']?>','<?echo $r2['competency_master_weight']?>')">
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
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5>4.50 / 5.00</h5>
                                                        </div>
                                                    </div>
                                                </div>
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
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."'"; 
                                                                
                             if(ck_numrow($valuei)!=0){ 
                                                                ?>
                                    <div class="card" style="padding-bottom:30px;">


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
                                                        FROM tb_kpi_type AS l1  
                                                        WHERE l1.kpi_types = '2'
                                                        AND (SELECT COUNT(*)
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.kpi_type_id  = l1.kpi_type_id
AND r2.competency_master_type = '5'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."') !=0
                                                        ";
                                                        foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr style="background: #2a97a5;">
                                                            <td><?php echo ($key+1)." . ".$r['kpi_type_name'];?></td>
                                                            <td> <?php //echo $r['ap_weight']?></td>
                                                            <td> <?php //echo $r['ap_weight']?></td>
                                                        </tr>

                                                        <?php 
                                                        $valuei = "SELECT * , COUNT(*) AS ddf
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.kpi_type_id  = '".$r['kpi_type_id']."' 
AND r2.competency_master_type = '5'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."'";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>

                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?> <i class="fa fa-question-circle-o btn-warning " onclick="adddetile(<?php echo $r2['competency_master_id']?>)"></i></td>
                                                            <td class="tabledit-edit-mode">
                                                                <select class="tabledit-input form-control input-sm" onchange="upDateCompetency(this.value,'<?echo $r2['evaluation_competency_id']?>','<?echo $r2['competency_master_weight']?>')">
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
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5>4.50 / 5.00</h5>
                                                        </div>
                                                    </div>
                                                </div>
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
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."'"; 
                                                                
                             if(ck_numrow($valuei)!=0){ 
                                                                ?>
                                    <div class="card" style="padding-bottom:30px;">


                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="new-cons2" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="no-sort">Core Competency</th>
                                                            <th class="no-sort">ประเมิน</th>
                                                            <th class="no-sort">View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $valuei = "SELECT * 
                                                        FROM tb_kpi_type AS l1  
                                                        WHERE l1.kpi_types = '2'
                                                        AND (SELECT COUNT(*)
FROM tb_evaluation_competency AS r1 
JOIN tb_competency_master AS r2 ON r1.competency_master_id = r2.competency_master_id
WHERE r2.kpi_type_id  = l1.kpi_type_id
AND r2.competency_master_type = '6'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."') !=0
                                                        ";
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
AND r1.evaluation_competency_id_staff = '".cut(TokenVerify($_GET['key'], $secret))."'";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>

                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?> <i class="fa fa-question-circle-o btn-warning " onclick="adddetile(<?php echo $r2['competency_master_id']?>)"></i></td>
                                                            <td class="tabledit-edit-mode">
                                                                <select class="tabledit-input form-control input-sm" onchange="upDateCompetency(this.value,'<?echo $r2['evaluation_competency_id']?>','<?echo $r2['competency_master_weight']?>')">
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
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5>4.50 / 5.00</h5>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                            <label class="col-2 col-form-label"></label>
                                                            <div class="card col-8">
                                                                <div class="card-block">
                                                                    <div id="chart_Combo" style="width: 100%; height: 200px;"></div>
                                                                </div>
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
                                                                <input type="text" class="form-control" id="evaluation_all_YTD" readonly>

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
                            <div class="modal fade" id="villGraph2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 90%;">
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


                                                        <div class="col-md-12 col-lg-9">
                                                            <div class="card">
                                                                <div class="card-block">
                                                                    <div id="linechart" class="nvd-chart" style="width: 100%; height: 300px;"></div>
                                                                </div>
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
                                                                <input type="text" class="form-control" id="evaluation_all_YTD" readonly>

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
                            <div class="modal fade" id="modal_add_comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 100px;">
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
                                                    <div class="col-7">
                                                        <div class="card" style="margin-bottom: 0px;">
                                                            <div class="card-block">
                                                                <!--
                                                                <div class="form-group row">
                                                                    <label class="col-12 col-form-label text-center">รายละเอียด</label>
                                                                </div>
-->
                                                                <div class="form-group row">
                                                                    <label class="col-3 col-form-label">KPI Name</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" name="kpi_master_name" id="kpi_master_name" readonly>
                                                                        <input type="hidden" class="form-control" id="kpi_master_id">

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-3 col-form-label">Weight</label>
                                                                    <div class="col-9">
                                                                        <input type="number" class="form-control" id="kpi_master_weight" readonly>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-3 col-form-label">Target </label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" name="kpi_master_target" id="kpi_master_target" readonly>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row input-group-primary">
                                                                    <label class="col-3 col-form-label">ใส่คะแนน</label>
                                                                    <div class="col-9">
                                                                        <input type="number" class="form-control fogr" id="evaluation_value" onkeyup="getScore()" required>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-3 col-form-label">คะแนน จริง</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" id="evaluation_total_score" readonly>
                                                                        <input type="hidden" class="form-control" id="csid" readonly>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-3 col-form-label">ตามสัดส่วน</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" id="evaluation_total" readonly>

                                                                    </div>
                                                                </div>
                                                                <!--
                                                                <div class="form-group row">
                                                                    <label class="col-3 col-form-label"></label>
                                                                    <div class="col-9">
                                                                        <input type="button" class="btn btn-primary close" data-dismiss="modal" aria-label="Close" value="Save">

                                                                    </div>
                                                                </div>
-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="card" style="background-color: #57a2f7; margin-bottom: 0px;">
                                                            <div class="card-block">
                                                                <div class="form-group row">
                                                                    <label class="col-12 col-form-label text-center">ค่ามาตรฐานการให้คะแนน</label>
                                                                </div>
                                                                <!--
                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label">คะแนน 0</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control" id="kpi_master_standard_0" readonly>

                                                                    </div>
                                                                </div>
-->
                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label">คะแนน 1</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control" id="kpi_master_standard_1" readonly>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label">คะแนน 2</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control" id="kpi_masterl_standard_2" readonly>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label">คะแนน 3</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control" id="kpi_master_standard_3" readonly>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label">คะแนน 4</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control" id="kpi_master_standard_4" readonly>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label">คะแนน 5</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control" id="kpi_master_standard_5" readonly>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="modal fade" id="adddetile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 100px;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header pt-2 pb-2 btnh_primary">
                                            <h5 class="modal-title" id="exampleModalLabel">คำอะธิบาย</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-block" id="contents">
                                                <form class="md-float-material" action="../class/sql-insert.php" method="post">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card" style="margin-bottom: 0px;">
                                                                <div class="card-block">

                                                                    <div class="form-group row">

                                                                        <div class="col-sm-12">
                                                                            <input type="text" class="form-control" id="ccksss" value="" required readonly>
                                                                            <input type="hidden" class="form-control" name="competency_master_id" id="competency_master_id" required readonly>

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-12">
                                                                            <p id="appens"></p>

                                                                        </div>
                                                                    </div>
                                                                    <br>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

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
<!--
    <script src="../files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.pie.js"></script>
-->
    <!-- Custom js -->


    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- NVD3 chart -->
    <script src="../files/bower_components/d3/js/d3.js"></script>
    <script src="../files/bower_components/nvd3/js/nv.d3.js"></script>
    <script src="../files/assets/pages/chart/nv-chart/js/stream_layers.js"></script>
    <!-- Custom js -->
<!--    <script src="../files/assets/pages/chart/nvd3/chart-nvd3.js"></script>-->
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
                    $("." + csid).val((val["score"]));

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
        console.log("ok");
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



                    $("#evaluation_all_YTD").val(val["evaluation_all_YTD"]);
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
                    //categoryChart(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12);

                    drawVisualization(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12, '3');
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

    function villGraph2(id, code, year, staff) {
        $("#villGraph2").modal("show");
        villGraph2Ch();
//        $.ajax({
//            url: "../class/class.php",
//            global: false,
//            type: "POST",
//            data: ({
//                id: id,
//                code: code,
//                year: year,
//                staff: staff,
//                Mode: "getEvaluationAllCom"
//            }),
//            dataType: "JSON",
//            async: false,
//            success: function(jd) {
//                $.each(jd, function(key, val) {
//
//                    var m1 = val["evaluation_all_month_1"];
//                    var m2 = val["evaluation_all_month_2"];
//                    var m3 = val["evaluation_all_month_3"];
//                    var m4 = val["evaluation_all_month_4"];
//                    var m5 = val["evaluation_all_month_5"];
//                    var m6 = val["evaluation_all_month_6"];
//                    var m7 = val["evaluation_all_month_7"];
//                    var m8 = val["evaluation_all_month_8"];
//                    var m9 = val["evaluation_all_month_9"];
//                    var m10 = val["evaluation_all_month_10"];
//                    var m11 = val["evaluation_all_month_11"];
//                    var m12 = val["evaluation_all_month_12"];
//
//
//
//                    $("#showWeight").val(val["kpi_master_weight"]);
//                    $("#showTarget").val(val["kpi_master_target"]);
//                    $("#showKpiName").val(val["kpi_master_name"]);
//                    if (m1 > 0) {
//                        $("#dm1").empty().append(m1);
//                    }
//                    if (m2 > 0) {
//                        $("#dm2").empty().append(m2);
//                    }
//                    if (m3 > 0) {
//                        $("#dm3").empty().append(m3);
//                    }
//                    if (m4 > 0) {
//                        $("#dm4").empty().append(m4);
//                    }
//                    if (m5 > 0) {
//                        $("#dm5").empty().append(m5);
//                    }
//                    if (m6 > 0) {
//                        $("#dm6").empty().append(m6);
//                    }
//                    if (m7 > 0) {
//                        $("#dm7").empty().append(m7);
//                    }
//                    if (m8 > 0) {
//                        $("#dm8").empty().append(m8);
//                    }
//                    if (m9 > 0) {
//                        $("#dm9").empty().append(m9);
//                    }
//                    if (m10 > 0) {
//                        $("#dm10").empty().append(m10);
//                    }
//                    if (m11 > 0) {
//                        $("#dm11").empty().append(m11);
//                    }
//                    if (m12 > 0) {
//                        $("#dm11").empty().append(m12);
//                    }
//                    categoryChart2(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12);
//                });
//            }
//        });



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
    function villGraph2Ch() {
        nv.addGraph(function() {
        var chart = nv.models.lineChart()
            .margin({ top: 50 })
            .margin({ left: 100 }) //Adjust chart margins to give the x-axis some breathing room.
            .useInteractiveGuideline(true) //We want nice looking tooltips and a guideline!
            .showLegend(true) //Show the legend, allowing users to turn on/off line series.
            .showYAxis(true) //Show the y-axis
            .showXAxis(true) //Show the x-axis
        ;

        chart.xAxis //Chart x-axis settings
            .axisLabel('Time (ms)')
            .tickFormat(d3.format(',r'));

        chart.yAxis //Chart y-axis settings
            .axisLabel('Voltage (v)')
            .tickFormat(d3.format('.02f'));

        /* Done setting the chart up? Time to render it!*/
        var myData = sinAndCos(); //You need data...

        d3.select('#linechart').append('svg') //Select the <svg> element you want to render the chart in.
            .datum(myData) //Populate the <svg> element with chart data...
            .call(chart); //Finally, render the chart!

        //Update the chart when window resizes.
        nv.utils.windowResize(function() { chart.update() });
        return chart;
    });
    /**************************************
     * Simple test data generator
     */
    function sinAndCos() {
        var sin = [],
            sin2 = [],
            cos = [];

        //Data is represented as an array of {x,y} pairs.
//        for (var i = 0; i < 100; i++) {
//            sin.push({ x: i, y: Math.sin(i / 10) });
//            sin2.push({ x: i, y: Math.sin(i / 10) * 0.25 + 0.5 });
//            cos.push({ x: i, y: .5 * Math.cos(i / 10) });
//        }
        cos.push({ x: 0, y: 3},{ x: 1, y:3 },{ x: 2, y:3 },{ x: 3, y:3 },{ x: 4, y:3 },{ x: 5, y:3 },{ x: 6, y:3 },{ x: 7, y:3 },{ x: 8, y:3 },{ x: 9, y:3 },{ x: 10, y:3 },{ x: 11, y:3 },{ x: 12, y:3 });
        
        sin.push({ x: 0, y: -3},{ x: 1, y:6 },{ x: 2, y:7 },{ x: 3, y:8 },{ x: 4, y:9 },{ x: 5, y:1 },{ x: 6, y:5 });
        
//        sin2.push({ x: 0, y: 5},{ x: 1, y:4 },{ x: 2, y:3 },{ x: 3, y:1 },{ x: 4, y:5 },{ x: 5, y:5 },{ x: 6, y:5 },{ x: 7, y:5 },{ x: 8, y:5 },{ x: 9, y:5 },{ x: 10, y:5 },{ x: 11, y:5 },{ x: 12, y:3 });

        //Line chart data should be sent as an array of series objects.
        return [{
            values: sin, //values - represents the array of {x,y} data points
            key: 'Sine Wave', //key  - the name of the series.
            color: '#003808' //color - optional: choose your own line color.
        }, {
            values: cos,
            key: 'Cosine Wave',
            color: '#ce0022'
        }
//                , {
//            values: sin2,
//            key: 'Another sine wave',
//            color: '#FF9F55',
//            area: true //area - set to true if you want this line to turn into a filled area chart.
//        }
               ];
    }

    };

    function upDateCompetency(vlusee, id, weight) {

        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                vlusee: vlusee,
                weight: weight,
                Mode: "upDateCompetency"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {}
        });



    }

    function adddetile(id) {



        $("#adddetile").modal("show");


        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "get_master"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    document.getElementById("ccksss").value = val["name"];
                    $("#appens").empty().append(val["example"]);


                });
            }
        });
    }

    function upDateKpiYtd(id, YTD) {

        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                YTD: YTD,
                Mode: "upDateKpiYtd"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    if (val["st"] == "ok") {
                        console.log("บันทึกข้อมูลเรียบร้อยคัรบ");
                    }


                });
            }
        });
    }
    //Combo chart
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12) {
        var st = 4;
        console.log(m1);
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Score', 'Target'],
            ['01', parseInt(m1), parseInt(st)],
            ['02', parseInt(m2), parseInt(st)],
            ['03', parseInt(m3), parseInt(st)],
            ['04', parseInt(m4), parseInt(st)],
            ['05', parseInt(m5), parseInt(st)],
            ['06', parseInt(m6), parseInt(st)],
            ['07', parseInt(m7), parseInt(st)],
            ['08', parseInt(m8), parseInt(st)],
            ['09', parseInt(m9), parseInt(st)],
            ['10', parseInt(m10), parseInt(st)],
            ['11', parseInt(m11), parseInt(st)],
            ['12', parseInt(m12), parseInt(st)]
        ]);

        var options = {
            title: 'Monthly Coffee Production by Country',
            vAxis: {
                title: 'Score'
            },
            hAxis: {
                title: 'Month'
            },
            seriesType: 'bars',
            series: {
                1: {
                    type: 'line'
                }
            },
            colors: ['#93BE52', '#FC6180']
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_Combo'));
        chart.draw(data, options);
    }
</script>

</html>