<?php $page="Staff"; $ac="staff-list-head"; session_start();?>
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
        .contents {
            max-height: 600px;
            width: 100%;
            overflow-y: scroll;
        }
    </style>
    <style>
        .ui-autocomplete {
            position: absolute;
            z-index: 99999999999 !important;
            cursor: default;
            border: 2px solid #ccc;
            background-color: #FFFFFF;
            padding: 5px 0;
            border-radius: 2px;
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
                                                        <li class="breadcrumb-item"><a href="#!">ข้อมูลพนักงาน</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">รายชื่อพนักงาน</a>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                    <table id="basic-btn-2" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ID พนักงาน</th>
                                                                <th>ชื่อ - สกุล</th>
                                                                <th>ตำแหน่งงาน</th>
                                                                <th>แผนก</th>
                                                                <th>JP</th>
                                                                <th>PO</th>
                                                                <th>ID ผู้ประเมิน</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $valuei="
                                                            SELECT 
                                                            r1.staff_id,
                                                            r1.staff_code,
                                                            r1.staff_Name, 
                                                            r1.staff_Sername, 
                                                            r2.director_assistant_Name, 
                                                            r3.division_director_Name, 
                                                            r4.level_position_name, 
                                                            r5.evaluation_head_head,
                                                            r1.staff_job_code, r1.staff_level_position
                                                            FROM tb_staff AS r1 
                                                            LEFT JOIN tb_hospital_director_assistant AS r2 ON r1.staff_director_assistant_id = r2.director_assistant_id 
                                                            LEFT JOIN tb_division_director AS r3 ON r1.staff_division_director_id = r3.division_director_id
                                                            LEFT JOIN tb_level_position AS r4 ON r1.staff_level_position = r4.level_position_code
                                                            LEFT JOIN tb_evaluation_head AS r5 ON r5.evaluation_head_staff = r1.staff_id";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                <td><?php echo $r['staff_code'];?></td>
                                                                <td><?php echo $r['staff_Name'];?> <?php echo $r['staff_Sername'];?></td>
                                                                <td><?php echo $r['director_assistant_Name'];?></td>
                                                                <td><?php echo $r['division_director_Name'];?></td>
                                                                <td><?php echo $r['staff_job_code'];?></td>
                                                                <td><?php echo $r['staff_level_position'];?></td>
                                                                <td><?php echo $r['evaluation_head_head'];?></td>

                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        
                                                    </table>
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
    <!--    <script src="../files/bower_components/sweetalert/js/sweetalert.min.js"></script>-->
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
    <script src="../files/assets/pages/data-table/js/data-table-custom.js"></script>
</body>
<script>
    $('#basic-btn-2').DataTable({
        dom: 'Bfrtip',
        buttons: ['csv', 'excel']
    });
</script>

</html>