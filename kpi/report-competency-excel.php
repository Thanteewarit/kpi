<?php $page="report-com"; $ac="report-competency-excel.php"; session_start();?>
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
    <link rel="stylesheet" type="text/css"
        href="../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="../files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="../files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">
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
                                                <div class="card-block contents">
                                                    <form method="post" action="../class/report-com01.php">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Name Hospital</label>
                                                            <div class="col-sm-9">
                                                                <select name="staff_hospital_id" id="nameHospital"
                                                                    class="form-control"
                                                                    onchange="getHospital(this.value)" required>
                                                                    <option value="" selected="selected">---Please
                                                                        select---</option>
                                                                    <?php 
                                                                $valuei="select hospital_id, hospital_NameTh
                                                             from tb_hospital WHERE hospital_Status = 'Y' ";
                                                            foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                                    <option value="<?php echo $r['hospital_id'];?>">
                                                                        <?php echo $r['hospital_NameTh'];?></option>
                                                                    <?php } ?>

                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Code Hospital</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    name="codeHospital" id="codeHospital" readonly
                                                                    required>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">ชั้นที่1</label>
                                                            <div class="col-sm-9">
                                                                <select name="staff_director_assistant_id"
                                                                    id="director_assistant_id" class="form-control"
                                                                    onchange="getDate()" required>
                                                                    <option value="NA" selected="selected">--- N/A ---</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">ชั้นที่ 2</label>
                                                            <div class="col-sm-9">
                                                                <select name="staff_division_director_id"
                                                                    id="division_director_id" class="form-control"
                                                                    onchange="getDate2()">
                                                                    <option value="NA" selected="selected">--- N/A ---
                                                                    </option>
                                                                    <option value=""></option>

                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">ชั้นที่ 3</label>
                                                            <div class="col-sm-9">
                                                                <select name="staff_division_manager_head_id"
                                                                    id="division_manager_head_id" class="form-control"
                                                                    onchange="getDate3()">
                                                                    <option value="NA" selected="selected">--- N/A ---
                                                                    </option>
                                                                    <option value=""></option>

                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">ชั้นที่ 4</label>
                                                            <div class="col-sm-9">
                                                                <select name="staff_division_manager_sub_id"
                                                                    id="division_manager_sub_id" class="form-control"
                                                                    onchange="getDate4()">
                                                                    <option value="NA" selected="selected">--- N/A ---
                                                                    </option>
                                                                    <option value=""></option>

                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">ชั้นที่ 5</label>
                                                            <div class="col-sm-9">
                                                                <select name="staff_depatment_head_id"
                                                                    id="depatment_head_id" class="form-control"
                                                                    onchange="getDate5()">
                                                                    <option value="NA" selected="selected">--- N/A ---
                                                                    </option>
                                                                    <option value=""></option>

                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3"></label>
                                                            <div class="col-sm-9">
                                                                <input type="submit" class="btn btn-primary m-b-0" value="ดึงข้อมูล"> 
                                                            </div>
                                                        </div>
                                                        <input type="hidden" class="form-control form-control-normal" name="Mode" value="report-com01">
                                                    </form>
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
    <script src="../files/assets/js/script.js"></script>
