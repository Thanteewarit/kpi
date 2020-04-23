<!DOCTYPE html>
<html lang="en">
<?php $page="kpi"; $ac="job"; session_start(); ?>

<head>
<?php include("inc-header.php")?>
<?php 
$month = $_SESSION['time']['month'];
$year = $_SESSION['time']['year'];
$code = $_GET['code'];  
$staff = cut(TokenVerify($_GET['key'], $secret));
?>
        <?php 
        $valuei = "SELECT *  FROM tb_evaluation_score WHERE evaluation_score_year = '$year' AND evaluation_score_month = '$month' AND evaluation_score_staff = '$staff'";
        $scoreIN=c_scelectOne($valuei);
        ?>
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
    <!--
    <link rel="stylesheet" href="../files/new/jquery-ui.1.10.1.min.css" type="text/css" />
    <link rel="stylesheet" href="../files/new/style.css" type="text/css" />
-->
    <link rel="stylesheet" href="../files/bower_components/c3/css/c3.css" type="text/css" media="all">

</head>
<style>
    .table td,
    .table th {
        padding: 5px;
        vertical-align: top;
        border-top: 1px solid #e9ecef;
    }
</style>

<body onload="sumScoreAll();">
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
                    $valuei="SELECT r1.staff_code, r1.staff_Name, r1.staff_Sername, r2.depatment_head_Name, r3.department_Name, r4.department_work_Name, r5.division_director_Name, r6.division_manager_head_Name, r7.division_manager_sub_Name, r8.hospital_NameTh, r9.director_assistant_Name, r1.staff_job_code, r1.staff_job_description, r1.staff_job_grade, r8.hospital_Code, r4.department_work_Code,  r1.staff_start, r1.staff_end, r10.level_position_name, r11.*
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
JOIN tb_weight_group AS r11 ON r1.staff_job_code = r11.weight_group_jobcode
WHERE r1.staff_code = '$staff' AND r1.staff_status = 'Y'";
                    $r=c_scelectOne($valuei);
                    $weight_hot = $r["weight_group_corpreate"];
                    $weight_dev = $r["weight_group_departmen"];
                    $weight_mc = $r["weight_group_mc"];
                    $weight_fc = $r["weight_group_fc"];
                    $weight_cc = $r["weight_group_cc"];
                    $weight_job = $r["weight_group_jobkpi"];
                    $weight_Bhv = $r["weight_group_attribute"];
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
                                                                                    <th scope="row">รหัสตำแหน่งงาน</th>
                                                                                    <td><?php echo $r['level_position_code'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                    <div class="text-left"><a href="#" onclick="goBack()">
                                                                                                <button type="button" style="margin-top: 20px;" class="btn btn-success alert-confirm m-b-10"><i class="fa fa-mail-reply"></i>ย้อนกลับ</button></a>

                                                                                        </div>
                                                                                        </th>
                                                                                    <td>
                                                                                        
                                                                                    </td>
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
                                                                                    <td><?php echo $r['level_position_name'];?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row"></th>
                                                                                    <td>
                                                                                        <!-- <div class="text-right"><a href="job-kpi-view.php?key=<?php echo $_GET['key']?>" target="_blank">
                                                                                                <button type="button" style="margin-top: 20px;" class="btn btn-primary alert-confirm m-b-10">ดูสรุปภาพรวมทั้งหมด <i class="fa fa-mail-forward"></i></button></a>

                                                                                        </div> -->
                                                                                    </td>
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
                                    
                                    <?php 
                                        $valuei="SELECT *  
                                        FROM tb_evaluation AS r1
                                        JOIN tb_assessment_time AS r2 ON r2.assessment_time_code = r1.evaluation_code  
                                        WHERE r1.evaluation_year = '$year' 
                                        AND r1.evaluation_month  = '$month' 
                                        AND r1.evaluation_id_staff = '$staff'
                                        AND r2.assessment_time_type ='3' "; 
                                    if(ck_numrow($valuei)!=0){ 
                                    ?>
                                    <div class="card" style="padding-bottom:30px;">
                                        <div class="card-header">
                                            <h5 class="card-header-text">Job KPI</h5>
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
                                                    <tbody>

                                                        <?php 
                                                        $valuei = "SELECT * 
                                                        FROM tb_kpi_type AS l1  
                                                        WHERE l1.kpi_types = '1'
                                                        AND (SELECT COUNT(*)
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '$staff'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = l1.kpi_type_id
AND r3.assessment_time_type = '3' ) !='0'
                                                        ";
                                                        foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;"><?php echo $r['kpi_type_name'];?></td>
                                                        </tr>
                                                        <?php 
                                                        $valuei = "SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target, r4.evaluation_id
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
JOIN tb_evaluation AS r4 ON r4.kpi_master_id = r2.kpi_master_id AND r4.evaluation_id_staff = '$staff'
AND r4.evaluation_year = '$year'
AND r4.evaluation_month = '$month'
WHERE r1.evaluation_all_staff = '$staff'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '".$r['kpi_type_id']."'
AND r3.assessment_time_type = '3' ";
                                                        foreach(c_scelectS($valuei) AS $key => $r){
                                                        ?>
                                                        <tr>

                                                            <td><?php echo $r['kpi_master_name']?></td>
                                                            <td><?php echo $r['kpi_master_weight']?></td>
                                                            <td><?php echo $r['kpi_master_target']?></td>
                                                            <td><input type="text" class="form-control k1<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k1'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k2<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k2'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k3<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k3'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k4<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k4'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k5<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k5'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k6<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k6'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k7<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k7'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k8<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k8'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k9<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k9'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k10<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k10'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k11<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k11'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k12<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k12'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>
                                                            <td><input type="text" class="form-control kYtd<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value,<?php echo $r['kpi_master_id']?>,<?php echo $r['evaluation_id']?>);"></td>
                                                            <td><input type="text" class="form-control ks<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" name="ksv[]" value="<?php echo $r['evaluation_all_scor']?>" disabled></td>


                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><button class="btn btn-success btn-round btn-sm" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);">view</button> </td>
                                                        </tr>
                                                        <?php }} ?>





                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5>
                                                                <span id="ks" style="display:inline;"></span> / <?php echo number_format($weight_job,2);?>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                                        <?php }?>
                                    <?php 
                                        $valuei="SELECT *  
                                        FROM tb_evaluation AS r1
                                        JOIN tb_assessment_time AS r2 ON r2.assessment_time_code = r1.evaluation_code  
                                        WHERE r1.evaluation_year = '$year' 
                                        AND r1.evaluation_month  = '$month' 
                                        AND r1.evaluation_id_staff = '$staff'
                                        AND r2.assessment_time_type ='8' "; 
                                    if(ck_numrow($valuei)!=0){ 
                                    ?>
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
                                                    <tbody>

                                                        <?php 
                                                        $valuei = "SELECT * 
                                                        FROM tb_kpi_type AS l1  
                                                        WHERE l1.kpi_types = '1'
                                                        AND (SELECT COUNT(*)
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
WHERE r1.evaluation_all_staff = '$staff'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = l1.kpi_type_id
AND r3.assessment_time_type = '8' ) !='0'
                                                        ";
                                                        foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                        <tr>
                                                            <td colspan="19" style="background-color: #64a6ff70;"><?php echo $r['kpi_type_name'];?></td>
                                                        </tr>
                                                        <?php 
                                                        $valuei = "SELECT r1.* , r2.kpi_master_name, r2.kpi_master_weight, r2.kpi_master_standard_0, r2.kpi_master_standard_1, r2.kpi_masterl_standard_2, r2.kpi_master_standard_3, r2.kpi_master_standard_4, r2.kpi_master_standard_5,r2.kpi_master_target, r4.evaluation_id
FROM tb_evaluation_all AS r1
JOIN tb_kpi_master AS r2 ON r1.kpi_master_id = r2.kpi_master_id
JOIN tb_assessment_time AS r3 ON r3.assessment_time_code = r1.evaluation_code
JOIN tb_evaluation AS r4 ON r4.kpi_master_id = r2.kpi_master_id AND r4.evaluation_id_staff = '$staff'
AND r4.evaluation_year = '$year'
AND r4.evaluation_month = '$month'

WHERE r1.evaluation_all_staff = '$staff'
AND r1.evaluation_all_year = '$year'
AND r2.kpi_type_id = '".$r['kpi_type_id']."'
AND r3.assessment_time_type = '8'";
                                                        foreach(c_scelectS($valuei) AS $key => $r){
                                                        ?>
                                                        <tr>

                                                            <td><?php echo $r['kpi_master_name']?></td>
                                                            <td><?php echo $r['kpi_master_weight']?></td>
                                                            <td><?php echo $r['kpi_master_target']?></td>
                                                            <td><input type="text" class="form-control k1<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_1']?>" <?php if ($month!="01"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k1'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k2<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_2']?>" <?php if ($month!="02"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k2'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k3<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_3']?>" <?php if ($month!="03"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k3'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k4<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_4']?>" <?php if ($month!="04"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k4'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k5<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_5']?>" <?php if ($month!="05"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k5'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k6<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_6']?>" <?php if ($month!="06"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k6'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k7<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_7']?>" <?php if ($month!="07"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k7'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k8<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_8']?>" <?php if ($month!="08"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k8'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k9<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_9']?>" <?php if ($month!="09"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k9'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k10<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_10']?>" <?php if ($month!="10"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k10'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k11<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_11']?>" <?php if ($month!="11"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k11'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>

                                                            <td><input type="text" class="form-control k12<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_month_12']?>" <?php if ($month!="12"){ echo "disabled"; }?> onchange="inPutDate(<?php echo $r["evaluation_type"]?>,<?php echo $r["kpi_master_id"]?>,'k12'+<?php echo $r['evaluation_all_id'];?>,this.value,<?php echo $r['evaluation_all_id'];?>)"></td>
                                                            <td><input type="text" class="form-control kYtd<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" value="<?php echo $r['evaluation_all_YTD']?>" <?php if ($r['evaluation_type']!="3"){ echo "disabled"; }?> onchange="upDateKpiYtd('<?php echo $r['evaluation_all_id']?>',this.value,<?php echo $r['kpi_master_id']?>,<?php echo $r['evaluation_id']?>);"></td>
                                                            <td><input type="text" class="form-control ks<?php echo $r['evaluation_all_id'];?>" style="width: 70px;" name="bsv[]" value="<?php echo $r['evaluation_all_scor']?>" disabled></td>


                                                            <td><i class="icofont icofont-emo-laughing"></i></td>
                                                            <td><button class="btn btn-success btn-round btn-sm" onclick="villGraph(<?php echo $r['evaluation_all_id']?>);">view</button> </td>
                                                        </tr>
                                                        <?php }} ?>





                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5>
                                                                <span id="bs" style="display:inline;"></span> / <?php echo number_format($weight_Bhv,2);?>
                                                            </h5>
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
WHERE r2.competency_master_type = '4'
AND r1.evaluation_competency_year = '$year'
AND r1.evaluation_competency_month = '$month'
AND r1.evaluation_competency_id_staff = '$staff'"; 
                                                                
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
AND r1.evaluation_competency_year = '$year'
AND r1.evaluation_competency_month = '$month'
AND r1.evaluation_competency_id_staff = '$staff') !=0
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
AND r1.evaluation_competency_year = '$year'
AND r1.evaluation_competency_month = '$month'
AND r1.evaluation_competency_id_staff = '$staff'";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>

                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?> <i class="fa fa-question-circle-o btn-warning " onclick="adddetile(<?php echo $r2['competency_master_id']?>)"></i></td>
                                                            <td class="tabledit-edit-mode">
                                                                <select class="tabledit-input form-control input-sm" onchange="upDateCompetency(this.value,'<?echo $r2['evaluation_competency_id']?>','<?echo $r2['competency_master_weight']?>','<?php echo $r2['evaluation_competency_code']?>','MC')">
                                                                    <option value="">กรุณาเลือกคะแนน</option>
                                                                    <?php for($i=1; $i<=5; $i++) { ?>
                                                                    <option value="<?php echo $i?>" <?php if($r2['evaluation_competency_value']==$i ){ echo "selected" ;}?>><?php echo $i;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td class="tabledit-edit-mode">
                                                                <button class="btn btn-success btn-round btn-sm" onclick="villGraph2('<?php echo $r2['competency_master_id']?>','<?php echo $r2['evaluation_competency_code']?>','<?php echo $r2['evaluation_competency_year']?>','<?php echo $r2['evaluation_competency_id_staff']?>');">view</button>
                                                            </td>
                                                        </tr>
                                                        <?php } }?>
                                                        <input id="mc_evaluation" type="hidden" value="<?php echo $r2['evaluation_competency_code'];?>">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5><span id="mcIn" style="display:inline;"></span></h5> 
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
AND r1.evaluation_competency_year = '$year'
AND r1.evaluation_competency_month = '$month'
AND r1.evaluation_competency_id_staff = '$staff'"; 
                                                                
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
AND r1.evaluation_competency_year = '$year'
AND r1.evaluation_competency_month = '$month'
AND r1.evaluation_competency_id_staff = '$staff') !=0
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
AND r2.competency_master_type = '5'
AND r1.evaluation_competency_year = '$year'
AND r1.evaluation_competency_month = '$month'
AND r1.evaluation_competency_id_staff = '$staff'";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ ?>

                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?> <i class="fa fa-question-circle-o btn-warning " onclick="adddetile(<?php echo $r2['competency_master_id']?>)"></i></td>
                                                            <td class="tabledit-edit-mode">
                                                                <select class="tabledit-input form-control input-sm" onchange="upDateCompetency(this.value,'<?echo $r2['evaluation_competency_id']?>','<?echo $r2['competency_master_weight']?>','<?php echo $r2['evaluation_competency_code']?>','FC')">
                                                                    <option value="">กรุณาเลือกคะแนน</option>
                                                                    <?php for($i=1; $i<=5; $i++) { ?>
                                                                    <option value="<?php echo $i?>" <?php if($r2['evaluation_competency_value']==$i ){ echo "selected" ;}?>><?php echo $i;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td class="tabledit-edit-mode">
                                                                <button class="btn btn-success btn-round btn-sm" onclick="villGraph2('<?php echo $r2['competency_master_id']?>','<?php echo $r2['evaluation_competency_code']?>','<?php echo $r2['evaluation_competency_year']?>','<?php echo $r2['evaluation_competency_id_staff']?>');">view</button>
                                                            </td>
                                                        </tr>
                                                        <?php } }?>
                                                        <input id="fc_evaluation" type="hidden" value="<?php echo $r2['evaluation_competency_code'];?>">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5><span id="fcIn" style="display:inline;"></span></h5> 
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
AND r1.evaluation_competency_year = '$year'
AND r1.evaluation_competency_month = '$month'
AND r1.evaluation_competency_id_staff = '$staff'"; 
                                                                
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
AND r1.evaluation_competency_year = '$year'
AND r1.evaluation_competency_month = '$month'
AND r1.evaluation_competency_id_staff = '$staff') !=0
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
AND r1.evaluation_competency_year = '$year'
AND r1.evaluation_competency_month = '$month'
AND r1.evaluation_competency_id_staff = '$staff'";
                                                        foreach(c_scelectS($valuei) AS $key2 => $r2){ 
                                                            
                                                            ?>

                                                        <tr>

                                                            <td> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php echo $key+1?>. <?php echo $key2+1;?> <?php echo $r2['competency_master_name']?> <i class="fa fa-question-circle-o btn-warning " onclick="adddetile(<?php echo $r2['competency_master_id']?>)"></i></td>
                                                            <td class="tabledit-edit-mode">
                                                                <select class="tabledit-input form-control input-sm" onchange="upDateCompetency(this.value,'<?echo $r2['evaluation_competency_id']?>','<?echo $r2['competency_master_weight']?>','<?php echo $r2['evaluation_competency_code']?>','CC')">
                                                                    <option value="">กรุณาเลือกคะแนน</option>
                                                                    <?php for($i=1; $i<=5; $i++) { ?>
                                                                    <option value="<?php echo $i?>" <?php if($r2['evaluation_competency_value']==$i ){ echo "selected" ;}?>><?php echo $i;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td class="tabledit-edit-mode">
                                                            
                                                                <button class="btn btn-success btn-round btn-sm" onclick="villGraph2('<?php echo $r2['competency_master_id']?>','<?php echo $r2['evaluation_competency_code']?>','<?php echo $r2['evaluation_competency_year']?>','<?php echo $r2['evaluation_competency_id_staff']?>');">view</button>
                                                            </td>
                                                        </tr>
                                                        <?php } }
                                                        
                                                        ?>
                                                       <input id="cc_evaluation" type="hidden" value="<?php echo $r2['evaluation_competency_code'];?>">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="card-header">
                                                        <div class="card-header-right" style="margin-right:25px; margin-bottom:30px;">
                                                            <h5><span id="ccIn" style="display:inline;"></span></h5> 
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
                                                            <div class="card col-9" id="chatKpi">

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
                                                                            <div id="k1"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k2"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k3"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k4"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k5"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k6"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k7"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k8"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k9"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k10"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k11"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="k12"></div>
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
                                            <h5 class="modal-title" id="exampleModalLabel">ประเมิน COMPETENCY</h5>
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
                                                            <div class="col-10">
                                                                <div class="card">
                                                                    <div class="card-block">
                                                                        <div id="chart"></div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Name</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="CshowKpiName" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Weight</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="CshowWeight" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Target</label>
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="CshowTarget" readonly>

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
                                                                            <div id="c1"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c2"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c3"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c4"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c5"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c6"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c7"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c8"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c9"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c10"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c11"></div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="c12"></div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--
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
-->
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
    <script src="../files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="../files/assets/pages/chart/float/jquery.flot.pie.js"></script>
    <!-- Custom js -->


    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- c3 chart js -->
    <script src="../files/bower_components/d3/js/d3.min.js"></script>
    <script src="../files/bower_components/c3/js/c3.js"></script>
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

    function inPutDate(type, id, csid, valueIn, evaluation_all_id) {
        
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
                    getScore(val["kpi_master_standard_1"], val["kpi_masterl_standard_2"], val["kpi_master_standard_3"], val["kpi_master_standard_4"], val["kpi_master_standard_5"], val["kpi_master_weight"], id, csid, valueIn, type, evaluation_all_id);


                });
            }
        });
    }

    function getScore(v1, v2, v3, v4, v5, Weight, kpi_master_id, csid, valueIn, typeIn, evaluation_all_id) {
        var csid = $("#csid").val()
        var month = '<?php echo $month;?>';
        var year = '<?php echo $year;?>';
        var idStaff = '<?php echo cut(TokenVerify($_GET['key'], $secret))?>';
        $.ajax({
            url: "../class/class-calculate.php",
            global: false,
            type: "POST",
            data: ({
                id: valueIn,
                Mode: "getScore",
                v1: v1,
                v2: v2,
                v3: v3,
                v4: v4,
                v5: v5,
                month: month,
                year: year,
                idStaff: idStaff,
                Weight: Weight,
                kpi_master_id: kpi_master_id,
                typeIn: typeIn,
                evaluation_all_id: evaluation_all_id
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    $(".kYtd" + evaluation_all_id).val((val["valueAll"]));
                    SumsScore(val["valueAll"], v1, v2, v3, v4, v5, Weight, evaluation_all_id, typeIn);
                });
            }
        });
    }

    function SumsScore(valueIn, v1, v2, v3, v4, v5, Weight, evaluation_all_id, typeIn) {
        
        console.log("นับ Scall");
        $.ajax({
            url: "../class/class-calculate.php",
            global: false,
            type: "POST",
            data: ({
                id: valueIn,
                Mode: "getScore",
                v1: v1,
                v2: v2,
                v3: v3,
                v4: v4,
                v5: v5,
                Weight: Weight,

            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    if (typeIn != 3) {

                        $(".ks" + evaluation_all_id).val(val["scoreAll"]);
                        InSrcore(evaluation_all_id, val["scoreAll"]);
                        sumScoreAll();
                    }
                });
            }
        });
    }

    function sumScoreAll() {

        var scoreIN = '<?php echo $scoreIN['evaluation_score_kpi_staff'];?>';
        var sumValue = 0;
        var weight_job = <?php echo $weight_job;?>;
        var weight_Bhv = <?php echo $weight_Bhv;?>;
        var totle_job = 0;
        $.each($('input[name="ksv[]"]'), function(i, v) {
            if (parseFloat(v.value) >= 0) sumValue += parseFloat(v.value)
        })
        totle_job = (scoreIN/5)*weight_job;
        $("#ks").empty().append(totle_job.toFixed(2));

        var totle_job2 = 0;
        var sumValue2 = 0;
        $.each($('input[name="bsv[]"]'), function(i, v) {
            if (parseFloat(v.value) >= 0) sumValue2 += parseFloat(v.value)
        })
        totle_job2 = (sumValue2/5)*weight_Bhv;
        $("#bs").empty().append(totle_job2.toFixed(2));
        getCompetencyVlues($("#fc_evaluation").val(),'FC');
        getCompetencyVlues($("#mc_evaluation").val(),'MC');
        getCompetencyVlues($("#cc_evaluation").val(),'CC');

    }

    function InSrcore(evaluation_all_id, Srcore,evaluation_id) {
        console.log("===");
        console.log(Srcore);
        console.log(evaluation_id);
        console.log(evaluation_all_id);
        $.ajax({
            url: "../class/class-calculate.php",
            global: false,
            type: "POST",
            data: ({
                evaluation_all_id: evaluation_all_id,
                Mode: "InSrcore",
                evaluation_id : evaluation_id, 
                Srcore: Srcore

            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
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
        var chatKpi = '';
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

                    var mc1 = null;
                    var mc2 = null;
                    var mc3 = null;
                    var mc4 = null;
                    var mc5 = null;
                    var mc6 = null;
                    var mc7 = null;
                    var mc8 = null;
                    var mc9 = null;
                    var mc10 = null;
                    var mc11 = null;
                    var mc12 = null;


                    $("#evaluation_all_YTD").val(val["evaluation_all_YTD"]);
                    $("#showWeight").val(val["kpi_master_weight"]);
                    $("#showTarget").val(val["kpi_master_target"]);
                    $("#showKpiName").val(val["kpi_master_name"]);
                    if (m1 > 0) {
                        $("#k1").empty().append(m1);
                    } else {
                        m1 = null;
                    }
                    if (m2 > 0) {
                        $("#k2").empty().append(m2);
                    } else {
                        m2 = null;
                    }
                    if (m3 > 0) {
                        $("#k3").empty().append(m3);
                    } else {
                        m3 = null;
                    }
                    if (m4 > 0) {
                        $("#k4").empty().append(m4);
                    } else {
                        m4 = null;
                    }
                    if (m5 > 0) {
                        $("#k5").empty().append(m5);
                    } else {
                        m5 = null;
                    }
                    if (m6 > 0) {
                        $("#k6").empty().append(m6);
                    } else {
                        m6 = null;
                    }
                    if (m7 > 0) {
                        $("#k7").empty().append(m7);
                    } else {
                        m7 = null;
                    }
                    if (m8 > 0) {
                        $("#k8").empty().append(m8);
                    } else {
                        m8 = null;
                    }
                    if (m9 > 0) {
                        $("#k9").empty().append(m9);
                    } else {
                        m9 = null;
                    }
                    if (m10 > 0) {
                        $("#k10").empty().append(m10);
                    } else {
                        m10 = null;
                    }
                    if (m11 > 0) {
                        $("#k11").empty().append(m11);
                    } else {
                        m11 = null;
                    }
                    if (m12 > 0) {
                        $("#k12").empty().append(m12);
                    } else {
                        m12 = null;
                    }

                    if (val["evaluation_all_month_ytd1"] > 0) {
                        mc1 = val["evaluation_all_month_ytd1"];
                    }
                    if (val["evaluation_all_month_ytd2"] > 0) {
                        mc2 = val["evaluation_all_month_ytd2"];
                    }
                    if (val["evaluation_all_month_ytd3"] > 0) {
                        mc3 = val["evaluation_all_month_ytd3"];
                    }
                    if (val["evaluation_all_month_ytd4"] > 0) {
                        mc4 = val["evaluation_all_month_ytd4"];
                    }
                    if (val["evaluation_all_month_ytd5"] > 0) {
                        mc5 = val["evaluation_all_month_ytd5"];
                    }
                    if (val["evaluation_all_month_ytd6"] > 0) {
                        mc6 = val["evaluation_all_month_ytd6"];
                    }
                    if (val["evaluation_all_month_ytd7"] > 0) {
                        mc7 = val["evaluation_all_month_ytd7"];
                    }
                    if (val["evaluation_all_month_ytd8"] > 0) {
                        mc8 = val["evaluation_all_month_ytd8"];
                    }
                    if (val["evaluation_all_month_ytd9"] > 0) {
                        mc9 = val["evaluation_all_month_ytd9"];
                    }
                    if (val["evaluation_all_month_ytd10"] > 0) {
                        mc10 = val["evaluation_all_month_ytd10"];
                    }
                    if (val["evaluation_all_month_ytd11"] > 0) {
                        mc11 = val["evaluation_all_month_ytd11"];
                    }
                    if (val["evaluation_all_month_ytd12"] > 0) {
                        mc12 = val["evaluation_all_month_ytd12"];
                    }

                    if (val["kpi_master_in_type"] != 1) {
                        chatKpi += '<div class="card-block"><div id="chart_Combo" style="width: 100%; height: 200px;"></div></div>';
                        $("#chatKpi").empty().append(chatKpi);
                        drawVisualization(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12, val["kpi_master_target"]);
                    } else {
                        chatKpi += '<div class="card-block"><div id="chart_Combo1" style="width: 100%; height: 200px;"></div></div>';
                        $("#chatKpi").empty().append(chatKpi);
                        lineChart1(val["kpi_master_target"], m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12);
                    }
                });
            }
        });



    }

    function villGraph2(id, code, year, staff) {
        $("#villGraph2").modal("show");

        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                code: code,
                year: year,
                staff: staff,
                Mode: "getEvaluationAllCom"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var m1 = val["evaluation_competency_value_1"];
                    var m2 = val["evaluation_competency_value_2"];
                    var m3 = val["evaluation_competency_value_3"];
                    var m4 = val["evaluation_competency_value_4"];
                    var m5 = val["evaluation_competency_value_5"];
                    var m6 = val["evaluation_competency_value_6"];
                    var m7 = val["evaluation_competency_value_7"];
                    var m8 = val["evaluation_competency_value_8"];
                    var m9 = val["evaluation_competency_value_9"];
                    var m10 = val["evaluation_competency_value_10"];
                    var m11 = val["evaluation_competency_value_11"];
                    var m12 = val["evaluation_competency_value_12"];



                    $("#CshowWeight").val(val["kpi_master_weight"]);
                    $("#CshowTarget").val(val["kpi_master_target"]);
                    $("#CshowKpiName").val(val["kpi_master_name"]);
                    if (m1 > 0) {
                        $("#c1").empty().append(m1);
                    } else {
                        m1 = null;
                    }
                    if (m2 > 0) {
                        $("#c2").empty().append(m2);
                    } else {
                        m2 = null;
                    }
                    if (m3 > 0) {
                        $("#c3").empty().append(m3);
                    } else {
                        m3 = null;
                    }
                    if (m4 > 0) {
                        $("#c4").empty().append(m4);
                    } else {
                        m4 = null;
                    }
                    if (m5 > 0) {
                        $("#c5").empty().append(m5);
                    } else {
                        m5 = null;
                    }
                    if (m6 > 0) {
                        $("#c6").empty().append(m6);
                    } else {
                        m6 = null;
                    }
                    if (m7 > 0) {
                        $("#c7").empty().append(m7);
                    } else {
                        m7 = null;
                    }
                    if (m8 > 0) {
                        $("#c8").empty().append(m8);
                    } else {
                        m8 = null;
                    }
                    if (m9 > 0) {
                        $("#c9").empty().append(m9);
                    } else {
                        m9 = null;
                    }
                    if (m10 > 0) {
                        $("#c10").empty().append(m10);
                    } else {
                        m10 = null;
                    }
                    if (m11 > 0) {
                        $("#c11").empty().append(m11);
                    } else {
                        m11 = null;
                    }
                    if (m12 > 0) {
                        $("#c12").empty().append(m12);
                    } else {
                        m12 = null;
                    }
                    //lineChart(val["kpi_master_target"],m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12);
                    drawVisualization2(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12, val["kpi_master_target"]);
                });
            }
        });



    }

    function lineChart1(Target, m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12) {
        var chart = c3.generate({
            bindto: '#chart_Combo1',
            size: {
                height: 240,
                width: 500
            },
            data: {
                columns: [
                    ['คะแนน', 0, m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12],
                    ['มาตรฐาน', Target, Target, Target, Target, Target, Target, Target, Target, Target, Target, Target, Target, Target, Target]
                ],

                colors: {
                    data1: '#0000ff',
                    data2: '#ff0000'
                }
            }
        });
    }

    function upDateCompetency(vlusee, id, weight,competency_code,Facter) {
        
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
            success: function(jd) {
                getCompetencyVlues(competency_code,Facter);
            }
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

    function sumScore(valueAll) {
    }

    function GetLevel(id, YTD,kpi_master_id,evaluation_id) {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: kpi_master_id,
                Mode: "getKpiMasterHesd"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    getScoreInscore(val["kpi_master_standard_1"], val["kpi_masterl_standard_2"], val["kpi_master_standard_3"], val["kpi_master_standard_4"], val["kpi_master_standard_5"], YTD, val["kpi_master_weight"], id,evaluation_id)
                    

                });
            }
        });
    }

    function getScoreInscore(v1, v2, v3, v4, v5, id, Weight, evaluation_all_id,evaluation_id) {
        $.ajax({
            url: "../class/class-calculate.php",
            global: false,
            type: "POST",
            data: ({
                Mode: "getScoreInscore",
                id: id,
                v1: v1,
                v2: v2,
                v3: v3,
                v4: v4,
                v5: v5,
                Weight: Weight
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    console.log("00");
                    console.log(val["scoreAll"]);
                    console.log(val["valueIn"]);
                    $(".ks" + evaluation_all_id).val(val["scoreAll"]);
                    InSrcore(evaluation_all_id, val["scoreAll"],evaluation_id);
                    sumScoreAll();
                });
            }
        });
    }
    function getCompetencyVlues(competency_code,Facter) {

        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                Mode: "getCompetencyVlues",
                competency_code: competency_code, 
                month : '<?php echo $month;?>' ,
                year : '<?php echo $year;?>' ,
                staffId : '<?php echo $staff;?>',
                weight_fc : '<?php echo $weight_fc;?>',
                weight_mc : '<?php echo $weight_mc;?>',
                weight_cc : '<?php echo $weight_cc;?>',
                Facter : Facter
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                     if(Facter=="MC")
                     {
                         $("#mcIn").empty().append(val["vluesIn"].toFixed(2)+' / '+val["VluesTarget"]);
                     }
                     if(Facter=="FC")
                     {
                         $("#fcIn").empty().append(val["vluesIn"].toFixed(2)+' / '+val["VluesTarget"]);
                     }
                     if(Facter=="CC")
                     {
                         $("#ccIn").empty().append(val["vluesIn"].toFixed(2)+' / '+val["VluesTarget"]);
                     }
                    

                });
            }
        });
    }

    function upDateKpiYtd(id, YTD, kpi_master_id,evaluation_id) {
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

                    GetLevel(id, YTD,kpi_master_id,evaluation_id);
                });
            }
        });
    }

    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12,st) {

       var st = parseInt(st);
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
            width: 500,
            height: 200,
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

    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawVisualization2);

    function drawVisualization2(m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12,st) {

        var st = parseInt(st);
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
            width: 500,
            height: 200,
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

        var chart = new google.visualization.ComboChart(document.getElementById('chart'));
        chart.draw(data, options);
    }
</script>
<script>
function goBack() {
  window.history.back();
}
</script>

</html>