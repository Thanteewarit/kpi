<?php $page="list-kpi"; $ac="list-behavior-kpi-all"; session_start();?>  
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

<body >
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
                                                        <h5>รายชื่อผู้ประเมิน</h5>
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
                                                            <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>แผนก</th>
                                                                        <th>แผนกย่อย</th>
                                                                        <th>คะแนน</th>
                                                                        <th>ประเมิน</th>
                                                                        <th>จบการประเมิน</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php                                               
                                                            $valuei="
SELECT r1.evaluation_code, r1.evaluation_id_staff, r3.staff_Name, r3.staff_Sername , r4.division_manager_sub_Name, r5.depatment_head_Name, r2.assessment_time_name,r4.division_manager_sub_id,
((COUNT(r4.division_manager_sub_id) * (SELECT SUM(evaluation_total_score) FROM tb_evaluation WHERE evaluation_code = r1.evaluation_code AND evaluation_year = r1.evaluation_year AND evaluation_month = r1.evaluation_month AND evaluation_id_staff = r1.evaluation_id_staff ))/100) AS ifSum
FROM tb_evaluation AS r1
JOIN tb_assessment_time AS r2 ON r1.evaluation_code = r2.assessment_time_code
JOIN tb_staff AS r3 ON r1.evaluation_id_staff = r3.staff_code
LEFT JOIN tb_division_manager_sub AS r4 ON r3.staff_division_manager_sub_id = r4.division_manager_sub_id
LEFT JOIN tb_depatment_head AS r5 ON r3.staff_depatment_head_id = r5.depatment_head_id
WHERE r2.assessment_time_type = '8' 
AND r1.evaluation_id_head = '".$_SESSION['staff']['code']."'
AND r1.evaluation_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_status = 'N'
GROUP BY r3.staff_division_manager_sub_id
ORDER BY evaluation_code ASC";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                    <tr>
                                                                        <td><?php echo $key+1;?></td>
                                                                        <td><?php echo $r['division_manager_sub_Name']?></td>
                                                                        <td><?php echo $r['depatment_head_Name']?></td>
                                                                        <td><?php echo number_format($r['ifSum'],2)?></td>
                                                                        <td><a href="list-department-kpi.php?dms=<?php echo $r['division_manager_sub_id']?>"> <button type="button" class="btn btn-primary  waves-effect md-close" style="margin-left: 0;">ประเมิน</button></a>
                                                                        </td>
                                                                        <td><a href="../class/class.php?code=<?php echo $r['evaluation_code']?>&key=<?php echo TokenGen($r['evaluation_id_staff'], $secret)?>&Mode=updateStatusKpi"> <button type="button" class="btn btn-warning  waves-effect md-close" style="margin-left: 0;">จบการประเมิน</button></a></td>
                                                                    </tr>
                                                                    <?php }?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>แผนก</th>
                                                                        <th>แผนกย่อย</th>
                                                                        <th>คะแนน</th>
                                                                        <th>ประเมิน</th>
                                                                        <th>จบการประเมิน</th>
                                                                    </tr>
                                                                </tfoot>
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
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/data-table/js/data-table-custom.js"></script>
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