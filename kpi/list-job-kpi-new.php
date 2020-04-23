<?php $page="list-kpi"; $ac="list-job-kpi-new"; session_start();?>
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
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/component.css">
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
                                            <div class="card-block">

                                                <ul class="breadcrumb-title  p-t-10">
                                                    <li class="breadcrumb-item">
                                                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">รายชื่อผู้รอการประเมิน <?php echo $_SESSION['time']['year']."-".$_SESSION['time']['month'];?></a>
                                                    </li>
                                                </ul>

                                                <div class="text-right">
                                                                <button type="button" class="btn btn-warning alert-confirm m-b-10" onclick="fncConfirm1()">ส่งผลการประเมินทั้งหมด</button>
                                                            
                                                </div>

                                            </div>
                                            <hr style="width: 95%;">
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                <table id="excel-bg" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="excel-bg_info">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Employee ID</th>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Job profile</th>
                                                                <th>Hospital KPI</th>
                                                                <th>Department KPI</th>
                                                                <th>MC</th>
                                                                <th>FC</th>
                                                                <th>CC</th>
                                                                <th>Job KPIs</th>
                                                                <th>Behavior kpis</th>
                                                                <th>Total Score</th>
                                                                <th>สถานะ</th>
                                                                <th>จบการประเมิน</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php                                               
                                                            $valuei="
SELECT 
r3.staff_code, 
CONCAT(r3.staff_Name, ' ', r3.staff_Sername) As FullName ,
r3.staff_job_grade ,
r3.staff_job_code

FROM tb_evaluation          AS      r1
JOIN tb_staff               AS      r3 ON r1.evaluation_id_staff = r3.staff_code
WHERE r1.evaluation_id_head = '".$_SESSION['staff']['code']."'
AND r1.evaluation_id_staff != '".$_SESSION['staff']['code']."'
AND r1.evaluation_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_status = 'N'
GROUP BY r3.staff_code

UNION

SELECT 
r3.staff_code, 
CONCAT(r3.staff_Name, ' ', r3.staff_Sername) As FullName ,
r3.staff_job_grade ,
r3.staff_job_code

FROM tb_evaluation_competency      AS      r1
JOIN tb_staff                AS      r3 ON r1.evaluation_competency_id_staff = r3.staff_code
WHERE r1.evaluation_competency_id_head = '".$_SESSION['staff']['code']."'
AND r1.evaluation_competency_id_staff != '".$_SESSION['staff']['code']."'
AND r1.evaluation_competency_year = '".$_SESSION['time']['year']."'
AND r1.evaluation_competency_month = '".$_SESSION['time']['month']."'
AND r1.evaluation_competency_status = 'N'
GROUP BY r3.staff_code";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ 
                                                                $valuei="select * from tb_weight_group where weight_group_jobcode='".$r['staff_job_code']."' LIMIT 1";
                                                                $arr=c_scelectOne($valuei);

                                                                $valuei2="select * from tb_evaluation_score where evaluation_score_staff='".$r['staff_code']."' AND evaluation_score_year='".$_SESSION['time']['year']."' AND evaluation_score_month='".$_SESSION['time']['month']."'";
                                                                $arr2=c_scelectOne($valuei2);

                                                                $valuei3="select * from tb_level_position where job_code='".$r['staff_job_code']."'";
                                                                $arr3=c_scelectOne($valuei3);


$hospitals     =   $arr2['evaluation_score_kpi_hospitals']/5*$arr['weight_group_corpreate'];
$department    =   $arr2['evaluation_score_kpi_department']/5*$arr['weight_group_departmen'];
$competency_mc     =   $arr2['evaluation_score_competency_mc']/5*$arr['weight_group_mc'];
$competency_fc     =   ($arr2['evaluation_score_competency_fc']/5)*$arr['weight_group_fc'];
$competency_cc     =   $arr2['evaluation_score_competency_cc']/5*$arr['weight_group_cc'];
$kpi_staff         =   $arr2['evaluation_score_kpi_staff']/5*$arr['weight_group_jobkpi'];
$kpi_behavior      =   $arr2['evaluation_score_kpi_behavior']/5*$arr['weight_group_attribute'];
$score  =   $hospitals + $department + $competency_mc + $competency_fc + $competency_cc + $kpi_staff + $kpi_behavior;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['staff_code']?></td>
                                                                <td><?php echo $r['FullName']?></td>
                                                                <td><?php echo $arr3['level_position_name']?></td>
                                                                <td><?php echo $r['staff_job_grade']?></td>
                                                                <td><?php echo number_format($hospitals,2);?></td>
                                                                <td><?php echo number_format($department,2);?></td>
                                                                <td><?php echo number_format($competency_mc,2);?></td>
                                                                <td><?php echo number_format($competency_fc,2);?></td>
                                                                <td><?php echo number_format($competency_cc,2);?></td>
                                                                <td><?php echo number_format($kpi_staff,2);?></td>
                                                                <td><?php echo number_format($kpi_behavior,2);?></td>
                                                                <td><?php echo number_format($score,2);?></td>
                                                                <td><a href="job-kpi-news.php?code=<?php echo $r['evaluation_code']?>&key=<?php echo TokenGen($r['staff_code'], $secret)?>" target="_blank"> <button type="button" class="btn btn-primary  waves-effect md-close" style="margin-left: 0;">ประเมิน</button></a></td>
                                                                <td><a href="#"> <button type="button" class="btn btn-warning  waves-effect md-close" style="margin-left: 0;" onclick="fncConfirm2('<?php echo $r['evaluation_code']?>','<?php echo $r['staff_code']?>')">ส่งผลประเมิน</button></a></td>
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>

                                                    </table>
                                                    <!-- <table width="100%"
                                                        class="table table-striped table-bordered table-hover"
                                                        id="data-table6">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Employee ID</th>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Job profile</th>
                                                                <th>Hospital KPI</th>
                                                                <th>Department KPI</th>
                                                                <th>MC</th>
                                                                <th>FC</th>
                                                                <th>CC</th>
                                                                <th>Job KPIs</th>
                                                                <th>Behaviour kpis</th>
                                                                <th>Total Score</th>
                                                                <th>สถานะ</th>
                                                                <th>จบการประเมิน</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table> -->
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

    <script src="../files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/jszip.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js"></script>

    <script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/data-table/js/data-table-custom.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js"></script>
</body>
<script>
//    $('#new-cons').dataTable({
//        "searching": false,
//        "info": false,
//        "paging": false,
//        "lengthChange": false,
//        "order": [],
//        "columnDefs": [{
//            "targets": 'no-sort',
//            "orderable": false,
//        }]
//    });
    function fncConfirm1()
{
	if(confirm('คุณต้องการส่งผลการประเมินทั้งหมด ?')==true)
	{
        window.location = '../class/class.php?Mode=updateStatusKpiAll';
        
	}
}
    function fncConfirm2(code,id)
{
	if(confirm('คุณต้องการส่งผลการประเมิน ?')==true)
	{
		window.location = '../class/class.php?code='+code+'&Mode=updateStatusKpi&key='+id;
	}
}
</script>
<script>
        // $('#data-table6').DataTable({
        //     "order": [
        //         [0, "desc"]
        //     ],
        //     "lengthMenu": [
        //         [10, 50, 100, 500, 1000, 2000],
        //         [10, 50, 100, 500, 1000, "All"]
        //     ],
        //     processing: true,
        //     serverSide: true,
        //     "ajax": {
        //         "url": "../class/class.php?Mode=list-job-kpi-new.php",
        //         "type": "POST"
        //     }

        // });
</script>

</html>