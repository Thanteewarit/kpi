<?php $page="Weight"; $ac="staff-list"; session_start();?>
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
    <style>
        .ui-autocomplete {
            position: absolute;
            z-index: 999999 !important;
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
                                                        <li class="breadcrumb-item"><a href="#!">Evaluation weight</a>
                                                        </li>
                                                    </ul>

                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-modal="modal-add">Add evaluation weight</button>
                                                        <!--                                                        <button type="button" class="btn btn-danger btn-outline-danger waves-effect md-trigger" data-modal="modal-5">Fall</button>-->


                                                    </div>

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                    <table id="cbtn-selectors-in" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ลำดับที่</th>
                                                                <th>JobCode</th>
                                                                <th>JobDesc</th>
                                                                <th>JobGrade</th>
                                                                <th>Department Desc.</th>
                                                                <th>Corporate KPI</th>
                                                                <th>Department KPI</th>
                                                                <th>MC</th>
                                                                <th>FC</th>
                                                                <th>CC</th>
                                                                <th>Job KPI</th>
                                                                <th>Behavior</th>
                                                                <th>Total</th>
                                                                <th>โรงพญาบาล</th>
<!--                                                                <th>แก้ไข</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $valuei="SELECT * 
                                                            FROM tb_weight_group AS r1
                                                            JOIN tb_hospital AS r2 ON r2.hospital_id = r1.weight_group_hot";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <tr>
                                                                <td><?php echo $key+1;?></td>
                                                                <td><?php echo $r['weight_group_jobcode'];?></td>
                                                                <td><?php echo $r['weight_group_jobdesc'];?></td>
                                                                <td><?php echo $r['weight_group_jobgrade'];?></td>
                                                                <td><?php echo $r['weight_group_department'];?></td>
                                                                <td><?php echo $r['weight_group_corpreate'];?></td>
                                                                <td><?php echo $r['weight_group_departmen'];?></td>
                                                                <td><?php echo $r['weight_group_mc'];?></td>
                                                                <td><?php echo $r['weight_group_fc'];?></td>
                                                                <td><?php echo $r['weight_group_cc'];?></td>
                                                                <td><?php echo $r['weight_group_jobkpi'];?></td>
                                                                <td><?php echo $r['weight_group_attribute'];?></td>
                                                                <td><?php echo $r['weight_group_total'];?></td>
                                                                <td><?php echo $r['hospital_Code'];?></td>
<!--                                                                <td><a href="staff-list-.php?key=<?php echo TokenGen($r['staff_id'], $secret)?>"><button type="button" class="btn btn-primary btn-mini btn-outline-primary waves-effect md-trigger" data-modal="modal-add">แก้ไขข้อมูล</button></a></td>-->

                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-modal md-effect-15" id="modal-add">
                                    <div class="md-content">
                                        <h3>Add evaluation weight</h3>
                                        <div class="card-block" id="contents">
                                            <form method="post" action="../class/sql-insert.php">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">โรงพยาบาล</label>
                                                    <div class="col-sm-9">
                                                        <select name="weight_group_hot" id="weight_group_hot" class="form-control" required>
                                                            <option value="" selected="selected">---Please select ---</option>
                                                            <?php 
                                                                $valuei="select * from tb_hospital WHERE hospital_Status = 'Y'";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['hospital_Code'];?>"> <?php echo $r['hospital_Code'];?>
                                                                <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">JobCode</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control sume" name="weight_group_jobcode" id="JobCode" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">JobDesc</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control sume" name="weight_group_jobdesc" id="JobDesc" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">JobGrade</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control sume" name="weight_group_jobgrade" id="JobGrade" required>

                                                    </div>
                                                    </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Hospitals KPI</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control sume" name="weight_group_corpreate" id="CorporateKPI" onchange="getDate()" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Dep KPI</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control sume" name="DepartmentKPI" id="DepartmentKPI" onchange="getDate()" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">MC</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control sume" name="weight_group_mc" id="MC" onchange="getDate()" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">FC</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control sume" name="weight_group_fc" id="FC" onchange="getDate()" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">CC</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control sume" name="weight_group_cc" id="CC" onchange="getDate()" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Job KPI</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control sume" name="weight_group_jobkpi" id="JobKPI" onchange="getDate()" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Behavior</label>
                                                    
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control sume" name="weight_group_attribute" id="Attribute" onchange="getDate()" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Total</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="weight_group_total" id="Total" required>

                                                    </div>
                                                </div>

                                                <!--
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Director Status </label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_status" class="form-control" required>
                                                            <option value="Y">ใช้งาน</option>
                                                            <option value="N">ปิดการใช้งาน</option>
                                                        </select>

                                                    </div>
                                                </div>
-->
                                                <div class="form-group row">
                                                    <label class="col-sm-3"></label>
                                                    <div class="col-sm-9">
                                                        <input type="submit" class="btn btn-primary m-b-0" value="Save">
                                                    </div>
                                                </div>
                                                <input type="hidden" class="form-control form-control-normal" name="Mode" value="addWeightGroup">
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

    <script src="../files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/jszip.min.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js"></script>
    <script src="../files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js"></script>

    <script src="../files/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js"></script>
</body>
<script>
$(document).ready(function() {
    $('#cbtn-selectors-in').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            exportOptions: {
                columns: ':visible'
            }
        }, 
        'colvis'
    ]
    });
});
    function getHospital() {
        //$("#director_assistant_id").html("");
        $("#division_director_id").html("");
        $("#division_manager_head_id").html("");
        $("#division_manager_sub_id").html("");
        $("#depatment_head_id").html("");
        $("#StaffName").val("");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: $("#nameHospital").val(),
                Mode: "getHospital"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    $.each(jd, function(key, val) {
                        $("#codeHospital").val(val["hospital_Code"]);
                    });
                });
            }
        });
    }

    function getDate() {
        var sumValue = 0;
        $.each($(".sume"), function(i, v) {
            if (parseInt(v.value) >= 0) sumValue += parseInt(v.value)
        })
        document.getElementById('Total').value = sumValue;
    }
</script>

</html>