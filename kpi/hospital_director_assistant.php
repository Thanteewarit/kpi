<?php $page = "admin";
$ac = "hospital_director_assistant";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("inc-header.php") ?>
    <?php $Tid = cut(TokenVerify($_GET['key'], $secret)); ?>
    <?php if ($Tid != "") {
        $_SESSION["hospitaLslevel1"] = $Tid;
    } ?>
    <?php
    $valuei = "
    SELECT * 
    FROM tb_hospital_director_assistant AS r1 
    JOIN tb_hospital AS r2 ON r1.hospital_id = r2.hospital_id
    WHERE r2.hospital_id = '" . $_SESSION["hospitaLslevel1"] . "' 
    ";
    $arr = c_scelectOne($valuei); ?>
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
            <?php include("inc-nav.php"); ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include("inc-menu.php"); ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="page-header">
                                                        <div class="card-block">

                                                            <ul class="breadcrumb-title  p-t-10">
                                                                <li class="breadcrumb-item">
                                                                    <a href="#"> <i class="fa fa-home"></i> </a>
                                                                </li>
                                                                <li class="breadcrumb-item"><a href="#!">ข้อมูลโรงพญาบาล</a>
                                                                </li>
                                                                <li class="breadcrumb-item"><?php echo $arr['hospital_NameTh'];
                                                                                            ?>
                                                                </li>
                                                            </ul>
                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15" onclick="clearValues()"> เพิ่มชั้นที่ 1 </button>
                                                            </div>
                                                        </div>
                                                        <hr style="width: 95%;">

                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#<?php //echo session_id();?></th>
                                                                        <th>Name</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                        <th>Edit</th>
                                                                        <th>Delect</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $valuei = "select director_assistant_id, director_assistant_Name,  
                                                            if(director_assistant_Status='Y','เปิดใช้งาน','ระงับการใช้งาน') AS IFdirector_assistant_Status 
                                                            from tb_hospital_director_assistant 
                                                            WHERE hospital_id ='" . $_SESSION["hospitaLslevel1"] . "'";
                                                                    foreach (c_scelectS($valuei) as $key => $r) { ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $r['director_assistant_id']; ?>
                                                                            </td>
                                                                            <td><?php echo $r['director_assistant_Name'] ?></td>
                                                                            <td><?php echo $r['IFdirector_assistant_Status'] ?></td>
                                                                            <td><a href="division_director.php?key=<?php echo TokenGen($r['director_assistant_id'], $secret) ?>"><button class="btn btn-info btn-sm">ดูรายละเอียด</button></a></td>
                                                                            <td><button class="btn btn-warning btn-sm" onclick="editFrom(<?php echo $r['director_assistant_id']?>)">Edit</button></td>
                                                                            <td><a href="../class/sql-insert.php?Mode=ckDelectL1&key=<?php echo TokenGen($r['director_assistant_id'], $secret) ?>"><button class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูล?');">ลบทิ้ง</button></a></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                                <!--
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>CODE</th>
                                                                        <th>Name TH</th>
                                                                        <th>Name EN</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </tfoot>
-->
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="md-modal md-effect-15" id="modal-15">
                                        <div class="md-content">
                                            <h3>เพิ่มชั้นที่ 1 </h3>
                                            <div class="card-block">
                                                <form method="post" action="../class/sql-insert.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Hospital</label>
                                                        <div class="col-sm-9">
                                                            <?php
                                                            $valuei = "select hospital_NameTh
                                                                from tb_hospital WHERE hospital_Status = 'Y' and hospital_id = '" . $_SESSION["hospitaLslevel1"] . "'";
                                                            $arr = c_scelectOne($valuei);
                                                            ?>
                                                            <input type="text" class="form-control" name="hospital_NameTh" value="<?php echo $arr['hospital_NameTh'] ?>" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">ชั้นที่ 1 </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control text" name="director_assistant_Name" required>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status </label>
                                                        <div class="col-sm-9">
                                                            <select name="director_assistant_Status" class="form-control" required>
                                                                <option value="Y">ใช้งาน</option>
                                                                <option value="N">ปิดการใช้งาน</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3"></label>
                                                        <div class="col-sm-9">
                                                            <input type="submit" class="btn btn-primary m-b-0" value="Save">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control form-control-normal" name="Mode" value="addDirector">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editFrom" aria-hidden="true" style="top: 100px;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header pt-2 pb-2 btnh_primary">
                                                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-block" id="contents">
                                                <form method="post" action="../class/sql-insert.php">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Hospital</label>
                                                        <div class="col-sm-9">
                                                            <?php
                                                            $valuei = "select hospital_NameTh
                                                                from tb_hospital WHERE hospital_Status = 'Y' and hospital_id = '" . $_SESSION["hospitaLslevel1"] . "'";
                                                            $arr = c_scelectOne($valuei);
                                                            ?>
                                                            <input type="text" class="form-control" name="hospital_NameTh" value="<?php echo $arr['hospital_NameTh'] ?>" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">ชั้นที่ 1 </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control " name="director_assistant_Name" id="director_assistant_Name" autocomplete="off" required>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status </label>
                                                        <div class="col-sm-9">
                                                            <select name="director_assistant_Status" id="director_assistant_Status" class="form-control" required>
                                                                <option value="Y">ใช้งาน</option>
                                                                <option value="N">ปิดการใช้งาน</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3"></label>
                                                        <div class="col-sm-9">
                                                            <input type="submit" class="btn btn-primary m-b-0" value="Save">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control form-control-normal" name="Mode" value="editDirector">
                                                    <input type="hidden" name="director_assistant_id" id="director_assistant_id">
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
    <script>
        function geek() {
            confirm("Press OK to close this option");
        }

        function clearValues() {
            $(".text").val("");
        }
        function editFrom(id) {
            $("#editFrom").modal("show");
            $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "getHospitalDirectorAssistantId"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    $("#director_assistant_Name").val(val["director_assistant_Name"]);
                    $("#director_assistant_Status").val(val["director_assistant_Status"]);
                    $("#director_assistant_id").val(val["director_assistant_id"]);
                });
            }
        });
        }
        
    </script>
</body>

</html>