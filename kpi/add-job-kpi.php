<?php $page="add-assessment"; $ac="add-job-kpi"; session_start();?>
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
    <link rel="stylesheet" type="text/css" href="../files/assets/css/component.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../files/new/jquery-ui.1.10.1.min.css" type="text/css" />
    <link rel="stylesheet" href="../files/new/style.css" type="text/css" />


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
            z-index: 2150000000 !important;
            cursor: default;
            border: 2px solid #ccc;
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
                                                        <li class="breadcrumb-item"><a href="#!">เพิ่มการประเมิน</a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">รายชื่อผู้มีสิทธิ์
                                                                การประเมิน</a>
                                                        </li>
                                                        <!--
                                                        <li class="breadcrumb-item"><div class="col-sm-9">
                                                        <input type="text" class="form-control sale_name" width="300px"  value="">
                                                        <input type="hidden" name="ao_Sale" id="ao_Sale" value="" placeholder="ID Sale">

                                                    </div>
                                                        </li>
-->
                                                    </ul>

                                                    <div class="text-right">
                                                        <button type="button"
                                                            class="btn btn-warning btn-outline-warning waves-effect md-trigger"
                                                            data-modal="modal-15"
                                                            onclick="clearVlue()">เพิ่มการประเมินการประเมิน</button>
                                                    </div>

                                                </div>
                                                <hr style="width: 95%;">

                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                    <table width="100%"
                                                        class="table table-striped table-bordered table-hover"
                                                        id="data-table6">
                                                        <thead>
                                                            <tr>
                                                            <th>#</th>
                                                                <th>ประเภท</th>
                                                                <th>CODE</th>
                                                                <th>Name</th>
                                                                <th>จัดการ</th>
                                                                <th>ลบ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <div class="md-modal md-effect-15" id="modal-15">
                                    <div class="md-content">
                                        <h3>เพิ่มรายชื่อผู้ประเมิน</h3>
                                        <div class="card-block" id="contents">
                                            <form class="md-float-material" action="../class/sql-insert.php"
                                                method="post">
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">ชื่อแบบประเมิน</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control sale_name" width="300px"
                                                            value="">
                                                        <input type="hidden" name="evaluation_code" id="ao_Sale"
                                                            value="" placeholder="ID Sale">

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">Year</label>
                                                    <div class="col-sm-9">

                                                        <select name="evaluation_year"
                                                            class="form-control form-control-info">
                                                            <?php $day=date("Y");  for($i = date('Y')+2 ; $i >= date('Y')-2; $i--){ ?>
                                                            <option value="<?php echo $i ?>"
                                                                <?php if($i==$day){ echo "selected"; } ?>>
                                                                <?php echo $i ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">โรงพยาบาล</label>
                                                    <div class="col-sm-9">

                                                        <select name="staff_hospital_id" id="hospital_id"
                                                            onchange="getDate0()" class="form-control form-control-info"
                                                            required>
                                                            <option value="" selected="selected">---Please select ---
                                                            </option>
                                                            <?php 
                                                             $valuei = "SELECT * FROM tb_hospital WHERE hospital_Status= 'Y'";
                                                             foreach(c_scelectS($valuei) AS $key => $r){ ?>
                                                            <option value="<?php echo $r['hospital_id']; ?>">
                                                                <?php echo $r['hospital_NameTh'] ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 1</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_director_assistant_id"
                                                            id="director_assistant_id" class="form-control"
                                                            onchange="getDate()">
                                                            <option value="NA">---NULL---</option>


                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 2</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_division_director_id"
                                                            id="division_director_id" class="form-control"
                                                            onchange="getDate2()">

                                                            <option value="NA">---NULL---</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 3</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_division_manager_head_id"
                                                            id="division_manager_head_id" class="form-control"
                                                            onchange="getDate3()">

                                                            <option value="NA">---NULL---</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 4</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_division_manager_sub_id"
                                                            id="division_manager_sub_id" class="form-control"
                                                            onchange="getDate4()">

                                                            <option value="NA">---NULL---</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">ชั้นที่ 5</label>
                                                    <div class="col-sm-9">
                                                        <select name="staff_depatment_head_id" id="depatment_head_id"
                                                            class="form-control" onchange="">

                                                            <option value="NA">---NULL---</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">Job grade</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control job_grade_name"
                                                            name="job_grade_name" width="300px" value="">
                                                        <input type="hidden" name="job_grade_names" id="job_grade_name"
                                                            value="">

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label">Job code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control staff_job_code"
                                                            name="job_code" width="300px" value="">
                                                        <input type="hidden" name="positions" id="position" value="">

                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <button type="submit" name="addTime"
                                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"
                                                            onclick="chkLength()">เพิ่มการประเมิน</button>
                                                        <input type="hidden" name="Mode" value="addEvaluation">
                                                        <input type="hidden" id="assessment_time_type" value="3">


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
    <script type="text/javascript" src="../files/new/jquery-ui.1.12.1.min.js"></script>
    <script>
        $(".sale_name").autocomplete({
            minLength: 0,

            source: function (request, response) {
                $.ajax({
                    url: "../class/class.php",
                    data: {
                        id: request.term,
                        assessment_time_type: $("#assessment_time_type").val(),
                        Mode: "getCode"
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        response(data);
                    },
                });
            },
            select: function (event, ui) {


                document.getElementById('ao_Sale').value = ui.item.value;
                console.log(ui.item.id);
                console.log(ui.item.label);
                console.log(ui.item.value);


            }

        });
        $(".position").autocomplete({
            minLength: 0,

            source: function (request, response) {
                $.ajax({
                    url: "../class/class.php",
                    data: {
                        id: request.term,
                        Mode: "getPosition"
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        response(data);
                    },
                });
            },
            select: function (event, ui) {

                document.getElementById('position').value = ui.item.position;

            }

        });
        $(".job_grade_name").autocomplete({
            minLength: 0,

            source: function (request, response) {
                $.ajax({
                    url: "../class/class.php",
                    data: {
                        id: request.term,
                        Mode: "getJobGrade"
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        response(data);
                    },
                });
            },
            select: function (event, ui) {


                document.getElementById('job_grade_name').value = ui.item.id;
                console.log(ui.item.id);
                console.log(ui.item.label);
                console.log(ui.item.value);


            }

        });

        function clearVlue() {
            $(".sale_name").val("");

        }
    </script>
    <script>
        function getDate0() {
            console.log("1");
            $("#division_manager_sub_Name").val("");
            $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    id: $("#hospital_id").val(),
                    Mode: "get_director_assistant"
                }),
                dataType: "JSON",
                async: false,
                success: function (jd) {
                    $.each(jd, function (key, val) {

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function (key, val) {
                            opt += "<option value='" + val["director_assistant_id"] + "'>" +
                                val["director_assistant_Name"] + "</option>";
                        });
                        $("#director_assistant_id").html(opt);
                    });
                }
            });
        }

        function getDate() {
            console.log("2");
            $("#division_manager_sub_Name").val("");
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
                success: function (jd) {
                    $.each(jd, function (key, val) {

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function (key, val) {
                            opt += "<option value='" + val["division_director_id"] + "'>" +
                                val[
                                    "division_director_Name"] + "</option>";
                        });
                        $("#division_director_id").html(opt);
                    });
                }
            });
        }

        function getDate2() {
            console.log("3");
            $("#depatment_head_Name").val("");
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
                success: function (jd) {
                    $.each(jd, function (key, val) {

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function (key, val) {
                            opt += "<option value='" + val["division_manager_head_id"] +
                                "'>" +
                                val["division_manager_head_Name"] + "</option>";
                        });
                        $("#division_manager_head_id").html(opt);
                    });
                }
            });
        }

        function getDate3() {
            console.log("4");

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
                success: function (jd) {
                    $.each(jd, function (key, val) {

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function (key, val) {
                            opt += "<option value='" + val["division_manager_sub_id"] +
                                "'>" +
                                val["division_manager_sub_Name"] + "</option>";
                        });
                        $("#division_manager_sub_id").html(opt);
                    });
                }
            });
        }

        function getDate4() {
            console.log("5");
            $.ajax({
                url: "../class/class.php",
                global: false,
                type: "POST",
                data: ({
                    director_assistant_id: $("#director_assistant_id").val(),
                    division_director_id: $("#division_director_id").val(),
                    division_manager_head_id: $("#division_manager_head_id").val(),
                    division_manager_sub_id: $("#division_manager_sub_id").val(),
                    Mode: "addDepatmentHeadIn"
                }),
                dataType: "JSON",
                async: false,
                success: function (jd) {
                    $.each(jd, function (key, val) {

                        var opt = '<option value="NA" selected="selected">---NULL---</option>';
                        $.each(jd, function (key, val) {
                            opt += "<option value='" + val["depatment_head_id"] + "'>" +
                                val[
                                    "depatment_head_Name"] + "</option>";
                        });
                        $("#depatment_head_id").html(opt);
                    });
                }
            });
        }

        $(".staff_job_code").autocomplete({
            minLength: 0,

            source: function (request, response) {
                $.ajax({
                    url: "../class/class.php",
                    data: {
                        id: request.term,
                        Mode: "getJobCode"
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        response(data);
                    },
                });
            },
            select: function (event, ui) {
                $(".staff_job_code").val(value = ui.item.id);
            }

        });
    </script>
    <script>
        $('#data-table6').DataTable({
            "order": [
                [0, "desc"]
            ],
            "lengthMenu": [
                [10, 50, 100, 500, 1000, 2000],
                [10, 50, 100, 500, 1000, "All"]
            ],
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "../class/class.php?Mode=add-job-kpi.php",
                "type": "POST"
            }

        });
    </script>


</body>


</html>