<?php $page="Staff"; $ac="staff-password"; session_start();?>
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
                                                        <li class="breadcrumb-item"><a href="#!">เปลี่ยนรหัสผ่านสมาชิก</a>
                                                        </li>
                                                    </ul>

                                                    

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>รหัสพนักงาน</th>
                                                                <th>ชื่อ</th>
                                                                <th>นามสกุล</th>
                                                                <th>ฝ่าย</th>
                                                                <th>แผนก</th>
                                                                <th>ตำแหน่งงาน</th>
                                                                <th>สถานะ</th>
                                                                <th>สถานะ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $valuei="
                                                            SELECT r1.staff_id, r1.staff_code, r1.staff_Name, r1.staff_Sername, r2.director_assistant_Name, r3.division_director_Name, r4.level_position_name, IF(r1.staff_status='Y', 'ใช้งาน', 'ปิดการใช้งาน') AS IFstaff_status, 
                                                            IF(r1.staff_status='Y', 'info', 'danger') AS IFstaff_statusC
                                                            FROM tb_staff AS r1 
                                                            LEFT JOIN tb_hospital_director_assistant AS r2 ON r1.staff_director_assistant_id = r2.director_assistant_id 
                                                            LEFT JOIN tb_division_director AS r3 ON r1.staff_division_director_id = r3.division_director_id
                                                            LEFT JOIN tb_level_position AS r4 ON r1.staff_level_position = r4.level_position_code";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                <td><?php echo $r['staff_code'];?></td>
                                                                <td><?php echo $r['staff_Name'];?></td>
                                                                <td><?php echo $r['staff_Sername'];?></td>
                                                                <td><?php echo $r['director_assistant_Name'];?></td>
                                                                <td><?php echo $r['division_director_Name'];?></td>
                                                                <td><?php echo $r['level_position_name'];?></td>
                                                                <td><span class="pcoded-badge label label-<?php echo $r['IFstaff_statusC'];?>"><?php echo $r['IFstaff_status'];?></span></td>
                                                                <td><a href="#" onclick="villGraph(<?php echo $r['staff_id']?>);"><button class="btn btn-success btn-round btn-sm">view</button></a></td>

                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>รหัสพนักงาน</th>
                                                                <th>ชื่อ</th>
                                                                <th>นามสกุล</th>
                                                                <th>ฝ่าย</th>
                                                                <th>แผนก</th>
                                                                <th>ตำแหน่งงาน</th>
                                                                <th>สถานะ</th>
                                                                <th>สถานะ</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="villGraph" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 90%;">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header pt-2 pb-2 btnh_primary">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Staff</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-block contents">
                                                    <form method="post" action="../class/sql-insert.php">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">คำนำหน้า</label>
                                                            <div class="col-sm-9">
                                                                <select name="staff_title" id="Estaff_title" class="form-control"  readonly>
                                                                    <option value="Mr">Mr.</option>
                                                                    <option value="Miss">Miss.</option>
                                                                    <option value="Mrs">Mrs.</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">ชื่อจริง </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="staff_Name" id="Estaff_Name" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">นามสกุล </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="staff_Sername" id="Estaff_Sername" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">ID Staff</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="staff_code" id="Estaff_code" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">รหัสผ่านใหม่</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="staff_password" id="staff_password" required>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                    <label class="col-sm-3"></label>
                                                    <div class="col-sm-9">
                                                        <input type="submit" class="btn btn-primary m-b-0" value="Save">
                                                    </div>
                                                </div>
                                                        </div>
                                                        <input type="hidden" class="form-control form-control-normal" name="Mode" value="Reepass">
                                                        <input type="hidden" class="form-control form-control-normal" name="id" id="id">
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
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/pages/data-table/js/data-table-custom.js"></script>
</body>
<script>

    function villGraph(id) {
        var chatKpi = '';
        $("#villGraph").modal("show");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "getStaffEdie"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    $("#Estaff_title").val(val["staff_title"]);
                    $("#Estaff_Name").val(val["staff_Name"]);
                    $("#Estaff_Sername").val(val["staff_Sername"]);
                    $("#Estaff_code").val(val["staff_code"]);
                    $("#id").val(id);

                });
            }
        });
    }
    

    
</script>

</html>