<?php $page=""; $ac="time-list"; session_start();?>
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
    <link rel="stylesheet" type="text/css" href="../files/assets/css/component.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">


    <style>
        #contents {
            max-height: 600px;
            width: 100%;
            overflow-y: scroll;
        }
    </style>
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
                            <div class="page-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">

                                            <div class="page-header">
                                                <div class="card-block">

                                                    <ul class="breadcrumb-title  p-t-10">
                                                        <li class="breadcrumb-item">
                                                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">คลัง KPI & Competency</a>
                                                        </li>
                                                    </ul>

<!--
                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15" onclick="ClearData()">สร้าง Code การประเมิน</button>
                                                    </div>
-->

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Type</th>
                                                                <th>Name</th>
                                                                <th>Codes</th>
                                                                <th>Weight</th>
                                                                <th>Setting</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $valuei="
SELECT 
IF(r1.assessment_time_status='Y','ใช้งาน','ระงับการใช้งาน') AS ifMastatus,
IF(r1.assessment_time_status='Y', 'info', 'danger') AS ifAssessment_time_status,
r1.assessment_time_id, r1.assessment_time_code, r1.assessment_time_name, r1.assessment_time_start, r1.assessment_time_end,
(SELECT SUM(competency_master_weight) FROM tb_competency_master WHERE assessment_time_code = r1.assessment_time_code ) AS competency_weight,
(SELECT SUM(kpi_master_weight) FROM tb_kpi_master WHERE assessment_time_code = r1.assessment_time_code ) AS kpi_weight,
r1.assessment_time_type,
(CASE
    WHEN r1.assessment_time_type = 1 THEN 'add-hospitals-kpi.php'
    WHEN r1.assessment_time_type = 2 THEN 'add-hospitals-kpi.php'
    WHEN r1.assessment_time_type = 3 THEN 'add-hospitals-kpi.php'
    WHEN r1.assessment_time_type = 8 THEN 'add-hospitals-kpi.php'
    WHEN r1.assessment_time_type = 4 THEN 'add-competency-inlist.php'
    WHEN r1.assessment_time_type = 5 THEN 'add-competency-inlist.php'
    WHEN r1.assessment_time_type = 6 THEN 'add-competency-inlist.php'
    ELSE 'อื่นๆ'
END) AS links, 
(CASE
    WHEN r1.assessment_time_type = 1 THEN (SELECT SUM(kpi_master_weight) FROM tb_kpi_master WHERE assessment_time_code = r1.assessment_time_code )
    WHEN r1.assessment_time_type = 2 THEN (SELECT SUM(kpi_master_weight) FROM tb_kpi_master WHERE assessment_time_code = r1.assessment_time_code )
    WHEN r1.assessment_time_type = 3 THEN (SELECT SUM(kpi_master_weight) FROM tb_kpi_master WHERE assessment_time_code = r1.assessment_time_code ) 
    WHEN r1.assessment_time_type = 8 THEN (SELECT SUM(kpi_master_weight) FROM tb_kpi_master WHERE assessment_time_code = r1.assessment_time_code )
    WHEN r1.assessment_time_type = 4 THEN (SELECT SUM(competency_master_weight) FROM tb_competency_master WHERE assessment_time_code = r1.assessment_time_code )
    WHEN r1.assessment_time_type = 5 THEN (SELECT SUM(competency_master_weight) FROM tb_competency_master WHERE assessment_time_code = r1.assessment_time_code )
    WHEN r1.assessment_time_type = 6 THEN (SELECT SUM(competency_master_weight) FROM tb_competency_master WHERE assessment_time_code = r1.assessment_time_code )
    ELSE 'อื่นๆ'
END) AS num,
(CASE
    WHEN r1.assessment_time_type = 1 THEN 'Hospitals KPI'
    WHEN r1.assessment_time_type = 2 THEN 'Department KPI'
    WHEN r1.assessment_time_type = 3 THEN 'Staff KPI'
    WHEN r1.assessment_time_type = 8 THEN 'Behavior KPI'
    WHEN r1.assessment_time_type = 4 THEN 'Managerial competency'
    WHEN r1.assessment_time_type = 5 THEN 'Functional competency'
    WHEN r1.assessment_time_type = 6 THEN 'Core competency'
    ELSE 'อื่นๆ'
END) AS title
FROM tb_assessment_time AS r1
";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['title'];?></td>
                                                                <td><?php echo $r['assessment_time_name'];?></td>
                                                                <td><?php echo $r['assessment_time_code'];?></td>
                                                                <td <?php if($r['num']!=100){ echo 'style="background-color: red;"';}?>><?php echo $r['num'];?></td>
                                                                <td><a href="<?php echo $r['links'];?>?key=<?php echo TokenGen($r['assessment_time_code'], $secret)?>"><button type="button" class="btn btn-primary btn-mini btn-outline-primary waves-effect md-trigger" data-modal="modal-add">ดูข้อมูล</button></a></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>

                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-modal md-effect-15" id="modal-15">
                                    <div class="md-content">
                                        <h3>สร้าง Code การประเมิน</h3>
                                        <div class="card-block" id="contents">
                                            <form class="md-float-material" action="../class/sql-insert.php" method="post">
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">ชื่อแบบประเมิน</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="assessment_time_name" class="form-control color-class" placeholder="ระบุชื่อการประเมิน" maxlength="50" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">Code การประเมิน</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="assessment_time_code" id="assessment_time_code" class="form-control" placeholder="201901-001" onchange="chkLength()" autocomplete="off" required>

                                                    </div>
                                                </div>
<!--
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">วันที่เริ่มต้น</label>
                                                    <div class="col-sm-9">
                                                         <input type="date" name="assessment_time_start" class="form-control" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">วันที่สิ้นสุด</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="assessment_time_end" class="form-control" required>

                                                    </div>
                                                </div>
-->
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                         <button type="submit" name="addTime" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" onclick="chkLength()">เพิ่มการประเมิน</button>
                                                            <input type="hidden" class="form-control form-control-normal" name="Mode" value="addTime">

                                                    </div>
                                                </div>
                                            </form>
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



</body>
<script>
    function chkLength()
	{
        var getId = document.getElementById("assessment_time_code").value.length;
		if(getId!=10)
        {
            alert("Code มี 10 หลัก");
            $("#assessment_time_code").val("");
            document.getElementById("assessment_time_code").focus();
        }
	}
    function ClearData() {
        $("#assessment_time_name").val("");
        $("#assessment_time_code").val("");
        $("#assessment_time_start").val("");
        $("#assessment_time_end").val("");
    }
</script>

</html>