</body>
<script>
    function getHospital(id) {
        
        $("#director_assistant_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#division_director_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#division_manager_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#division_manager_sub_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#depatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#StaffName").val("");
        $("#Edirector_assistant_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edivision_director_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edivision_manager_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edivision_manager_sub_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edepatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#EStaffName").val("");
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
                        if (val["hospital_id"] == id) {
                            $("#codeHospital").val(val["hospital_Code"]);
                        }
                    });
                });
            }
        });
        HLY_1(id);
    }
    function getHospitalE(id) {
        
        $("#Edirector_assistant_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edivision_director_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edivision_manager_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edivision_manager_sub_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edepatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#EStaffName").val("");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: $("#EnameHospital").val(),
                Mode: "getHospital"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    $.each(jd, function(key, val) {
                        if (val["hospital_id"] == id) {
                            $("#EcodeHospital").val(val["hospital_Code"]);
                        }
                    });
                });
            }
        });
        HLY_1E(id);
    }

    function HLY_1(id) {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "get_director_assistant"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["director_assistant_id"] + "'>" + val["director_assistant_Name"] + "</option>";
                    });
                    $("#director_assistant_id").html(opt);
                });
            }
        });
    }
    function HLY_1E(id) {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "get_director_assistant"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["director_assistant_id"] + "'>" + val["director_assistant_Name"] + "</option>";
                    });
                    $("#Edirector_assistant_id").html(opt);
                });
            }
        });
    }

    function getDate() {
        $("#division_director_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#division_manager_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#division_manager_sub_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#depatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#StaffName").val("");
        $.ajax({ 
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: $("#director_assistant_id").val(),
                Mode: "getDivisionDirector"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["division_director_id"] + "'>" + val["division_director_Name"] + "</option>";
                    });
                    $("#division_director_id").html(opt);
                });
            }
        });
    }
    function getDateE() {
        $("#Edivision_director_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edivision_manager_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edivision_manager_sub_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edepatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#EStaffName").val("");
        $.ajax({ 
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: $("#Edirector_assistant_id").val(),
                Mode: "getDivisionDirector"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["division_director_id"] + "'>" + val["division_director_Name"] + "</option>";
                    });
                    $("#Edivision_director_id").html(opt);
                });
            }
        });
    }

    function getDate2() {
        $("#division_manager_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#division_manager_sub_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#depatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#StaffName").val("");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: $("#director_assistant_id").val(),
                division_director_id: $("#division_director_id").val(),
                Mode: "getDivisionManagerSub"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["division_manager_head_id"] + "'>" + val["division_manager_head_Name"] + "</option>";
                    });
                    $("#division_manager_head_id").html(opt);
                });
            }
        });
    }
    function getDate2E() {
        $("#Edivision_manager_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edivision_manager_sub_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edepatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#EStaffName").val("");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: $("#Edirector_assistant_id").val(),
                division_director_id: $("#Edivision_director_id").val(),
                Mode: "getDivisionManagerSub"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["division_manager_head_id"] + "'>" + val["division_manager_head_Name"] + "</option>";
                    });
                    $("#Edivision_manager_head_id").html(opt);
                });
            }
        });
    }

    function getDate3() {
        $("#division_manager_sub_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#depatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#StaffName").val("");

        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: $("#director_assistant_id").val(),
                division_director_id: $("#division_director_id").val(),
                division_manager_head_id: $("#division_manager_head_id").val(),
                Mode: "addDepatmentHead"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["division_manager_sub_id"] + "'>" + val["division_manager_sub_Name"] + "</option>";
                    });
                    $("#division_manager_sub_id").html(opt);
                });
            }
        });
    }
    function getDate3E() {
        $("#Edivision_manager_sub_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#Edepatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#EStaffName").val("");

        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: $("#Edirector_assistant_id").val(),
                division_director_id: $("#Edivision_director_id").val(),
                division_manager_head_id: $("#Edivision_manager_head_id").val(),
                Mode: "addDepatmentHead"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["division_manager_sub_id"] + "'>" + val["division_manager_sub_Name"] + "</option>";
                    });
                    $("#Edivision_manager_sub_id").html(opt);
                });
            }
        });
    }

    function getDate4() {
        $("#Edepatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#EStaffName").val("");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: $("#director_assistant_id").val(),
                division_director_id: $("#division_director_id").val(),
                division_manager_head_id: $("#division_manager_head_id").val(),
                division_manager_sub_id: $("#division_manager_sub_id").val(),
                Mode: "addDepatmentHeadId"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["depatment_head_id"] + "'>" + val["depatment_head_Name"] + "</option>";
                    });
                    $("#depatment_head_id").html(opt);
                });
            }
        });
    }
    function getDate4E() {
        $("#depatment_head_id").html('<option value="NA" selected="selected">--- N/A ---</option>');
        $("#StaffName").val("");
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: $("#Edirector_assistant_id").val(),
                division_director_id: $("#Edivision_director_id").val(),
                division_manager_head_id: $("#Edivision_manager_head_id").val(),
                division_manager_sub_id: $("#Edivision_manager_sub_id").val(),
                Mode: "addDepatmentHeadId"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["depatment_head_id"] + "'>" + val["depatment_head_Name"] + "</option>";
                    });
                    $("#Edepatment_head_id").html(opt);
                });
            }
        });
    }

    function getDate5E() {
        $("#EStaffName").val("");
    }

    function getdata6() {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: $("#department_id").val(),
                Mode: "getDepartment"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="" selected="selected">---Please select---</option>';
                    opt += '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        opt += "<option value='" + val["department_work_id"] + "'>" + val["department_work_Name"] + "</option>";
                    });
                    $("#department_work_id").html(opt);
                });
            }
        });
    }
    $(".job_grade_name").autocomplete({
        minLength: 0,

        source: function(request, response) {
            $.ajax({
                url: "../class/class.php",
                data: {
                    id: request.term,
                    Mode: "getJobGrade"
                },
                type: "POST",
                dataType: "json",
                success: function(data) {
                    response(data);
                },
            });
        },
        select: function(event, ui) {
            document.getElementById('staff_job_grade').value = ui.item.id;
        }

    });

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

                    HLK_1(val["staff_hospital_id"],val["staff_director_assistant_id"]);
                    HLK_1s(val["staff_hospital_id"]);
                    HLK_2(val["staff_division_director_id"]);
                    HLK_3(val["staff_division_manager_head_id"]);
                    HLK_4(val["staff_division_manager_sub_id"]);
                    HLK_5(val["staff_depatment_head_id"]);
                    $(".staff_level_position").val(val["staff_level_position"]);
                    // HLK_6(val["staff_level_position"]);
                    HLK_7(val["staff_code"],val["staff_job_code"],val["staff_job_grade"]);
                    HLK_8(val["staff_hospital_id"]);
                    HLK_9(val["staff_title"],val["staff_Name"],val["staff_Sername"]);

                });
            }
        });
    }
    
    function HLK_1(id,check) {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: id,
                Mode: "get_director_assistant"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        if(val["director_assistant_id"]==check)
                        {
                            opt +="<option value='"+ val["director_assistant_id"] +"' selected=\"selected\">"+val["director_assistant_Name"]+"</option>";
                        }
                        else
                        {
                            opt += "<option value='" + val["director_assistant_id"] + "'>" + val["director_assistant_Name"] + "</option>";
                        }
                    });
                    $("#Edirector_assistant_id").html(opt);
                });
            }
        });
    }

    function HLK_1s(id) {
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
                        if (val["hospital_id"] == id) {
                            $("#EcodeHospital").val(val["hospital_Code"]);
                        }
                    });
                });
            }
        });
        HLY_1(id);
    }

    function HLK_2(check) {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id: $("#Edirector_assistant_id").val(),
                Mode: "getDivisionDirector"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        if(val["division_director_id"]==check)
                        {
                            opt +="<option value='"+ val["division_director_id"] +"' selected=\"selected\">"+val["division_director_Name"]+"</option>";
                        }
                        else
                        {
                            opt += "<option value='" + val["division_director_id"] + "'>" + val["division_director_Name"] + "</option>";
                        }
                    });
                    $("#Edivision_director_id").html(opt);
                });
            }
        });
    }
    
    function HLK_3(check) {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: $("#Edirector_assistant_id").val(),
                division_director_id: $("#Edivision_director_id").val(),
                Mode: "getDivisionManagerSub"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        if(val["division_manager_head_id"]==check)
                        {
                            opt +="<option value='"+ val["division_manager_head_id"] +"' selected=\"selected\">"+val["division_manager_head_Name"]+"</option>";
                        }
                        else
                        {
                            opt += "<option value='" + val["division_manager_head_id"] + "'>" + val["division_manager_head_Name"] + "</option>";
                        }
                    });
                    $("#Edivision_manager_head_id").html(opt);
                });
            }
        });
    }

    function HLK_4(check) {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: $("#Edirector_assistant_id").val(),
                division_director_id: $("#Edivision_director_id").val(),
                division_manager_head_id: $("#Edivision_manager_head_id").val(),
                Mode: "addDepatmentHead"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="NA" selected="selected">--- N/A ---</option>';

                    $.each(jd, function(key, val) {
                       
                        if(val["division_manager_sub_id"]==check)
                        {
                            opt +="<option value='"+ val["division_manager_sub_id"] +"' selected=\"selected\">"+val["division_manager_sub_Name"]+"</option>";
                        }
                        else
                        {
                            opt += "<option value='" + val["division_manager_sub_id"] + "'>" + val["division_manager_sub_Name"] + "</option>";
                        }
                    });
                    $("#Edivision_manager_sub_id").html(opt);
                });
            }
        });
    }

    function HLK_5(check) {
        $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                director_assistant_id: $("#Edirector_assistant_id").val(),
                division_director_id: $("#Edivision_director_id").val(),
                division_manager_head_id: $("#Edivision_manager_head_id").val(),
                division_manager_sub_id: $("#Edivision_manager_sub_id").val(),
                Mode: "addDepatmentHeadId"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        if(val["depatment_head_id"]==check)
                        {
                            opt +="<option value='"+ val["depatment_head_id"] +"' selected=\"selected\">"+val["depatment_head_Name"]+"</option>";
                        }
                        else
                        {
                            opt += "<option value='" + val["depatment_head_id"] + "'>" + val["depatment_head_Name"] + "</option>";
                        }
                    });
                    $("#Edepatment_head_id").html(opt);
                });
            }
        });
    }

    function HLK_6(check) {
            $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                id : check,
                Mode: "get_position"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        if(val["level_position_code"]==check)
                        {
                            opt +="<option value='"+ val["level_position_code"] +"' selected=\"selected\">"+val["level_position_name"]+"</option>";
                        }
                        else
                        {
                            opt += "<option value='" + val["level_position_code"] + "'>" + val["level_position_name"] + "</option>";
                        }
                        
                    });
                    $("#staff_level_position").html(opt);
                });
            }
        });
    }
    
    function HLK_7(check,Estaff_job_code,staff_job_grade) {
        $("#Estaff_code").val(check);
        $("#Estaff_job_code").val(Estaff_job_code);
        $("#Estaff_job_grade").val(staff_job_grade);
        
    }
    
    function HLK_8(check) {
            $.ajax({
            url: "../class/class.php",
            global: false,
            type: "POST",
            data: ({
                Mode: "getHospital"
            }),
            dataType: "JSON",
            async: false,
            success: function(jd) {
                $.each(jd, function(key, val) {

                    var opt = '<option value="NA" selected="selected">--- N/A ---</option>';
                    $.each(jd, function(key, val) {
                        if(val["hospital_id"]==check)
                        {
                            opt +="<option value='"+ val["hospital_id"] +"' selected=\"selected\">"+val["hospital_NameTh"]+"</option>";
                        }
                        else
                        {
                            opt += "<option value='" + val["hospital_id"] + "'>" + val["hospital_NameTh"] + "</option>";
                        }
                    });
                    $("#EnameHospital").html(opt);
                });
            }
        });
    }
    
    function HLK_9(staff_title,staff_Name,staff_Sername) {
        $("#Estaff_title").val(staff_title);
        $("#Estaff_Name").val(staff_Name);
        $("#Estaff_Sername").val(staff_Sername);
        
    }

    $(".staff_level_position").autocomplete({
        minLength: 0,

        source: function(request, response) {
            $.ajax({
                url: "../class/class.php",
                data: {
                    id: request.term,
                    Mode: "getPosition"
                },
                type: "POST",
                dataType: "json",
                success: function(data) {
                    response(data);
                },
            });
        },
        select: function(event, ui) {
            $(".staff_level_position").val(value = ui.item.id);
            //("#Estaff_Sername").val(staff_Sername);
            //document.getElementById('staff_job_grade').value = ui.item.id;
        }

    });
    $(".staff_job_code").autocomplete({
        minLength: 0,

        source: function(request, response) {
            $.ajax({
                url: "../class/class.php",
                data: {
                    id: request.term,
                    Mode: "getJobCode"
                },
                type: "POST",
                dataType: "json",
                success: function(data) {
                    response(data);
                },
            });
        },
        select: function(event, ui) {
            $(".staff_job_code").val(value = ui.item.id);
        }

    });

    
</script>

</html>