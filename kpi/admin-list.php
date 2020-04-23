<?php $page="Staff-admin"; $ac="admin-list"; session_start();?>
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
                                                        <li class="breadcrumb-item"><a href="#!">ข้อมูลพนักงาน</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">รายชื่อผู้ดูแลระบบ</a>
                                                        </li>
                                                    </ul>

                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15" onclick="ClearData()">Add Admin</button>
                                                    </div>

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>รหัสพนักงาน</th>
                                                                <th>ชื่อ นามสกุล</th>
                                                                <th>สรุปภาพรวมองค์กร</th>
                                                                <th>ข้อมูลโรงพยาบาล</th>
                                                                <th>ข้อมูลพนักงาน</th>
                                                                <th>ข้อมูลผู้ดูแลระบบ</th>
                                                                <th>Import ข้อมูล</th>
                                                                <th>สถานะ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $valuei="
                                                            SELECT 
IF(r1.ma_1='Y','เปิด','ปิด') AS ifMa1, IF(r1.ma_1='Y','info','danger') AS ifMa1Y, 
IF(r1.ma_2='Y','เปิด','ปิด') AS ifMa2, IF(r1.ma_2='Y','info','danger') AS ifMa2Y, 
IF(r1.ma_3='Y','เปิด','ปิด') AS ifMa3, IF(r1.ma_3='Y','info','danger') AS ifMa3Y, 
IF(r1.ma_4='Y','เปิด','ปิด') AS ifMa4, IF(r1.ma_4='Y','info','danger') AS ifMa4Y, 
IF(r1.ma_5='Y','เปิด','ปิด') AS ifMa5, IF(r1.ma_5='Y','info','danger') AS ifMa5Y, 
IF(r1.ma_status='Y','ใช้งาน','ระงับการใช้งาน') AS ifMastatus,
IF(r1.ma_status='Y', 'info', 'danger') AS IFstaff_statusC,
r2.staff_code, r2.staff_Name, r2.staff_Sername
FROM tb_management AS r1
JOIN tb_staff AS r2 ON r1.staff_code = r2.staff_code
GROUP BY r1.staff_code
";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                <td><?php echo $r['staff_code'];?></td>
                                                                <td><?php echo $r['staff_Name'];?> <?php echo $r['staff_Sername'];?></td>
                                                                <td><span class="pcoded-badge label label-<?php echo $r['ifMa1Y'];?>"><?php echo $r['ifMa1'];?></span></td>
                                                                <td><span class="pcoded-badge label label-<?php echo $r['ifMa2Y'];?>"><?php echo $r['ifMa2'];?></span></td>
                                                                <td><span class="pcoded-badge label label-<?php echo $r['ifMa3Y'];?>"><?php echo $r['ifMa3'];?></span></td>
                                                                <td><span class="pcoded-badge label label-<?php echo $r['ifMa4Y'];?>"><?php echo $r['ifMa4'];?></span></td>
                                                                <td><span class="pcoded-badge label label-<?php echo $r['ifMa5Y'];?>"><?php echo $r['ifMa5'];?></span></td>
                                                                <td><span class="pcoded-badge label label-<?php echo $r['IFstaff_statusC'];?>"><?php echo $r['ifMastatus'];?></span></td>
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
                                        <h3>Add Admin</h3>
                                        <div class="card-block" id="contents">
                                            <form method="post" action="../class/sql-insert.php">
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">รหัสพนักงาน</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="staff_code" id="staff_code" required autocomplete="off" onchange="getStaff();">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ค้นหาชื่อ</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="staff_Name" id="staff_Name" required readonly>
                                                        <input type="hidden" class="form-control" name="staff_id" id="staff_id" required readonly>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">สรุปภาพรวมองค์กร</label>
                                                    <div class="col-sm-9">
                                                        <select name="ma_1" id="ma_1" class="form-control" required>
                                                            <option value="">กรุณาเลือก</option>
                                                            <option value="N">ไม่เปิดสิทธ์การเข้าถึง</option>
                                                            <option value="Y">สามารถเข้าถึง</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ข้อมูลโรงพยาบาล</label>
                                                    <div class="col-sm-9">
                                                        <select name="ma_2" id="ma_2" class="form-control" required>
                                                            <option value="">กรุณาเลือก</option>
                                                            <option value="N">ไม่เปิดสิทธ์การเข้าถึง</option>
                                                            <option value="Y">สามารถเข้าถึง</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ข้อมูลพนักงาน</label>
                                                    <div class="col-sm-9">
                                                        <select name="ma_3" id="ma_3" class="form-control" required>
                                                            <option value="">กรุณาเลือก</option>
                                                            <option value="N">ไม่เปิดสิทธ์การเข้าถึง</option>
                                                            <option value="Y">สามารถเข้าถึง</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ข้อมูลผู้ดูแลระบบ</label>
                                                    <div class="col-sm-9">
                                                        <select name="ma_4" id="ma_4" class="form-control" required>
                                                            <option value="">กรุณาเลือก</option>
                                                            <option value="N">ไม่เปิดสิทธ์การเข้าถึง</option>
                                                            <option value="Y">สามารถเข้าถึง</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Import ข้อมูล</label>
                                                    <div class="col-sm-9">
                                                        <select name="ma_5" id="ma_5" class="form-control" required>
                                                            <option value="">กรุณาเลือก</option>
                                                            <option value="N">ไม่เปิดสิทธ์การเข้าถึง</option>
                                                            <option value="Y">สามารถเข้าถึง</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">สถานะการใช้งาน</label>
                                                    <div class="col-sm-9">
                                                        <select name="ma_status" id="ma_status" class="form-control" required>
                                                            <option value="">กรุณาเลือก</option>
                                                            <option value="N">ไม่ใช้งาน</option>
                                                            <option value="Y">เปิดใช้งาน</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3"></label>
                                                    <div class="col-sm-9">
                                                        <input type="submit" class="btn btn-primary m-b-0" value="กำหนดสิทธิ์การเข้าถึง">
                                                    </div>
                                                </div>

                                                <input type="hidden" class="form-control form-control-normal" name="Mode" value="addAdmin">
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
</body>
<script>
    function getStaff() {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                Mode: "getStaff",
                key: $("#staff_code").val()
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    $("#staff_Name").val("");
                    $("#staff_id").val("");
                    $("#staff_Name").val(val["staff_Name"] + " " + val["staff_Sername"]);
                    $("#staff_id").val(val["staff_id"]);
                    if(val['st']=="Y")
                    {
                        $("#staff_id").val("");
                        $("#staff_code").val("");
                        document.getElementById("staff_code").focus();
                    }

                });
            }
        });
    }

    function ClearData() {
        $("#staff_Name").val("");
        $("#staff_id").val("");
        $("#staff_code").val("");
    }
</script>

</html>