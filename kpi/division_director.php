<?php $page="admin"; $ac="division_director"; session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("inc-header.php")?>
    <?php $Tid=cut(TokenVerify($_GET['key'], $secret));?>
    <?php if($Tid!=""){ $_SESSION["hospitaLslevel2"]=$Tid; }?>
    <?php 
    $valuei = "
    SELECT * 
    FROM tb_hospital_director_assistant AS r1 
    JOIN tb_hospital AS r2 ON r1.hospital_id = r2.hospital_id
    WHERE r2.hospital_id = '".$_SESSION["hospitaLslevel1"]."'
    AND r1.director_assistant_id = '".$_SESSION["hospitaLslevel2"]."'
    ";
    $arr=c_scelectOne($valuei);?>
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
            <?php include("inc-nav.php");?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include("inc-menu.php");?>
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
                                                                <li class="breadcrumb-item"><?php echo $arr['director_assistant_Name'];
                                                                    ?>
                                                                </li>
                                                            </ul>
                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-15" onclick="clearValues()">เพิ่ม ชั้นที่ 2 </button>
                                                            </div>
                                                        </div>
                                                        <hr style="width: 95%;">

                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="footer-search" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Hospital director assistant</th>
                                                                        <th>Name</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                        <th>edit</th>
                                                                        <th>Delect</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                            $valuei="
                                                            SELECT * , IF(r1.division_director_Status = 'Y','เปิดใช้งาน', 'ปิดใช้งาน') AS FIdivision_director_Status
FROM tb_division_director AS r1
JOIN tb_hospital_director_assistant AS r2 ON r1.director_assistant_id = r2.director_assistant_id
JOIN tb_hospital AS r3 ON r2.hospital_id = r3.hospital_id
WHERE r3.hospital_id = '".$_SESSION["hospitaLslevel1"]."' 
AND r2.director_assistant_id = '".$_SESSION["hospitaLslevel2"]."'
                                                            ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $r['division_director_id'];?>
                                                                        </td>
                                                                        <td><?php echo $r['director_assistant_Name']?></td>
                                                                        <td><?php echo $r['division_director_Name']?></td>
                                                                        <td><?php echo $r['FIdivision_director_Status']?></td>
                                                                        <td><a href="division_manager_head.php?key=<?php echo TokenGen($r['division_director_id'], $secret)?>"><button class="btn btn-info btn-sm">ดูรายละเอียด</button></a></td>
                                                                        <td><button class="btn btn-warning btn-sm" onclick="editFrom(<?php echo $r['division_director_id']?>)">Edit</button></td>
                                                                        <td><a href="../class/sql-insert.php?Mode=ckDelectL2&key=<?php echo TokenGen($r['division_director_id'], $secret)?>"><button class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูล?');">ลบทิ้ง</button></a></td>
                                                                    </tr>
                                                                    <?php }?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>#</th>
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
                                    </div>
                                    <div class="md-modal md-effect-15" id="modal-15">
                                        <div class="md-content">
                                            <h3>เพิ่มชั้นที่ 2</h3>
                                            <div class="card-block">
                                                <form method="post" action="../class/sql-insert.php">
                                                     <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">ชั้นที่ 1</label>
                                                        <div class="col-sm-9">
                                                            <select name="director_assistant_id" class="form-control" required>
                                                                <?php 
                                                                $valuei="select director_assistant_id, director_assistant_Name
                                                             from tb_hospital_director_assistant WHERE director_assistant_Status = 'Y' and hospital_id = '".$_SESSION["hospitaLslevel1"]."' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                <option value="<?php echo $r['director_assistant_id'];?>"><?php echo $r['director_assistant_Name'];?></option>
                                                                <?php } ?>
                                                                
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">ชั้นที่ 2 </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control text" name="division_director_Name" required>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status </label>
                                                        <div class="col-sm-9">
                                                            <select name="division_director_Status" class="form-control" required>
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
                                                    <input type="hidden" class="form-control form-control-normal" name="Mode" value="addDivisionDirector">
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
                                                        <label class="col-sm-3 col-form-label">Name </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control " name="division_director_Name" id="division_director_Name" autocomplete="off" required>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status </label>
                                                        <div class="col-sm-9">
                                                            <select name="division_director_Status" id="division_director_Status" class="form-control" required>
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
                                                    <input type="hidden" class="form-control form-control-normal" name="Mode" value="editDirector2">
                                                    <input type="hidden" name="division_director_id" id="division_director_id">
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
</body>
<script>
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
                Mode: "gatDivisionDirectorId"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {
                    $("#division_director_id").val(val["division_director_id"]);
                    $("#division_director_Name").val(val["division_director_Name"]);
                    $("#division_director_Status").val(val["division_director_Status"]);
                });
            }
        });
        }
        
    </script>

</html>