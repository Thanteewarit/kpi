<?php $page="report-kpi"; $ac="report-hospitals-kpi"; session_start();?>
<!DOCTYPE html>
<html lang="en">

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

                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Report kpi </h5>
                                                <h4 class="sub-title"></h4>
<!--
                                                <div class="text-right">
                                                    <div class="col-sm-12 col-xl-12">
                                                        <h4 class="sub-title"></h4>
                                                        <select name="select" class="form-control form-control-danger">
                                                            <option value="opt1">เลือกฝ่ายงาน</option>
                                                            <option value="opt2">Type 2</option>
                                                            <option value="opt3">Type 3</option>
                                                            <option value="opt4">Type 4</option>
                                                            <option value="opt5">Type 5</option>
                                                            <option value="opt6">Type 6</option>
                                                            <option value="opt7">Type 7</option>
                                                            <option value="opt8">Type 8</option>
                                                        </select>
                                                    </div>
                                                </div>
-->
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>ID Staff</th>
                                                                <th>ชื่อ นามสกุล</th>
                                                                <th>โรงพยาบาล</th>
                                                                <th>ตำแหน่ง</th>
                                                                <th>Hospi</th>
                                                                <th>Dev</th>
                                                                <th>MC</th>
                                                                <th>FC</th>
                                                                <th>CC</th>
                                                                <th>Staff</th>
                                                                <th>BHV</th>
                                                                <th>รวม</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php                                               
                                                            $valuei="
                                                            SELECT * 
                                                            FROM tb_evaluation_score as r1
                                                            WHERE r1.evaluation_score_year = '".$_SESSION['time']['year']."' 
                                                            AND r1.evaluation_score_month = '".$_SESSION['time']['month']."'";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ 
                                                                $valuei1="select * from tb_staff AS r1
                                                                JOIN tb_level_position AS r2 ON r1.staff_level_position = r2.level_position_code
                                                                where staff_code='".$r['evaluation_score_staff']."'";
                                                                $arr1=c_scelectOne($valuei1);

                                                                $valuei2="select * from tb_weight_group where weight_group_jobcode='".$arr1['staff_job_code']."'";
                                                                $arr2=c_scelectOne($valuei2);

                                                                $valuei3="select hospital_NameTh from tb_hospital where hospital_id='".$arr1['staff_hospital_id']."'";
                                                                $arr3=c_scelectOne($valuei3);

                                                                $hot    =   $r['evaluation_score_kpi_hospitals']/5*$arr2['weight_group_corpreate'];
                                                                $dev    =   $r['evaluation_score_kpi_department']/5*$arr2['weight_group_departmen'];
                                                                $mc     =   $r['evaluation_score_competency_mc']/5*$arr2['weight_group_mc'];
                                                                $fc     =   $r['evaluation_score_competency_fc']/5*$arr2['weight_group_fc'];
                                                                $cc     =   $r['evaluation_score_competency_cc']/5*$arr2['weight_group_cc'];
                                                                $staff  =   $r['evaluation_score_kpi_staff']/5*$arr2['weight_group_jobkpi'];
                                                                $bhv    =   $r['evaluation_score_kpi_behavior']/5*$arr2['weight_group_attribute'];
                                                                $all    =   $hot+$dev+$mc+$fc+$cc+$staff+$bhv;
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $arr1['staff_code']?></td>
                                                                <td><?php echo $arr1['staff_Name']." ".$arr1['staff_Sername']?></td>
                                                                <td><?php echo $arr3['hospital_NameTh'];?></td>
                                                                <td><?php echo $arr1['level_position_name'];?></td>
                                                                <td><?php echo $hot;?></td>
                                                                <td><?php echo $dev;?></td>
                                                                <td><?php echo $mc; ?></td>
                                                                <td><?php echo $fc; ?></td>
                                                                <td><?php echo $cc;?></td>
                                                                <td><?php echo $staff; ?></td>
                                                                <td><?php echo $bhv ;?></td>
                                                                <td><?php echo $all ;?></td>
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
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
    <!-- data-table js -->
    <script src="../files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="../files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="../files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/jszip.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js"></script>
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script  src="../files/assets/js/script.js"></script>
</body>
<!--
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
-->

</html>